<?php

// XSLT-WSDL-Client. Generated DB-Model class of DefensiveOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\v3;

class DefensiveOrderRequest extends \ascio\service\v3\DefensiveOrderRequest {
    protected $orderId; 
    protected $status; 
    protected $objectPropertyName = "Defensive";

    public function getObjectName() : ?string {
        return $this->getDefensive()->getName();
    }
    public function getObjectKey() : ?string {
        return "Name";
    } 
}