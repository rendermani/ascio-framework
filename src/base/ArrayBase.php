<?php

namespace ascio\base;

use ArrayAccess;
use Countable;
use Iterator;

class ArrayBase extends BaseClass implements ArrayAccess,ArrayInterface,Iterator,Countable {
    use ArrayTrait;
    public function __construct($parent=null) {
        parent::__construct($parent);
        $this->_position = 0;
        $this->_arrayProperty = $this->properties()->index(0);
    }
   
}