import React, { Component } from "react";
import "./App.css";
import 'bootstrap/dist/css/bootstrap.min.css';
import Nav from './Nav.js'
import About from './About.js'
import Login from './Login.js'
import Register from './Register.js'
import DnsManager from './DnsManager.js'
import {BrowserRouter as Router, Switch, Route} from 'react-router-dom'
import { SessionContext, getSessionCookie, setSessionCookie } from "./Session";
class App extends Component {
    constructor(props) {
        super(props);
        this.state= {user: {username:"rendermani"}}       
        this.logout = this.logout.bind(this);
        this.login = this.login.bind(this);
    }
    logout() {
      this.setState({user: {}});
    }
    login(username) {
      this.setState({user: {username}});
    }
    render() {
      const value = {
        user: this.state.user,
        logoutUser: this.logout
      }
      
      return (
        <SessionContext.Provider value={value}>
          <Router>
            <div className="App">
              <Nav/>
              <Switch>              
                <Route path="/dns-manager" exact component={DnsManager}/>
                <Route path="/users/login" exact component={Login}/>
                <Route path="/about" exact component={About}/>
                <Route path="/register" exact component={Register}/>
              </Switch>
            </div>
          </Router>
        </SessionContext.Provider>
      );
    }
}

export default App;