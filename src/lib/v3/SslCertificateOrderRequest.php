<?php

// XSLT-WSDL-Client. Generated DB-Model class of SslCertificateOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\v3;

use ascio\base\OrderInterface;
use ascio\base\TaskInterface;
use ascio\lib\AscioOrderException;
use ascio\lib\AscioOrderExceptionV3;
use ascio\lib\DomainBlocker;
use ascio\lib\OrderStatus;
use ascio\lib\Producer;
use ascio\lib\StatusSerializer;
use ascio\lib\SubmitOptions;
use ascio\lib\TaskTrait;

class SslCertificateOrderRequest extends \ascio\service\v3\SslCertificateOrderRequest implements OrderInterface, TaskInterface {
    use TaskTrait;
    protected $orderId; 
    protected $status; 
    protected $objectPropertyName = "SslCertificate";
    
    public function getObjectName() : ?string {
        return $this->getSslCertificate()->getCommonName();
    }
    public function getObjectKey() : ?string {
        return "CommonName";
    }      
}