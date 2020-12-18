const zoneformat = require("../lib/zoneformat")
const config = require("../lib/config.js")
const ObjectStorage = require("../db/RedisObject")
const Dns = require("../db/Dns")
const User = require("../db/User")
const AscioDns = require("../api/AscioDns")

class Zone {
    async create(createParameters) {
        const owner = createParameters.owner
        const zoneName = createParameters.zoneName
        const api = createParameters.api
        const ascioDns = new AscioDns()
        const zone = await ascioDns.createZone(zoneName, owner)
        const objectStorage = new ObjectStorage(owner ,config.nsObjects()+":zone")
        objectStorage.setArrayKeys({Record:"Id"})
        zone._type = "Zone"
        zone.deleted = "false"
        await  objectStorage.store(zoneName,zone)
        return await this.search(createParameters.filters)

    }
    async delete(zoneName,searchParameters) {
        const ascioDns = new AscioDns()
        await ascioDns.deleteZone(zoneName)
        const dnsDb = new Dns()
        await dnsDb.deleteZone(zoneName)
        return await this.search(searchParameters)
    }
    async search(searchParameters) {
        const dns = new Dns("ascio");
        const sort = {
            field : searchParameters.sortField || "CreatedDate",
            order : searchParameters.sortOrder || "DESC"
        }
        let filtersString = searchParameters.filter == "*" ? "" : searchParameters.filter
        filtersString = filtersString.replace("_clientIdSearch","_clientId")
        const user = new User(searchParameters.users);
        const users = await user.getAllChildKeys()
        const usersShort = users.concat([searchParameters.users]).map((user) =>{
            const tokens = user.split(":")
            return tokens[tokens.length - 1]
        })
        return await dns.searchZones(usersShort,filtersString,searchParameters.page,searchParameters.sizePerPage,sort)
    }
    updateOwner () {

    }


}
module.exports = new Zone()
