<?php

namespace ascio\base;

class ArrayBase extends BaseClass implements ArrayInterface,\Iterator,\countable {
    use ArrayTrait;
    public function __construct($parent=null) {
        parent::__construct($parent);
        $this->_position = 0;
        $this->_arrayProperty = $this->properties()->index(0);
    }
   
}