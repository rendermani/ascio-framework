<?php

namespace ascio\base\dns;

class ArrayBase extends Base implements \Iterator  {
    private $_position = 0;    
    private $_arrayProperty;

    public function __construct($parent) {
        $this->_position = 0;
        $this->_arrayProperty = $this->getApiObjects()[0];
    }

    public function rewind() {
        $this->_position = 0;
    }

    public function current() {
        return $this->{$this->_arrayProperty}[$this->_position];
    }

    public function key() {
        return $this->_position;
    }

    public function next() {
        ++$this->_position;
    }

    public function valid() {
        return isset($this->{$this->_arrayProperty}[$this->_position]);
    }
    public function push($value) {
        $this->{$this->_arrayProperty}[] = $value;
    }
    public function pop() {
        return array_pop($this->{$this->_arrayProperty});
    }
    public function shift() {
        return array_shift($this->{$this->_arrayProperty});
    }
    public function first() {
        return end($this->{$this->_arrayProperty}[0]);
    }
    public function last() {
        return end($this->{$this->_arrayProperty});
    }
}