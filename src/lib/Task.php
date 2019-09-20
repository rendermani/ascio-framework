<?php
namespace ascio\lib;

use ascio\base\TaskInterface;

class Task implements TaskInterface {
    use TaskTrait;
    protected $type;
    protected $status; 
    public function getTopic() : ?string {
        return $this->db()->_topic; 
    } 
    public function setTopic(string $topic) : self {
        $this->db()->_topic = $topic; 
        return $this;
    } 

    /**
     * Get the value of type
     */ 
    public function getType() : ?string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus() : ?string
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus(string $status) : self
    {
        $this->status = $status;

        return $this;
    }
    public function setWorkflowStatus($status=null)  {
        $class = new ReflectionClass(OrderStatus::class);
        if(!array_key_exists($status,$class->getConstants())) {
            throw new \Exception("Status must be one of ".implode(", ",$class->getConstants()). ". Got: ".$status);
        }
        $this->db()->setAttribute("_status", $status);
        return $this; 
    }
}