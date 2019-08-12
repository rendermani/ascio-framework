<?php

// XSLT-WSDL-Client. Generated DB-Model class of OrderInfo. Can be copied and overwriten with own functions.

namespace ascio\v3;

use ascio\lib\AscioException;

class OrderInfo extends \ascio\service\v3\OrderInfo {
    public function setWorkflowStatus($status=null) : OrderInfo {
        if($status=null) {
            switch($this->getStatus()) {
                case OrderStatusType::Completed : $this->db()->setAttribute("_status",OrderStatus::Completed);break;
                case OrderStatusType::Failed : $this->db()->setAttribute("_status",OrderStatus::Completed);break;
                case OrderStatusType::Invalid : $this->db()->setAttribute("_status",OrderStatus::Completed);break;
            }
        } else {
            $class = new ReflectionClass(OrderStatus::class);
            if(!array_key_exists($status,$class->getConstants())) {
                throw new \Exception("Status must be one of ".implode(", ",$class->getConstants()));
            }
            $this->db()->setAttribute("_status", $status);
        }
        return $this; 
    }

}