<?php

// XSLT-WSDL-Client. Generated DB-Model class of DomainInfo. Can be copied and overwriten with own functions.

namespace ascio\v3;
use ascio\db\v3\DomainInfoDb;
use ascio\api\v3\DomainInfoApi;

class DomainInfo extends \ascio\service\v3\DomainInfo {
    public function __construct($parent = null) {
        $this->autoRenew = new AutoRenew($this);
        $this->locks = new Locks($this);
    }
    public function getTld() : string {
        return strtolower(implode(".",array_slice(explode(".",$this->getDomainName()),1)));
    }
}