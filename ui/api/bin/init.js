const DnsClient =  require("../api/AscioDns")
const ObjectStorage = require("../db/RedisObject")
const redis = require("../db/RedisDb")
const config = require ("../lib/config")
const dnsClient = new DnsClient()

redis.createIndex().then(() => {
    dnsClient.syncZones(function(zone,i,length){
        console.log("("+i+"/"+length + ")  Storing zone: " + zone.ZoneName)
        let rand = Math.round(Math.random() * 6);
        let users = ["softgarden","ascio","tucows","orkla","orkla_no","sapagroup","webrender"]
        objectStorage = new ObjectStorage(users[rand],config.nsObjects()+":zone")
        objectStorage.setArrayKeys({Record:"Id"})
        zone._type = "Zone"
        return objectStorage.store(zone.ZoneName,zone)
    })
}).catch(function(err) {
    console.log(err)
})





