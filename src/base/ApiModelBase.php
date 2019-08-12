<?php
namespace ascio\base;

use ascio\lib\Changes;
use ascio\lib\Ascio;

class ApiModelBase  implements Rest {
	protected $_parent;
	protected $primaryKey = "_id";
	protected $_properties=[];
    protected $_objects=[];
    private $_client;
    private $_changes;
    public function __construct($parent=null) {
        $this->_parent = $parent;
        $this->_client = Ascio::getClient("v2");  
        $this->_changes = new Changes($this->parent());   
    }
	function create($data=null) {
		throw new Exception("Not implemented yet.");
	}
	function update($data=null) {
		throw new Exception("Not implemented yet.");
	}
	function delete($id=null) {
		throw new Exception("Not implemented yet.");
    }
    /**
	 * @return DbBase
	 */
    function get($handle=null) {
        $obj = $this->parent();
        $handle = $handle ? $handle : $obj->getHandle();
        $name = (new \ReflectionClass($obj))->getShortName();
        $result = $this->getClient()->{"get".$name}($handle);
		$obj->set($result->{"get".$name}());
		$obj->produce();		
		return $obj; 
	} 
	public function parent(?BaseClass $parent = null) {
        if(!$parent) {
            return $this->_parent; 
        }
		$this->_parent = $parent;
		return $parent; 
    }
	public function config($config = null) {
        if(!$config) {
            return $this->_config; 
        }
		$this->_config = $config;
		return $config; 
    }
    public function setClient(Service $client) {
        $this->_client = $client;
    } 
    public function getClient() {
        return $this->_client;
    } 
    public function changes() : Changes {
        return $this->_changes;
	}
	
}

