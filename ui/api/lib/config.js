const fs = require('fs');

class Config {
    constructor() {
        const result = fs.readFileSync(__dirname + "/../config/config.json");
        this.config = JSON.parse(result)
    }
    ns () {
        return this.config.namespace + ":" 
    }
    nsObjects() {
        return this.config.namespaceObjects
    }
    getEnv() {
        return this.config.environment
    }
    get(key) {
        if (!this.config[key] ) throw new Error("Key "+key+" is not configured in the config.json file")
        return this.config[key] 
    }
}
module.exports = new Config()