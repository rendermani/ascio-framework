<?php

// XSLT-WSDL-Client. Generated DB-Model class of MarkOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\v3;

class MarkOrderRequest extends \ascio\service\v3\MarkOrderRequest {
    protected $orderId; 
    protected $status; 
    protected $objectPropertyName = "Mark";

    public function getObjectName() : ?string {
        return $this->getMark()->getMarkName();
    }
    public function getObjectKey() : ?string {
        return "MarkName";
    } 
}