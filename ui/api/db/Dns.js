const RedisObject = require('./RedisObject')
const redis = require("./RedisDb.js").client
const config = require('../lib/config')

class DnsDb extends RedisObject {
    constructor (client) {
        super(client, config.nsObjects())
    }
    searchZones(permittedUsers, query, start,pageSize,sort) {
        return this.search(permittedUsers, '@deleted: false @_type: Zone '+query,start,pageSize,sort)          
    }
    async getRecords(zoneName) {
        const list = await redis.async.smembers(config.nsObjects()+":zone:"+zoneName+":Records:Record")
        const records = [];
        for(let i = 0; i < list.length; i++) {
            const recordId = list[i]
            const record = await redis.async.hgetall(config.nsObjects()+":zone:"+zoneName+":Records:Record:"+recordId)
            record.key = record.Id
            records.push(record)
        }
        return records
    }
    async updateRecord(zoneName,record) {
        this.clientId =  await this.getUser(zoneName)
        return await this.store("zone:" + zoneName+ ":Records:Record:" + record.Id, record)
    }
    async createRecord(zoneName,record) {
        this.clientId =  await this.getUser(zoneName)
        await this.store("zone:" + zoneName+ ":Records:Record:" + record.Id, record)
        console.log("SADD "+config.nsObjects()+":zone:"+zoneName+":Records:Record "+record.Id)
        return await redis.async.sadd(config.nsObjects()+":zone:"+zoneName+":Records:Record",record.Id)
    }
    async deleteRecord(zoneName, id) {
        await redis.async.del(config.nsObjects()+ ":zone:" + zoneName+ ":Records:Record:" + id)
        return await redis.async.srem(config.nsObjects()+":zone:"+zoneName+":Records:Record",id)
    }
    async getUser(zoneName) {
        return redis.async.hget(config.nsObjects() + ":zone:"+zoneName,"_clientId")
    }
    async deleteZone(zoneName) {
        await redis.async.hset(config.nsObjects() + ":zone:"+zoneName,"deleted", true)
    }
}

module.exports = DnsDb