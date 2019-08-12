<?php

namespace ascio\base;

class DbArrayBase extends DbBase implements ArrayInterface,\Iterator,\countable {
    /**
     * @var Model $_db;
     */
    protected $_db;
    /**
     * @var ApiModelBase $_api;
     */
    protected $_api;    
    protected $_id;
    private $position;
    public function __construct($parent=null)
    {        
        parent::__construct($parent);
    }
    public function rewind() {
        $this->position = 0;
    }
    public function current() {
        return $this->toArray()[$this->position];
    }
    public function key() {
        return $this->position;
    }

    public function next() {
        ++$this->position;
    }
    public function valid() {
        if(!is_array($this->toArray())) return false;
        return count($this->toArray()) >= $this->position + 1;
    }
    public function search($attributes) {

    }
    public function push($value) {
        $this->{$this->getArrayKey()}[] = $value;
    }
    public function pop() {
        return array_pop($this->toArray());
    }
    public function shift() {
        return array_shift($this->toArray());
    }
    public function first() {
        return $this->toArray()[0];
    }
    public function last() {
        return end($this->toArray());
    }    
    public function index($nr) {
        return $this->toArray()[$nr];
    }
    public function toArray() {
        $value = $this->_get($this->getArrayKey());
        return  $value ? $value : [] ;
    }
    public function fromArray($array) {      
        $this->_set($this->getArrayKey(),$array);
    }
    public function toJson() {
        return json_encode($this->toArray());
    }
    public function fromJson($json) {
        return $this->fromArray(json_decode($json));
    }
    protected function add($var,$class,$args) {
        $newObject = new $class;
        $newObject->parent($this);
        foreach($args as $nr => $arg) {
            $key = $newObject->properties()->index($nr);
            $newObject->set($key,$arg);
        }
        if($this->_get($var)) {
            $this->$var[] = $newObject;            
        } else {
            $this->_set($var,[$newObject]);
        }

        return $newObject;
    } 
    public function getArrayKey() {
        return $this->_apiObjects[0];
    }
    public function count() : int {        
        return count($this->toArray());
    }
    public function createItem($data=null) : BaseClass {
        if($data instanceof BaseClass) {
            $arrayItem = $data; 
        } elseif(is_object($data)) {
            $arrayItem = $this->createProperty($this->getArrayKey());
            $arrayItem->deserialize($data);
        }      
        return $arrayItem; 
    }
    public function create($property,$class) {
        $this->$property = $this->$property ?: [];
        $item = new $class($this);
        $item->parent($this);
        array_push($this->$property,$item);
        if(method_exists($this->$property,"api")) {
            $this->$property->changes()->setOriginal();
        }        
        return $item;
    }

}