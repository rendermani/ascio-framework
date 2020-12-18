const jwtSecret = "egVYcD-_U52DBMrYhgN9D4T4yp4eYaL2yqnkruZyh37bbjkaATpNi8F1mfdpThbD"
const jwt = require('jsonwebtoken');

module.exports = {
    ensureAuthenticated: function(req, res, next) {
      const token = req.headers.authorization
      if(!token) return res.status(401).send()
      try {
        console.log("token", token)
        console.log("jwtSecret", jwtSecret)
        jwt.verify(token,jwtSecret)
        return next();
      } catch (e) {
        console.log(e)
        res.status(401).send()
     }

    }
  };