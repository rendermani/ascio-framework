<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\v3;

use ascio\base\OrderInfoInterface;
use ascio\lib\LockType;
use ascio\lib\AscioException;
use ascio\lib\StatusSerializer;
use ascio\lib\SubmitOptions;
use ascio\lib\ValidationException;
use ascio\v2\AutoRenew;
use ascio\v2\DomainUpdates;
use ascio\v2\Locks;
use Illuminate\Support\Str;
use Iodev\Whois\Factory;

class Domain extends \ascio\service\v3\Domain {
    public $updates; 
    private $locks; 
    private $autoRenew; 
    public $orderRequest;

    public function getTld() : string {
        return strtolower(implode(".",array_slice(explode(".",$this->getName()),1)));
    }
    public function verifyAuthInfo() {
        if(Str::endsWith($this->getTld(),"uk")) {
            $whois = $this->publicWhois();
            preg_match("/\[Tag = (.*)\]/", $whois, $m);      
            $tag = $m[1];       
            if($tag !== "ASCIO") {
                $e = new ValidationException("Invalid Registrar-Tag",801);
                $e->setObjectName($this->getName());   
                $e->addError($tag);
                throw $e;             
            }
        } elseif(trim($this->getAuthInfo()) == "") {
            $e = new ValidationException("No AuthCode provided",800);
            $e->setObjectName($this->getName());   
            throw $e;     
        } elseif(strlen($this->getAuthInfo()) < 5) {
            $e = new ValidationException("AuthCode too short",802);
            $e->setObjectName($this->getName()); 
            $e->addError($this->getAuthInfo());  
            throw $e;     
        }
        return true; 
    }
    public function publicWhois() {
        $whois = Factory::get()->createWhois();
        $response = $whois->lookupDomain($this->getName());
        return $response->text;
    }
    public function hasAscioDnsZone() {

    }
    public function register(?SubmitOptions $submitOptions=null) : OrderInfoInterface {
        $orderRequest = new DomainOrderRequest();
        $orderRequest->setType(OrderType::Register);
        $orderRequest->setDomain($this);
        return $orderRequest->submit($submitOptions);
    }
}