

(async function(){
    try {
        const User = require("./db/User")
        const tucows = new User("tucows")
        await tucows.create({company : "Tucows",email: "tucows@softgarden.no", password: "smurf4405"})
        
        const ascio = new User("ascio")
        await ascio.create({company : "Ascio",email: "ascio@softgarden.no", password: "smurf4405"})

        const webrender = new User("webrender")
        await webrender.create({company : "Webrender",email: "webrender@softgarden.no", password: "smurf4405"})

        const softgarden = new User("softgarden")
        await softgarden.create({company : "Softgarden",email: "softgarden@softgarden.no", password: "smurf4405"})
        
        const orkla = new User("orkla")
        await orkla.create({company : "Orkla",email: "orkla@softgarden.no", password: "smurf4405"})
        
        const orkla_no = new User("orkla_no")
        await orkla_no.create({company : "orkla_no",email: "orkla_no@softgarden.no", password: "smurf4405"})
        
        const sapagroup = new User("sapagroup")
        await sapagroup.create({company : "Sapagroup",email: "sapagroup@softgarden.no", password: "smurf4405"})
    
        await sapagroup.setParentKey(softgarden.ns())
        await orkla_no.setParentKey(orkla.ns())
        await orkla.setParentKey(softgarden.ns())
        await softgarden.setParentKey(ascio.ns())
        await webrender.setParentKey(ascio.ns())
        await ascio.setParentKey(tucows.ns())   
    }  catch (err) {
        console.log("ERROR: ",err)
    }
})()


//
