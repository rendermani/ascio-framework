const redis = require('redis');
const redis = require('../db/RedisDb')
const { RateLimiterRedis } = require('rate-limiter-flexible');

const maxWrongAttemptsByIPperDay = 100;
const maxConsecutiveFailsByUsernameAndIP = 10;
const maxWrongAttemptsByUsernamePerDay = 50;

const limiterSlowBruteByIP = new RateLimiterRedis({
  redis: redis.client,
  keyPrefix: 'login_fail_ip_per_day',
  points: maxWrongAttemptsByIPperDay,
  duration: 60 * 60 * 24,
  blockDuration: 60 * 60 * 24, // Block for 1 day, if 100 wrong attempts per day
});

const limiterConsecutiveFailsByUsernameAndIP = new RateLimiterRedis({
  redis: redis.client,
  keyPrefix: 'login_fail_consecutive_username_and_ip',
  points: maxConsecutiveFailsByUsernameAndIP,
  duration: 60 * 60 * 24 * 90, // Store number for 90 days since first fail
  blockDuration: 60 * 60 * 24 * 365 * 20, // Block for infinity after consecutive fails
});

const limiterSlowBruteByUsername = new RateLimiterRedis({
  redis: redis.client,
  keyPrefix: 'login_fail_username_per_day',
  points: maxWrongAttemptsByUsernamePerDay,
  duration: 60 * 60 * 24,
  blockDuration: 60 * 60 * 24 * 365 * 20, // Block for infinity after 100 fails
});

const getUsernameIPkey = (username, ip) => `${username}_${ip}`;

async function blockBruteForce(req, res,next) {
  const ipAddr = req.connection.remoteAddress;

  const usernameIPkey = getUsernameIPkey(req.body.username, ipAddr);
  const isDeviceTrusted = checkDeviceWasUsedPreviously(req.body.username, req.cookies.deviceId);

  const [resUsernameAndIP, resSlowByIP, resSlowUsername] = await Promise.all([
    limiterConsecutiveFailsByUsernameAndIP.get(usernameIPkey),
    limiterSlowBruteByIP.get(ipAddr),
    limiterSlowBruteByUsername.get(req.body.username),
  ]);

  let retrySecs = 0;

  // Check if IP, Username + IP or Username is already blocked
  if (!isDeviceTrusted && resSlowByIP !== null && resSlowByIP.consumedPoints > maxWrongAttemptsByIPperDay) {
    retrySecs = Math.round(resSlowByIP.msBeforeNext / 1000) || 1;
    res.set('Retry-After', String(retrySecs));
  } else if (resUsernameAndIP !== null && resUsernameAndIP.consumedPoints > maxConsecutiveFailsByUsernameAndIP) {
    retrySecs = Number.MAX_SAFE_INTEGER;
  } else if (!isDeviceTrusted && resSlowUsername !== null && resSlowUsername.consumedPoints > maxWrongAttemptsByUsernamePerDay) {
    retrySecs = Number.MAX_SAFE_INTEGER;
  }

  if (retrySecs > 0) {
    return res.status(429).send('Too Many Requests');
  } else {

    const user = authorise(req.body.username, req.body.password);
    if (!user.isLoggedIn) {
      try {
        const limiterPromises = [];
        if (!isDeviceTrusted) {
          limiterPromises.push(limiterSlowBruteByIP.consume(ipAddr));
        }

        if (user.exists) {
          // Count failed attempts only for registered users
          limiterPromises.push(limiterConsecutiveFailsByUsernameAndIP.consume(usernameIPkey));
          if (!isDeviceTrusted) {
            limiterPromises.push(limiterSlowBruteByUsername.consume(req.body.username));
          }
        }
        
        if (limiterPromises.length > 0) {
          await Promise.all(limiterPromises);
        }

        res.status(400).end('email or password is wrong');
      } catch (rlRejected) {
        if (rlRejected instanceof Error) {
          throw rlRejected;
        } else {
          // All available points are consumed from some/all limiters, block request
          res.status(429).send('Too Many Requests');
        }
      }
    }

    if (user.isLoggedIn) {
      if (resUsernameAndIP !== null && resUsernameAndIP.consumedPoints > 0) {
        // Reset only consecutive counter after successful authorisation
        await limiterConsecutiveFailsByUsernameAndIP.delete(usernameIPkey);
      }
      res.end('authorized');
    }
  }
}
module.exports = blockBruteForce
/* 
app.post('/login', async (req, res) => {
  try {
    await loginRoute(req, res);
  } catch (err) {
    res.status(500).end();
  }
});
 */