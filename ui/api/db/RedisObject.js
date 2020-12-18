const logger = require('../lib/logger')
const config = require("../lib/config.js")
const redis = require("./RedisDb.js").client


class RedisObject {    
    constructor(clientId,prefix) {
        this.arrayKeys = {}
        this.prefix = prefix
        this.clientId = clientId
        this.key = "ZoneName"
        this.replaceIndexNames = ["ZoneName" , "Source", "Target", "_objectName", "_clientId"]
    }
    setArrayKeys(arrayKeys) {
        this.arrayKeys = arrayKeys
    }
    store(key,data) {
        console.log("store: "+ key)
        data.deleted = "false"
        return new Promise((resolve, reject) => {
            const self = this 
            const transaction = redis.multi()
            data._objectName = key
            self.createHash(transaction,this.prefix,key,data)
            transaction.exec((err,result) => {
                if(err) {
                    reject(err)
                } else {
                    resolve(result)
                }
            })
        })         
     }
    createHash(transaction,prefix,key,data) {
        const self = this
        Object.keys(data).forEach(function(keyChild) {
            let value = data[keyChild]
            
            // Array

            if(value instanceof Array) {
                const arrayKey = self.arrayKeys[keyChild];
                if(!arrayKey) {
                    throw new Error("Please define an ArrayKey for "+keyChild)
                }
                value.forEach(item => {
                    const itemId = item[arrayKey]
                    logger.debug("[RedisObject.sadd]: "+prefix + ":" + key+":"+keyChild+" value: "+itemId)
                    transaction.sadd(prefix + ":" + key+":"+keyChild, itemId)
                    self.createHash(transaction,prefix+":"+key+":"+keyChild,itemId,item)
                });
            } 

            // Type
            
            else if(key === "attributes")  {
                if(keyChild === "i:type") {
                    logger.debug("[RedisObject.hmset]: "+prefix+", key: _type, value: "+value)
                    transaction.hmset(prefix,"_type",value)                    
                }
            }

            // Date

             else if(value instanceof Date)  {
                logger.debug("[RedisObject.hmset]: "+prefix+":"+key+", key: "+keyChild+", value: "+value.valueOf())
                transaction.hmset(prefix+":"+key,keyChild,value.valueOf())
            }

            // Object

            else if(value instanceof Object) {   
                logger.debug("[RedisObject.hmset]: "+prefix+":"+key+", key: _clientId, value: "+self.clientId)  
                transaction.hmset(prefix+":"+key, "_clientId",self.clientId)                
                self.createHash(transaction,prefix+":"+key,keyChild,value)
            } 
            
            // String

            else {
                if(self.replaceIndexNames.includes(keyChild) === true ) {                   
                    if(typeof value=="string") {                            
                        const search = value.replace(/\./g,"").replace(/\-/g,"_")
                        //console.log("[RedisObject.hmset] prefix: "+prefix+":"+key+", key: "+keyChild+"Search, value: "+ search )
                        transaction.hmset(prefix+":"+key,keyChild+"Search",search)
                    }
                }
                logger.debug("[RedisObject.hmset] prefix: "+prefix+":"+key+", key: "+keyChild+", value: "+ value )
                transaction.hmset(prefix+":"+key,keyChild,value)
            }
        })
    }
    search(permittedUsers,query,start,length,sort) {
        if(permittedUsers == undefined) throw new Error("permittedUsers is undefined")
        const self = this
        query = query.replace(/\.|\-/g,"")  
        console.log("FT.SEARCH objects \"" + self.getPermissionFilter(permittedUsers) + " " +query+ "\" limit "+(start-1)+" "+length+ " SORTBY "+sort.field+" "+sort.order)
        console.log("limit",start,length)
        return redis.async.ft_search("objects",self.getPermissionFilter(permittedUsers) + " " +query,"limit",start-1,length,"sortby",sort.field,sort.order)
        .then(function(result) {
            console.log("done")
            return reformat(result)
        }).catch(err => { console.log(err)})
    } 
    getPermissionFilter(users) {
        users = users instanceof Array ? users :[users] 
        return "@_clientId:("+users.join("|")+")"
    }   
}
var reformat = function (result) {
    const out = [];
    for(let i = 1; i < result.length; i=i+2) {
        let hash = result[i+1]
        hash = reformatHash(hash)
        hash.prefix = result[i]
        out.push(hash)
    }
    console.log("count results:" + result[0])
    return {data: out, totalSize: result[0] }
}
var reformatHash = function (result) {
    const out = {};
    for(let i = 0; i < result.length; i=i+2) {
        const value = result[i+1]
        const key = result[i]
        if(key == "ZoneName") {
            out["key"] = value
        }
        out[key] = value
    }
    return out;                  
}
module.exports = RedisObject