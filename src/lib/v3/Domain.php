<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\v3;

use ascio\base\OrderInfoInterface;
use ascio\lib\SubmitOptions;
use ascio\lib\ValidationException;
use ascio\v3\AutoRenew;
use Illuminate\Support\Str;
use Iodev\Whois\Factory;

class Domain extends \ascio\service\v3\Domain {
    public $updates; 
    private $locks; 
    private $autoRenew; 
    public $orderRequest;
    protected $status;

    public function __construct($parent = null) {
        parent::__construct($parent);
        $this->autoRenew = new AutoRenew($this);
        $this->locks = new Locks($this);
        $this->orderRequest = new DomainOrderRequest();
        $this->orderRequest->setDomain($this);
    }
    public function hasDatalessTransfer() : bool{
        return in_array($this->getTld(),["no","de","com","net","org","biz","info","us","cc","cn","com.cn","net.cn","org.cn","tv"]);
    }
    public function getOrderRequest() : DomainOrderRequest
    {
        return $this->orderRequest;
    }
    public function getLocks() {
        return $this->locks; 
    }
    /**
     * Get the Domain-Status. If doesn't exist do getDomain
     */
    public function getStatus() {
        if(!$this->status) {
            $domainInfo = new DomainInfo();
            if(!$this->getHandle()) {
                $this->status = $domainInfo->db()
                ->where("DomainHandle",$this->getHandle())
                ->first()
                ->status; 
            } else {
                $this->status = $domainInfo->db()
                ->where("Name")
                ->where("Status","!==","DELETED")
                ->where("DomainName",$this->getName())
                ->first()
                ->status;                
            }
        } else {
            return $this->status;
        }
    }
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }
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
    public function register(?SubmitOptions $submitOptions=null) : ?OrderInfoInterface {
        $orderRequest = new DomainOrderRequest();
        $orderRequest->setType(OrderType::Register);
        $orderRequest->setDomain($this);
        return $orderRequest->submit($submitOptions);
    }
    public function transfer(?SubmitOptions $submitOptions=null) : ?OrderInfoInterface {
        $orderRequest = new DomainOrderRequest();
        $orderRequest->setType(OrderType::Transfer);
        $orderRequest->setDomain($this);
        return $orderRequest->submit($submitOptions);
    }
    public function expire(?SubmitOptions $submitOptions=null) : ?OrderInfoInterface {
        $orderRequest = new DomainOrderRequest();
        $orderRequest->setType(OrderType::Expire);
        $domain = new Domain();
        $domain->setName($this->getName());
        $domain->setHandle($this->getHandle());
        $orderRequest->setDomain($this);
        return $orderRequest->submit($submitOptions);
    }
    /**
     * Get the value of autoRenew
     */ 
    public function getAutoRenew() : AutoRenew
    {
        return $this->autoRenew;
    }
    private function submitUpdateOrders(?SubmitOptions $submitOptions = null) : array {
        $results = []; 
        $submitOptions->setSubmitAfterQueue(true);
        foreach ($this->getUpdateOrders() as $order) {
            $results[] = $order->submit($submitOptions);
            $submitOptions->setSubmitAfterQueue(false);
        }
        return $results; 
    }
    public function getUpdateOrders() {
        $this->updates = new DomainUpdates($this); 
        $results = [];
        foreach($this->updates->getOrderTypes() as $orderType) {
            $function = $orderType->function;
            $result = $this->getOrderRequest()->$function();
            if($result) {
                $results[] =$result;       
            }                        
        }
        return $results;
    }
}