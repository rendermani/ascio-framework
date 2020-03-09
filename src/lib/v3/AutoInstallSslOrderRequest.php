<?php

// XSLT-WSDL-Client. Generated DB-Model class of AutoInstallSslOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\v3;

class AutoInstallSslOrderRequest extends \ascio\service\v3\AutoInstallSslOrderRequest {
    protected $orderId; 
    protected $status; 
    protected $objectPropertyName = "AutoinstallSsl";

    public function getObjectName() : ?string {
        return $this->getAutoInstallSsl()->getCommonName();
    }
    public function getObjectKey() : ?string {
        return "CommonName";
    } 
}