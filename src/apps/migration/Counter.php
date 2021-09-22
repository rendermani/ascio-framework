<?php 
namespace ascio\migration;

class Counter {
    protected $counter=0; 
    protected $max=1; 
    protected $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function get() : int {
        return $this->counter;
    }
    public function __toString() 
    {
        return $this->counter;
    }
    public function format () {
        return "[" . $this->get() . "/" . $this->getMax(). " " . $this->getPercentDone() ."% done] ";
    }
    public function increase() {
        $this->counter++;
    }

    /**
     * Get the value of max
     */ 
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Set the value of max
     *
     * @return  self
     */ 
    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }
    public function getPercentDone() : int{
        return round(($this->counter / $this->max) * 100); 
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }
    public function reset() : void {
        $this->counter = 0;
    }
}