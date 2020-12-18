import React, { Component } from "react";
import logo from "./logo.svg";
import "./App.css";
import BootstrapTable from 'react-bootstrap-table-next';
import paginationFactory from 'react-bootstrap-table2-paginator';
import cellEditFactory from 'react-bootstrap-table2-editor';
import filterFactory, { textFilter, Comparator } from 'react-bootstrap-table2-filter';
import PropTypes from 'prop-types'
import 'bootstrap/dist/css/bootstrap.min.css';

const products = []
for (let z=0; z < 200; z++) {
  products.push({
    ZoneName: "Zone-"+z+".com",
    _clientId : "Owner "+z,
    CreatedDate : Math.round(Math.random() * 100)
  })
}

const columns = [{
  dataField: 'ZoneName',
  text: 'Zone',    
  sort: true,
  filter: textFilter()
}, {
  dataField: '_clientId',
  text: 'Owner'
}, {
  dataField: 'CreatedDate',
  text: 'Created'
}];

const defaultSorted = [{
  dataField: 'name',
  order: 'desc'
}];

const cellEditProps = {
  mode: 'click'
};

const RemoteAll = ({ data, page, sizePerPage, onTableChange, totalSize }) => (
  <div>
    <BootstrapTable
      remote
      keyField="id"
      data={ data }
      columns={ columns }
      defaultSorted={ defaultSorted }
      filter={ filterFactory() }
      pagination={ paginationFactory({ page, sizePerPage, totalSize }) }
      cellEdit={ cellEditFactory(cellEditProps) }
      onTableChange={ onTableChange }
    />
  </div>
);

RemoteAll.propTypes = {
  data: PropTypes.array.isRequired,
  page: PropTypes.number.isRequired,
  totalSize: PropTypes.number.isRequired,
  sizePerPage: PropTypes.number.isRequired,
  onTableChange: PropTypes.func.isRequired
};

class Zones extends React.Component {
  constructor(props) {
    super(props);
    this.handleTableChange = this.handleTableChange.bind(this);
    this.state ={
      data: [],
      totalSize:0,
      page: 1,
      users : props.users
      }
  }
  componentDidMount() {
    const self = this
    this.fetchData(1,10,"").then(function(result){
      self.setState({
        data: result.data,
        totalSize:result.totalSize,
      });
    })

  }
  fetchData (page, sizePerPage, query) {
    var self = this;
    query = query ? query : "*"
    return fetch("http://localhost:9000/api/zones/"+page+"/"+sizePerPage+"/"+query+"/"+"ZoneName"+"/"+"ASC/"+ (this.state.users.length > 0  ? this.state.users.join("|") : "ascio"),
    {
      method: 'POST', 
      body: JSON.stringify({
        page, sizePerPage,query, sort : "ASC",users: this.state.users
      })
      
    })
      .then(res => res.json())
      .then((result) => {
        const zones  = result.props.data
        self.setState(() => ({
          page,
          data: zones,
          totalSize:result.props.totalSize,
          isLoaded:true,
          sizePerPage
        }))      
        return result.props
      }, (error) => {
        this.setState({
          isLoaded: true,
          error
        })
      })
  }
  handleTableChange = (type, { page, sizePerPage, filters, sortField, sortOrder, cellEdit }) => {
    const query = Object.keys(filters).map(filterName => {
      const filter = filters[filterName]
      return "@" + filterName + "Search:" + filter.filterVal.replace(/\./g,"").replace(/\-/,"_")+"*"
    })
    this.fetchData(page, sizePerPage,query.join(" "))
  }

  render() {     
    console.log("render")
    const  { data, sizePerPage, page } = this.state;
    return (
      <RemoteAll
        data={ data }
        page={ page }
        sizePerPage={ sizePerPage }
        totalSize={ this.state.totalSize }
        onTableChange={ this.handleTableChange }
      />
    );
  }
}
export default Zones