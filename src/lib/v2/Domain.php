<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\v2;
use ascio\lib\LockType;
use ascio\lib\AscioException;
use ascio\lib\StatusSerializer;
use ascio\lib\SubmitOptions;

class Domain extends \ascio\service\v2\Domain {
    public $updates; 
    private $locks; 
    private $autoRenew; 
    public $orderRequest;
    public function __construct($parent = null)
    {  
        parent::__construct($parent);
        $this->locks = new Locks($this);
        $this->autoRenew = new AutoRenew($this);
        $this->orderRequest = new DomainOrderRequest($this);
    }
    public function getStatusSerializer() : StatusSerializer {
        parent::getStatusSerializer()->addFields([
            "Domain" => $this->getDomainName(),
            "Status" => $this->getStatus()
        ]);
        return $this->_statusSerializer;
    }
    public function update(?SubmitOptions $submitOptions = null) : array {
        $submitOptions = $submitOptions ?: new SubmitOptions();
        if($this->db()->exists) {
            return $this->submitUpdateOrders($submitOptions);
        } else {
            if(!($this->getDomainHandle()|| $this->getDomainName())) {
                throw new AscioException("Please set the DomainName or the DomainHandle of the Domain");
            } else {
                return $this->submitUpdateOrders($submitOptions);
            }             
        }
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
    public function register(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->register()->submit($submitOptions);
    }
    public function queue(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->queue()->submit($submitOptions);
    }
    public function transfer(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->transfer()->submit($submitOptions);
    }
    public function transfer_away(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->transferAway()->submit($submitOptions);
    }
    public function registrantDetailsUpdate(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->registrantDetailsUpdate()->submit($submitOptions);
    }
    public function ownerChange(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->ownerChange()->submit($submitOptions);
    }
    public function contactUpdate(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->contactUpdate()->submit($submitOptions);
    }
    public function nameserverUpdate(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->nameserverUpdate()->submit($submitOptions);
    }
    public function domainDetailsUpdate(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->domainDetailsUpdate()->submit($submitOptions);
    }
    public function renew(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->renew()->submit($submitOptions);
    }
    public function expire(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->expire()->submit($submitOptions);
    }
    public function unexpire(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->unexpire()->submit($submitOptions);
    }
    public function delete(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->delete()->submit($submitOptions);
    }
    public function restore(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->restore()->submit($submitOptions);
    }
    public function changeLocks(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->changeLocks()->submit($submitOptions);
    }
    public function updateAuthInfo(?SubmitOptions $submitOptions = null) : Order {        
        return $this->getOrderRequest()->updateAuthInfo()->submit($submitOptions);
    }
    /**
     * Get the value of locks
     */ 
    public function getLocks() : Locks
    {
        return $this->locks;
    }
    /**
     * Set the value of locks
     *
     * @return  self
     */ 
    public function setLocks($locks)
    {
        $this->locks = clone $locks;
        $this->locks->setDomain($this);
        return $this;
    }

    /**
     * Get the value of autoRenew
     */ 
    public function getAutoRenew() : AutoRenew
    {
        return $this->autoRenew;
    }
    /**
     * Get the DomainOrderRequest. Create Order-Requests for Domain-Updates. Can be used for previews. 
     * @return DomainOrderRequest
     */ 
    public function getOrderRequest() : DomainOrderRequest
    {
        return $this->orderRequest;
    }
}