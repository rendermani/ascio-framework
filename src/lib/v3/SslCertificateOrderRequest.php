<?php

// XSLT-WSDL-Client. Generated DB-Model class of SslCertificateOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\v3;

use ascio\base\OrderInterface;


class SslCertificateOrderRequest extends \ascio\service\v3\SslCertificateOrderRequest implements OrderInterface {
    protected $orderId; 
    protected $status; 
    protected $objectPropertyName = "SslCertificate";
    
    public function getObjectName() : ?string {
        return $this->getSslCertificate()->getCommonName();
    }
    public function getObjectKey() : string {
        return "CommonName";
    }      
}