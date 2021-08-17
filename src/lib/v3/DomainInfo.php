<?php

// XSLT-WSDL-Client. Generated DB-Model class of DomainInfo. Can be copied and overwriten with own functions.

namespace ascio\v3;
use ascio\db\v3\DomainInfoDb;
use ascio\api\v3\DomainInfoApi;

class DomainInfo extends \ascio\service\v3\DomainInfo {
    public function getTld() : string {
        return strtolower(implode(".",array_slice(explode(".",$this->getDomainName()),1)));
    }
    /**
     * Get the value of objectName
     */ 
    public function getObjectName() : ?string
    {
        return $this->db()->_objectName ?: $this->getOrderRequest()->getObjectName();
    }

    /**
     * Set the value of objectName
     *
     * @return  self
     */ 
    public function setObjectName(?string $objectName)
    {
        $this->db()->_objectName = $objectName;

        return $this;
    }
}