<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\v2;
use ascio\db\v2\DomainDb;
use ascio\api\v2\DomainApi;
use ascio\lib\LockType;
use ascio\lib\AscioException;
use ascio\base\BaseClass;
use ascio\base\DbModelBase;
use ascio\base\DbBase;
use ascio\lib\SubmitOptions;

class Domain extends \ascio\service\v2\Domain {
    public $updates; 
    private $locks; 
    private $autoRenew; 
    public function __construct($parent = null)
    {  
        parent::__construct($parent);
        $this->locks = new Locks($this);
        $this->autoRenew = new AutoRenew($this);
    }
    public function update(?SubmitOptions $submitOptions = null) : array {
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
        foreach ($this->getUpdateOrders() as $order) {
            $results[] = $order->submit($submitOptions);
        }
        return $results; 
    }
    public function getUpdateOrders() {
        $this->updates = new DomainUpdates($this); 
        $results = [];
        foreach($this->updates->getOrderTypes() as $orderType) {
            $function = $orderType->function;
            $result = $this->$function();
            if($result) {
                $results[] =$result;       
            }                        
        }
        return $results;

    }
    public function register(?SubmitOptions $submitOptions = null) : Order {
        $order = new Order();
        $order->setType(OrderType::Register_Domain);
        $order->setDomain($this);
        return $order->submit($submitOptions);
    }
    public function transfer(?SubmitOptions $submitOptions = null) : Order{
        $order = new Order();
        $order->setType(OrderType::Transfer_Domain);
        $order->setDomain($this);
        return $order->submit();
    }
    public function registrantDetailsUpdate() : Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setRegistrant($this->getRegistrant());
        $this->resetHandle($domain->getRegistrant());
        $order = new Order();
        $order->setType(OrderType::Registrant_Details_Update);
        $order->setDomain($domain);        
        return $order; 
    }
    public function ownerChange() : Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setRegistrant($this->getRegistrant());
        if($this->getAdminContact()->changes()->hasChanges()) {
            $domain->setAdminContact($this->getAdminContact());
            $this->resetHandle($domain->getAdminContact());           
        }
        $this->resetHandle($domain->getRegistrant());    
        $order = new Order();
        $order->setType(OrderType::Owner_Change);
        $order->setDomain($domain);        
        return $order; 
    }
    public function contactUpdate() : Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setAdminContact($this->getAdminContact());
        $this->resetHandle($domain->getAdminContact());
        $domain->setTechContact($this->getTechContact());
        $this->resetHandle($domain->getTechContact());
        $domain->setBillingContact($this->getBillingContact());
        $this->resetHandle($domain->getBillingContact());
        $domain->setResellerContact($this->getResellerContact());
        $this->resetHandle($domain->getResellerContact());
        $order = new Order();
        $order->setType(OrderType::Contact_Update);     
        $order->setDomain($domain);         
        return $order; 
    }
    public function nameserverUpdate() : Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setNameServers($this->getNameServers());
        $domain->getNameServers()->db()->_id = null;
        $domain->getNameServers()->db()->exists = false;
        foreach($domain->getNameServers()->objects() as $key => $ns) {
            $this->resetHandle($ns);
        } 
        if($this->getTechContact()->changes()->hasChanges()) {
            $domain->setTechContact($this->getTechContact());
            $this->resetHandle($domain->getTechContact()); 
        }
        $order = new Order();
        $order->setType(OrderType::Nameserver_Update);
        $order->setDomain($domain);        
        return $order; 
    }
    public function domainDetailsUpdate() : ?Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $hasChanged = false;
        // get relevant changes
        foreach($this->changes()->getChanges() as $key => $value) {            
            if(is_object($value) || is_array($value) || in_array($key,$this->getLocks()->getLockTypes())) {
                continue;
            }
            $hasChanged = true;
            $domain->_set($key,$value);
        }
        // has no relevant changes
        if(!$hasChanged) return null; 

        $order = new Order();
        $order->setType(OrderType::Domain_Details_Update);
        $order->setDomain($domain);        
        return $order; 
    }
    public function delete(?SubmitOptions $submitOptions = null) : Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new Order();
        $order->setType(OrderType::Delete_Domain);
        $order->setDomain($domain);        
        return $order->submit($submitOptions);
    }
    public function expire(?SubmitOptions $submitOptions = null) : Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new Order();
        $order->setType(OrderType::Expire_Domain);
        $order->setDomain($domain);        
        return $order->submit($submitOptions);
    }
    public function unexpire(?SubmitOptions $submitOptions = null) : Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new Order();
        $order->setType(OrderType::Unexpire_Domain);
        $order->setDomain($domain);        
        return $order->submit($submitOptions);
    }
    public function changeLocks() : Order {                            
        $domain = new Domain();        
        $domain->setDeleteLock($this->getDeleteLock());
        $domain->setTransferLock($this->getTransferLock());
        $domain->setUpdateLock($this->getUpdateLock());
        $domain->getLocks()->setChangedLocks();
        $this->copyNameAndHandle($domain);
        $order = new Order();
        $order->setType(OrderType::Change_Locks);
        $order->setDomain($domain);        
        return $order; 
    }
    private function copyNameAndHandle(Domain $domain) {
            $domain->setDomainHandle($this->getDomainHandle());
            $domain->setDomainName($this->getDomainName());
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
    private function resetHandle(?DbBase $obj) {
        if(!$obj) return; 
        if($obj->changes()->hasChanges()) {
            $obj->setHandle(null);
            $obj->db()->_id = null;
            $obj->db()->exists = false; 
        } else {
            $handle = $obj->getHandle();
            if($handle) {
                foreach($obj->properties() as $key => $value) {
                    $obj->_set($key,null);
                }
                $obj->setHandle($handle);
            }
        }

    }

}
