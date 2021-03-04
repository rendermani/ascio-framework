const bcrypt = require('bcryptjs');
var GoogleAuthenticator = require('passport-2fa-totp').GoogeAuthenticator;
var TwoFAStartegy = require('passport-2fa-totp').Strategy;
// Load User model
const User = require('../db/User');

module.exports = function(passport) {
	passport.use(
		new TwoFAStartegy(
			{ usernameField: 'username' , badRequestMessage : {message: 'invalid token'}}, (username, password, done) => {
        // Match user
        const user = new User(username);
        console.log(user)
        user.get(username).then((user) => {
          if (!user) {
            return done("Invalid credentials", false);
          }
          // Match password. If the user-password is missing, it should not be possible to login without any password
          if (!user.password) user.password = 'password_missing_jdflasfjaölkfjrqöoi';
          bcrypt.compare(password, user.password, (err, isMatch) => {
            if (err) throw err;
            if (isMatch) {
              return done(null, user);
            } else {
              return done('Invalid credentials', false);
            }
          });
        }).catch(() => {
          done('Invalid credentials',false)
        });
      },
      /**
       * 
       * @param {User} user 
       * @param {*} done 
       */
			async function(user, done) {
				// 2nd step verification: TOTP code from Google Authenticator
        
					// Google Authenticator uses 30 seconds key period
					// https://github.com/google/google-authenticator/wiki/Key-Uri-Format

          if(!await user.get2faSecret()) {
            return done({showQR : true, qr : await user.getQrCode()})
          }
          
          var secret = GoogleAuthenticator.decodeSecret(await user.get2faSecret());
					done(null, secret, 30);
			
			}
		)
	);
	passport.serializeUser(function(user, done) {
		done(null, user.username);
	});

	passport.deserializeUser(function(username, done) {
		User.get(username).then((user) => {
			if (user) {
				done(null, user);
			} else {
				done('User not found', null);
			}
		});
	});
};
