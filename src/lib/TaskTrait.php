<?php
namespace ascio\lib;

use ascio\v2\Order;

trait TaskTrait {
    public function shouldQueue() : bool {
        return $this->getSubmitOptions()->getQueue() || $this->db()->shouldQueue();           
    }
    public function getWorkflowStatus() : string {
        return $this->db()->_status;        
    }
    public function getSubmitOptions() : SubmitOptions {
        return $this->submitOptions ?: new SubmitOptions();
    }
    public function setSubmitOptions(SubmitOptions $submitOptions) : Order  {
        $this->submitOptions = $submitOptions;
        return $this; 
    } 
    /**
     * Serialize the object and send it to Kafka. 
     */
    public function produce ($parameters=[]) {
        $this->db()->_objectName = $this->getObjectName();
        if(!$parameters["action"]) {
            $parameters["action"] = $this->db()->_id ? "update" : "create"; 
        }       
        parent::produce($parameters);
    }

    /**
     * Get the value of PreviousId
     */ 
    public function getPreviousId()
    {
        return $this->db()->_previousId;
    }

 
}