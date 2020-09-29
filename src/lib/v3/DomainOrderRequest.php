<?php

// XSLT-WSDL-Client. Generated DB-Model class of DomainOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\v3;

class DomainOrderRequest extends \ascio\service\v3\DomainOrderRequest {
    protected $objectPropertyName = "Domain";
    
    public function getObjectName() : ?string {
        assert($this->getDomain() !== null,"Get the Domain object");
        return $this->getDomain()->getName();
    }
    public function getObjectKey() : string {
        return "Name";
    } 

}