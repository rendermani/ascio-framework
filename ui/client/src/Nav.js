import React from 'react'
import './App.css'
import {Link} from 'react-router-dom'
function Nav () {
    return (
       <nav>
           <h3>logo</h3>
           <ul className="nav-links">
               <Link to="/about"><li>About</li></Link>               
               <Link to="/users/login"><li>Login</li></Link>  
               <Link to="/register"><li>Register</li></Link>  
               <Link to="/dns-manager"><li>DnsManager</li></Link>  
            </ul>
       </nav>
    )
}
export default Nav