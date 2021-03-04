const redis = require('./RedisDb.js').client
const bcrypt = require('bcryptjs');
const config = require('../lib/Config.js')
var GoogleAuthenticator = require('passport-2fa-totp').GoogeAuthenticator;
class User {
    constructor (username) {
        if(username) {
            if(username.indexOf(":") > -1 ) {
                const tokens = username.split(":")
                username = tokens[tokens.length -1]
            }
            this.username = username
        }
    }
    ns() {
        return config.ns() + this.username
    }
    create(userdata,parentDomain) { 
        const saltRounds = 10
        const self = this
        return new Promise((resolve, reject) => {
            self.userExists(userdata.username)
            .then((userExists) => {
                if(userExists) {
                    throw("Cannot create user. Username already exists.")                     
                }
            }).then(() => {
                return self.emailExists(userdata.email)
            }).then((email)=> {
                if(email) {
                    throw("Cannot create user. Email already exists.")
                }
            }).then(() => {
                bcrypt.genSalt(saltRounds, function(err, salt) {
                    const transaction = redis.multi()               
                    bcrypt.hash(userdata.password, salt, function(err, hash) {
                        userdata.username = self.username || userdata.username;
                        userdata.password = hash
                        
                        transaction.sadd(config.ns()+":email",userdata.email)
                        Object.keys(userdata).forEach((key) => {
                            const value = userdata[key];
                            transaction.hset(self.ns(),key,value);         
                        })                     
                        transaction.exec((err,result) => {
                            if(err) reject(err)
                            else resolve (result)
                        })
                    })
                });
            }).catch((err) => {
                console.log(err)
                reject(err)
            })       
        })
    }
    userExists(username) {
        return redis.async.hget(this.ns(),"username").then((usernameOld) => {
            return usernameOld === username
        })
    }
    emailExists(email) {
        if(!email) return Promise.reject("Please provide an email-address"); 
        return redis.async.sismember(config.ns()+":email",email)
    }
    async createSession(res) {
        let cookieValue = await bcrypt.hash("GwHRvdYDyIwz0bVY3xPP",10)
        res.cookie("usersession",cookieValue).send({user: this.username, message: "Welcome back"})
        redis.db.asnyc.set(this.ns()+":session:"+cookieValue,this.username)
    }
    async checkLogin(username,password) {
        const hash = await redis.async.hget(config.ns()+username,"password")
        const validPassword = await bcrypt.compare(password, hash);
        if(validPassword) {
            return true
        }
        else {
            return false
        }
    }
    async get() {
        console.log("Get user: hgetall "+this.ns())
        const data = await redis.async.hgetall(this.ns())
        const self=this
        if(!data) throw new Error("user not found")
        Object.keys(data).forEach(key => {
            self[key] = data[key]
        })
        return this; 
    }
    async getSecure() {
        const restricted = ["secret","password"]
        const data = await redis.async.hgetall(this.ns())
        console.log("Get user: hgetall "+this.ns())
        Object.keys(data).forEach(key => {
            if(restricted.indexOf(key)) return; 
            self[key] = data[key]
        })
        return this; 
    }
    setParentKey(parent) {
        const self = this;
        const transaction = redis.multi();
        console.log("set parent: ", parent)
        transaction.set(this.ns() + ":parent",parent)
        transaction.sadd(parent+":children",this.ns()) 
        console.log("sadd "+parent+":allchildren "+this.ns())    
        transaction.sadd(parent+":allchildren",this.ns())      
        return new Promise((resolve, reject) => {
            transaction.exec((err,result) => {
                if(err) reject(err)
                else resolve (result)
            })
        }).then(() => {
            self.copyAllChildrenToParent(parent)
        })
    }
    getParentKey() {
        const self = this
        return new Promise((resolve, reject) => {
            redis.async.get(this.ns()+":parent")
            .then((result) =>{
                if(result) {
                    self.parentKey = result;
                    resolve (result)
                }
                else(reject("no parent"))
            })
        })
    }
    copyAllChildrenToParent(parentKey) {
        const self = this
        console.log("["+parentKey+"] smembers "+this.ns()+":allchildren")
        return redis.async.smembers(this.ns()+":allchildren").then((result) => {
            (async function (){
                for(let i=0; i<result.length; i++) {
                    console.log("SADD "+parentKey+":allchildren"+" "+result[i])
                    await redis.async.sadd(parentKey+":allchildren",result[i])
                }                
            })()
            return parentKey
        }).then(function (parentKey){
            const parent = new User(parentKey)
            return parent.getParentKey().then((result) => {
                return {parent: parentKey, parentParent: result }
            })
        }).then((result) => {
            const parentUser = new User(result.parent)
            return parentUser.copyAllChildrenToParent(result.parentParent)
        }).catch((err) => {
            console.log(err)
        })
    }
    getChildren() {
        return this.getChildKeys()
        .then((keys) => {        
            return new Promise((resolve, reject) => {
                (async function () {                
                    const out = []
                    for(let i = 0; i < keys.length; i++) {
                        console.log(keys[i])
                        const child = await redis.async.hgetall(keys[i])
                        out.push(child)
                    }
                    return resolve(out)
                })() 
            })
        }).catch((err) => {
           console.log("error",err)
        })
    }
    getAllChildren() {
        return this.getAllChildKeys()
        .then((keys) => {        
            return new Promise((resolve, reject) => {
                (async function () {                
                    const out = []
                    for(let i = 0; i < keys.length; i++) {
                        const child = await redis.async.hgetall(keys[i])
                        out.push(child)
                    }
                    return resolve(out)
                })() 
            })
        }).catch((err) => {
           console.log("error",err)
        })
    }
    setPassword () {
        return new Promise((resolve, reject) => {
            bcrypt.genSalt(10, (err, salt) => {
                bcrypt.hash(newUser.password, salt, (err, hash) => {
                  if (err) reject(err)
                  hset(this.ns(),"password",hash);
                  resolve(hash)
                });
            })
        })
    }     
    async getQrCode() {
        const qr = await redis.async.hget(this.ns(),"qr")
        if(qr) {
            return qr
        } else {
            const hoster = " ("+  config.get("hoster") + ")";
            const setup = GoogleAuthenticator.register(this.username + hoster)
            this.set2faSecret(setup.secret)
            redis.async.hset(this.ns(),"qr",setup.qr)
            return setup.qr;
        }        
    }
    set2faSecret(data) {
        return redis.async.hset(this.ns(),"secret",data)          
    }
    get2faSecret(data) {
        return redis.async.hget(this.ns(),"secret")          
    }
    activate2fa(boolean) {
        return redis.async.hset(this.ns(),"2fa_status",boolean ? "enabled" : "disabled")  
    }
    set2faStatus(status) {
        return redis.async.hset(this.ns(),"2fa_status",status)  
    }
    get2faStatus() {
        return redis.async.hset(this.ns(),"2fa_status")  
    }
    async is2faEnabled() {
        const status = await redis.async.hget(this.ns(),"2fa_status")  
        return status === "enabled"
    }
    /**
     * 
     * @param {string} level force|optional|disabled. Default force
     */
    set2faLevel(level){
        redis.async.hset(this.ns(),"2fa_level",level)  
    }

    /**
     * 
     * return force|optional|disabled. Default force
     */
    async getForce2fa(){
        const result = await redis.async.hget(this.ns(),"2fa_level")  
        return result||"force" 
    }
    async verifyTotpCode () {
        return null;
    }
    getUsername() {
        return redis.async.hget(this.ns(),"username")
    }
    getPassword () {
        return redis.async.hget(this.ns(), "password")
    }
    getChildKeys() {
        return redis.async.smembers(this.ns()+":children")
    }
    getAllChildKeys () {
        return redis.async.smembers(this.ns()+":allchildren")
    }
    async storeJwtToken (token) {
        console.log("get " + config.ns()+"jwt:"+token )
        return await redis.async.set(config.ns()+"jwt:"+token,this.ns())
    }
    async getUserFromJwt(token) {        
        const ns =  await redis.async.get(config.ns()+"jwt:"+token)
        const tokens = ns.split(":")
        this.username = tokens[tokens.length -1]
        return await this.get()
    }

}

module.exports = User;