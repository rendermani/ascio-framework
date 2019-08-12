<?php
namespace ascio\lib;

use ascio\base\BaseClass;
use ascio\v3\AbstractMark;

class Substitutions implements \Iterator {
    protected $object;
    protected $substitutions;
    protected $substituted;
    protected $types=[];
    protected $names=[];
    protected $_position;
    public function __construct(BaseClass $object,$substitutions,$isSubstituted) 
    {
        $this->substituted = $isSubstituted;
        $this->object = $object;
        if(!$substitutions) $substitutions = [];
        $this->substitutions = $substitutions;
        foreach($substitutions as $substitution) {
            $this->types[$substitution["type"]] = $substitution;
            $this->names[$substitution["name"]] = $substitution;
        }
    }
    public function isSubstituted() {
        return $this->substituted;
    }
    public function hasSubstitutes() {
        return count($this->substitutions) > 0;
    }
    public function getByType($type) {
        if(!isset($this->types[$type])) return;
        return $this->types[$type];
    }
    public function getByName($name) {
        return $this->names[$name];
    }
    /**
     * Get the value of object
     */ 
    public function getObject()
    {
        return $this->object;
    }
    public function rewind() {
        $this->_position = 0;
    }

    public function current() {
        return $this->substitutions[$this->_position]["type"];
    }

    public function key() {
        return $this->substitutions[$this->_position]["name"];
    }
    public function next() {
        ++$this->_position;
    }

    public function valid() {
        return isset($this->substitutions[$this->_position]);
    }
    public function pop() {
        return array_pop($this->substitutions);
    }
    public function shift() {
        return array_shift($this->substitutions);
    }
    public function first() {
        return end($this->substitutions[0]);
    }
    public function last() {
        return end($this->substitutions);
    }
}



