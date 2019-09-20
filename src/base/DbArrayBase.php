<?php

namespace ascio\base;

use ArrayAccess;
use Countable;
use Iterator;

class DbArrayBase extends DbBase implements ArrayInterface,Iterator,Countable,ArrayAccess  {
    use ArrayTrait; 
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
    public function createItem($data=null) : BaseClass {
        if(is_object($data)) {
            $arrayItem = $this->createProperty($this->getArrayKey());
            $arrayItem->deserialize($data);
        } else {
            $arrayItem = $data;
        };    
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