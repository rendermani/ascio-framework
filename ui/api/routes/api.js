const express = require("express");
const router = express.Router();
const Dns = require("../db/Dns")
const User = require("../db/User")
const AscioDns = require("../api/AscioDns")
const passport = require("passport");
const jwt = require('jsonwebtoken');
const jwtSecret = "egVYcD-_U52DBMrYhgN9D4T4yp4eYaL2yqnkruZyh37bbjkaATpNi8F1mfdpThbD"
const zoneformat = require("../lib/zoneformat")
const config = require("../lib/config.js")
const zone = require("../lib/zone")
const { ensureAuthenticated } = require('../config/auth');

router.get("/", function(req, res, next) {
    res.send("API is working properly");
});

// search zones

router.post("/zones/search",ensureAuthenticated,async function(req, res, next) {
    const result = await zone.search(req.body)
    return res.send(result)  
});

// get the zone with records 

router.get("/zone/:zoneName",ensureAuthenticated, async function(req, res, next) {
    const dns = new Dns("ascio");
    const records = await dns.getRecords(req.params.zoneName)
    res.send({records})
});

// create a zone

router.post("/zone",ensureAuthenticated, async (req, res) => {
    try {
        const zoneList = await zone.create(req.body)
        res.send(zoneList)
    } catch(error) {
        const message =  error.StatusMessage ? error.StatusMessage : error.message
        res.status(400).send({message})
    }
})
router.delete("/zone/:zoneName",ensureAuthenticated, async (req, res) => {
    try {
        const zoneList = await zone.delete(req.params.zoneName,req.body)
        res.send(zoneList)
    } catch(error) {
        const message =  error.StatusMessage ? error.StatusMessage : error.message
        res.status(400).send({message})
    }
})
// create a record

router.post("/record/:zoneName",ensureAuthenticated, async (req, res) => {
    const zoneName = req.params.zoneName
    const record = zoneformat.recordToApi(zoneName,req.body)
    const dns = new AscioDns();    
    dns.updateRecord(zoneName,record,"Create")
    .then( async (result) => {
        const dnsDb = new Dns()
        await dnsDb.createRecord(zoneName,result)
        return result
    })
    .then((result) => {
        res.send(result)
    })
    .catch((error) => {
        const message = error.Values ? error.StatusMessage + ". " +error.Values.string.join(". ")+"." : error.message
        res.status(400).send({message})
    })    
})

// update a record 

router.put("/record/:zoneName",ensureAuthenticated, async (req, res) => {
    const zoneName = req.params.zoneName
    const record = zoneformat.recordToApi(zoneName,req.body)
    const dnsApi = new AscioDns();
    dnsApi.updateRecord(zoneName,record,"Update")
    .then(async (result) => {
        const dnsDb = new Dns()
        await dnsDb.updateRecord(zoneName, result)
        res.send(record)
    })
    .catch((error) => {
        console.log("error: ", error)
        const message = error.Values ? error.StatusMessage + ". " +error.Values.string.join(". ")+"." : error.message
        res.status(400).send({message })
    })    
})

// delete a record

router.delete("/record/:zoneName/:id",ensureAuthenticated, async (req, res) => {
    const id = req.params.id
    const zoneName = req.params.zoneName
    const dnsApi = new AscioDns();
    dnsApi.deleteRecord(id)
    .then(async () => {
        const dnsDb = new Dns()
        await dnsDb.deleteRecord(zoneName,id)
        res.send({Id: id,zoneName})
    })
    .catch((error) => {
        console.log(error)
        const messages = error.Values ? error.Values.string.join(". ")+"." : ""
        res.status(400).send({message: error.StatusMessage + ". " + messages })
    })    
})
router.get("/users/:username/subusers",ensureAuthenticated, function(req, res, next) {
    const user = new User(req.params.username);
    user.getChildren().then(children => {
        res.send({children :children.map(child => {
            return {
                id : child.username,
                name : child.company                
            }
        })})
    })  
});
router.get("/users/:username/allsubusers",ensureAuthenticated, function(req, res) {
    const user = new User(req.params.username);
    user.getAllChildren().then(fullChildren => {
        const children = fullChildren.map((child) => {
            const tokens = child.username.split(":")
            const shortUserName =  tokens[tokens.length - 1]     
            return {
                id : shortUserName,
                name : child.company
            }
        })
        res.send({children})
    })
});
router.post("/users/register",ensureAuthenticated, function(req, res, next) {
    const user = new User(req.body.username) 
    user.create(req.body, req.headers.origin).then(result => {
        res.send(result)
    }).catch(error => {  
        res.send({error})
    })
})
router.post("/users/set2faLevel", ensureAuthenticated ,(req, res)  => {
    const user = new User(req.body.username) 
    user.set2faLevel(req.body.level)
    res.send({message : 'ok'})
})

router.post("/users/activate2fa", ensureAuthenticated ,(req, res)  => {
    const user = new User(req.body.username) 
    user.activate2fa(req.body.status)
    res.send({messsage : 'ok'})
})
router.get("/users/qr", ensureAuthenticated ,async(req, res, next)  => {
    const user = new User(req.body.username) 
    const qr = await user.getQrCode(config.get("hoster"))
    res.send({qr})
})
router.post("/users/verifyTotpCode", ensureAuthenticated ,async (req, res, next)  => {
    const user = new User(req.body.username) 
    try{
        await user.verifyTotpCode(req.body.code)  
        res.send({message:'ok'})
    } catch (err) {
        res.status(401).send("Invalid Google Authenticator Code")
    }
    
})
router.post("/users/authenticate", async (req, res, next) => {
    
    passport.authenticate("2fa-totp", async (err, user) => {
        if (err && err.showQR) {
            return res.status(401).send(err)
        } 
        else if(!err && !user) {
            user = new User(req.body.username);
            if( ! await user.is2faEnabled()) {
                err = {qr : await user.getQrCode()}
                return res.status(401).send(err)
            } else {
                return res.status(401).send({message:"Invalid credentials"})
            }
        }
        else if (err || !user) {
            return res.status(401).send({message:"Invalid credentials"})
        }
        else {   
          console.log("success login into 2fa") 
          user.activate2fa(true)    
          req.logIn(user, async (err) => {
            if (err) return res.status(401).send("Invalid credentials")            
            const token = jwt.sign({
                data: user,
                exp: Math.floor(Date.now() / 1000) + (60 * 60)
             }
            ,jwtSecret)
            const newUser = new User(user.username)
            await newUser.storeJwtToken(token)
            res.send ({
                user,        
                token
            })
          });
        }
      })(req, res, next);   
})

router.get("/session", ensureAuthenticated,(req,res) =>{
    return {message:"ok"}
})


module.exports = router;