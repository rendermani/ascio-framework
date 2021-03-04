function toFQDN(zoneName, recordContent) {
    if(recordContent.endsWith(zoneName)) {
        return recordContent; 
    }
    if(recordContent == "@") {
        recordContent = zoneName
    } else if(!recordContent.endsWith(".")) {
        recordContent =  recordContent + "."  + zoneName
    } 
    return recordContent
}
function fromFQDN (zoneName, recordContent) {
    if(recordContent == zoneName) {
        recordContent = "@"
    } else if(recordContent.endsWith(zoneName)) {
        recordContent =  recordContent.replace(zoneName)
    }
    return recordContent
}
    
module.exports.recordToApi = function (zoneName, record) {
    record.Source = toFQDN(zoneName,record.Source)
    if(record._type == "CNAME") {
        record.Target = toFQDN(zoneName,record.Target)
    }
    return record
}
module.exports.recordFromApi = function (zoneName, record) {
    record.Source = fromFQDN(zoneName,record.Source)
    if(record._type == "CNAME") {
        record.Target = fromFQDN(zoneName,record.Target)
    }  
    return record  
}