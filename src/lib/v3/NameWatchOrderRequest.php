<?php

// XSLT-WSDL-Client. Generated DB-Model class of NameWatchOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\v3;

class NameWatchOrderRequest extends \ascio\service\v3\NameWatchOrderRequest {
    protected $orderId; 
    protected $status; 
    protected $objectPropertyName = "NameWatch";

    public function getObjectName() : ?string {
        return $this->getNameWatch()->getName();
    }
    public function getObjectKey() : string {
        return "Name";
    } 
}