<?php

namespace ascio\workflows;

use ascio\model\common\WorkflowModel;
use ascio\lib\v2\Domain;
use ascio\lib\v2\Callback;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Workflows {
    public static function next(Callback $callback) : ?WorkflowStep {
        $order = $callback->getOrder();
        // get the class
        $model = new WorkflowModel();
        try {
            $result = $model->orderId($order->getOrderId());
            $class = $result->Class;
            // create user workflow instance
            $workflow = new $class($order->getDomain());
            $workflow->getByOrderId($order->getOrderId());
            // process next step
            $step = $workflow->next(); 
            // if no same domain step, get next workflow
            if(!$step) {            
                // process next workflow
                $result = $model->nextWorkflow();
                $class = $result->Class;
                // create user workflow instance
                $domain = new Domain();
                $domain->setDomainName($result->DomainName);
                $workflow = new $class($domain,$result->Name,$result->Description);
                $step = $workflow->next();
                return $step;
            }
        } catch (ModelNotFoundException $e) {
            // no workflow, do nothing
            return null;
        }

    }
}
