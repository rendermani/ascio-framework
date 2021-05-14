<?php
namespace ascio\lib;

use ascio\base\TaskInterface;
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
    public function linkToPreviousTask(?TaskInterface $previousTask) {
        $this->db()->_previous_task_id = $previousTask->db()->_id;
        $this->db()->_previous_task_id_class = get_class($previousTask);
        $this->previousTask;
        return $this;
    }
    public function linkToLastTask() {
        /** 
         * @var TaskInterface $lastTask
         */
        global $lastTask; 
        if($lastTask && ($this->getObjectName() == $lastTask->getObjectName())) {          
            $this->linkToPrevious($lastTask);
                    
        }
        $lastTask = $this;        
    }

 
}