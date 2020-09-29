<?php

namespace ascio\base;

use ArrayAccess;
use ascio\base\dns\Base;
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
    public function get($name=null,$class=null) {
        $result = parent::get($name,$class);    
        if(!$result) return [];  
        return is_array($result) ? $result : [$result]; 
    }
    public function init($parent=null) {        
        if(!is_array($this->{$this->getArrayKey()})) {
            $this->{$this->getArrayKey()} = [$this->{$this->getArrayKey()}];
        }
        foreach($this as $item) {
            if($item instanceof BaseClass) {
                $item->init($this);
            }
        }
        //parent::init($parent);
    } 

}