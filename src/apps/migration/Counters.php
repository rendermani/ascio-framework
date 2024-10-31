<?php
namespace ascio\migration;

class Counters {
    protected $counters = []; 
    public function get($name) : Counter{
        if (!array_key_exists($name,$this->counters)) $this->counters[$name] = new Counter($name);
        return  $this->counters[$name];
    }
}