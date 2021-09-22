<?php
namespace ascio\migration;

class Counters {
    protected $counters = []; 
    public function get($name) : Counter{
        if (!$this->counters[$name]) $this->counters[$name] = new Counter($name);
        return  $this->counters[$name];
    }
}