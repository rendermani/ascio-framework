const fs = require('fs');
const User = require('../db/User')
const file = fs.readFileSync("../data/users.csv","utf8");
const lines = file.toString().split("\r\n");
var generator = require('generate-password');

const users = lines.forEach(async line => {
    const fields = line.split(";")
    const parent = new User()
    try {
        await parent.create({
            company : fields[0],
            username : fields[2],
            email : fields[2]+"@softgarden.no",
            password : generator.generate({
                length: 10,
                numbers: true,
                symbols : true
            })
        })
        console.log("Created user "+user.username+ ", Password: ", user.password)        
        if(parent.name !=  fields[3]) {
            const user = new User
            await user.create({
            company : fields[1],
            username : fields[3],
            email : fields[3]+"@softgarden.no",
            password : generator.generate({
                length: 10,
                numbers: true,
                symbols : true
            })
        }) 
        console.log("Created user "+parent.username+ ", Password: ", parent.password)
            user.setParentKey(parent.ns())
        }
    } catch (err) {
        console.log("ERRRRPR",err);
    }


})
