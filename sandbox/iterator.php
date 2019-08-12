<?php

class ApiProperties implements Iterator {
    protected $properties;
    protected $object;
    protected $keys;
    protected $position; 
    
    function __construct()
    {
        $this->properties = [
            "a" => "v1",
            "b" => "v2"
        ];
        
    }
    public function rewind() {
        $this->position = 0;
    }
    public function current() {
        $keys = array_keys($this->properties);
        $property = $this->properties[$keys[$this->position]];
        return $property;
    }

    public function key() {
        return array_keys($this->properties)[$this->position];
    }

    public function next() {
        ++$this->position;
    }
    public function valid() {
        return count($this->properties) >= $this->position + 1;
    }
}
$props = new ApiProperties();

foreach($props as $key => $value) {
    echo "key: ". $key." - value: ".$value."\n";
}