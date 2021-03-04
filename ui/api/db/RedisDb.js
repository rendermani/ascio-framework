const redis = require("redis")
var redisearch = require('redis-redisearch');
redisearch(redis)
const config = require("../lib/config.js")
const client = redis.createClient(6379,"localhost")
const { promisify } = require("util");
client.async = {}
const commands = ["set","get","smembers","sadd","srem","sismember","del","ft_create","ft_search","hget","hset","hgetall"]
commands.forEach((command) => {
    client.async[command] = promisify(client[command]).bind(client)
})
module.exports.client = client
module.exports.createIndex = function () {
    return client.async.ft_create("objects","PREFIX",1,config.nsObjects(),"SCHEMA",
    "_clientId","TEXT",
    "_clientIdSearch","TEXT",
    "_objectName","TEXT",
    "_objectNameSearch","TEXT",
    "_type","TEXT",
    "ZoneName","TEXT",    
    "ZoneNameSearch","TEXT",
    "Name","TEXT",
    "NameSearch","TEXT",
    "CommonName","TEXT",
    "CommonNameSearch","TEXT",
    "Target","TEXT",
    "TargetSearch","TEXT",
    "Source","TEXT",
    "SourceSearch","TEXT",
    "CreatedDate","TEXT",
    "deleted", "TEXT"
    )
    .catch(err => { console.log(err)})
}


//172.22.0.14



