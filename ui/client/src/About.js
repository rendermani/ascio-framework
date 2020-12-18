import React, { useEffect, useContext } from 'react';
import './App.css'
import { SessionContext} from "./Session";

function About () {
    return (
        <SessionContext.Consumer>
        {({user, logoutUser}) => (
            <div className="App">
                <div>{user.username}</div>
                <button onClick={logoutUser}>Logout</button>
            </div>
        )}          

    </SessionContext.Consumer>            
    )
}
export default About