import React, { Component } from "react";
import Zones from './Zones.js'
import CustomerTreeItem from './TreeView.js'
import './App.css'

class DnsManager extends Component {
    constructor(props) {
        super(props);
        this.state = { selectedSubUsers: [], refresh: false};
        const elem = document.getElementById("root")
        this.onTreeChange = this.onTreeChange.bind(this)
    }
    onTreeChange(user) {      
      const self = this; 
      fetch("http://localhost:9000/api/users/"+user+"/allsubusers")
      .then(result => result.json())
      .then(result => {
        const users = result.children.map(user => {
          const tokens = user.split(":")
          return tokens[tokens.length - 1]      
        })
        self.setState({selectedSubUsers : users.concat([user]), refreshZone: Math.random()})


      })
    }
    render() {
        return (
            <>
                <div className="row">
                    <div className="col">
                        <CustomerTreeItem id="tucows" name="Tucows"  onTreeChange={this.onTreeChange} />
                    </div>
                    <div className="col-10">
                        <Zones key={this.state.selectedSubUsers.join("-")} users={this.state.selectedSubUsers} refresh={this.state.refreshZone}/>   
                    </div>
                </div>
            </>
        )
    }
}
export default DnsManager