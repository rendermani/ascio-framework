import React from "react";
import TreeView from "@material-ui/lab/TreeView";
import ExpandMoreIcon from "@material-ui/icons/ExpandMore";
import ChevronRightIcon from "@material-ui/icons/ChevronRight";
import { TreeItem } from '@material-ui/lab';
import 'fontsource-roboto';
import { red } from "@material-ui/core/colors";

class CustomerTreeItem extends React.Component {
  constructor (props) {
      super (props)
      this.state = {
          childNodes : null,
          expanded : [],
          test : null
      }
      this.handleChange = this.handleChange.bind(this);
      this.onNodeSelect = this.onNodeSelect.bind(this);
      this.onTreeChange = props.onTreeChange;
  }
  fetchChildNodes(id) {
    return fetch("http://localhost:9000/api/users/"+id+"/subusers")
    .then(children => children.json())   
    .then(children => {
      console.log(children)
      return children
    })
  }

  handleChange = (event, nodes) => {
    const self = this
    const expandingNodes = nodes.filter(x => !this.state.expanded.includes(x));
    this.setState({expanded:nodes});
    if (expandingNodes[0]) {
      const childId = expandingNodes[0];
      this.fetchChildNodes(childId).then(result => {
        self.setState({childNodes: result.children.map(node => <CustomerTreeItem onTreeChange={self.onTreeChange} key={node.id} {...node} />) })                
      }
      ).catch(err => { console.log(err)})
    }
  };
  onNodeSelect(e,value) {
        this.onTreeChange(value)
  }
  render () {
    return (
        <div>
        <TreeView
          defaultCollapseIcon={<ExpandMoreIcon />}
          defaultExpandIcon={<ChevronRightIcon />}
          expanded={this.state.expanded}
          onNodeToggle={this.handleChange}
          onNodeSelect={this.onNodeSelect}
        >
          {/*The node below should act as the root node for now */}
          <TreeItem nodeId={this.props.id} label={this.props.name}>
            {this.state.childNodes || [<div key="stub" />]}
          </TreeItem>
        </TreeView>
        </div>
      );
  }
} 
 export default CustomerTreeItem
