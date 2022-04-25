<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\v2;
use ascio\base\DbBase;

class DomainOrderRequest {
    /**
     * @var Domain $domain
     */
    private $domain;
    public function __construct(Domain $domain)
    {
        $this->domain = $domain;
    }
    public function register() : Order {
        $order = new Order();
        $order->setType(OrderType::Register_Domain);
        $order->setDomain($this->domain);
        return $order;
    }
    public function queue() : Order {
        $order = new Order();
        $order->setType(OrderType::Queue_Domain);
        $order->setDomain($this->domain);
        return $order;
    }
    public function transfer() : Order{
        $order = new Order();
        $order->setType(OrderType::Transfer_Domain);
        $order->setDomain($this->domain);
        return $order;
    }
    public function registrantDetailsUpdate() : ?Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setRegistrant($this->domain->getRegistrant());
        $this->dataOrHandle($domain->getRegistrant());
        $order = new Order();
        $order->setType(OrderType::Registrant_Details_Update);
        $order->setDomain($domain);        
        return $order; 
    }
    public function ownerChange() : ?Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setRegistrant($this->domain->getRegistrant());
        if($this->domain->getAdminContact()->changes()->hasChanges()) {
            $domain->setAdminContact($this->domain->getAdminContact());
            $this->dataOrHandle($domain->getAdminContact());           
        }
        $this->dataOrHandle($domain->getRegistrant());    
        $order = new Order();
        $order->setType(OrderType::Owner_Change);
        $order->setDomain($domain);        
        return $order; 
    }
    public function contactUpdate() : ?Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setAdminContact($this->domain->getAdminContact());
        $this->dataOrHandle($domain->getAdminContact());
        $domain->setTechContact($this->domain->getTechContact());
        $this->dataOrHandle($domain->getTechContact());
        $domain->setBillingContact($this->domain->getBillingContact());
        $this->dataOrHandle($domain->getBillingContact());
        $domain->setResellerContact($this->domain->getResellerContact());
        $this->dataOrHandle($domain->getResellerContact());
        $order = new Order();
        $order->setType(OrderType::Contact_Update);     
        $order->setDomain($domain);         
        return $order; 
    }
    public function nameserverUpdate() : ?Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setNameServers($this->domain->getNameServers());
        $domain->getNameServers()->db()->_id = null;
        $domain->getNameServers()->db()->exists = false;
        foreach($domain->getNameServers()->objects() as $key => $ns) {
            $this->dataOrHandle($ns);
        } 
        if($this->domain->getTechContact()->changes()->hasChanges()) {
            $domain->setTechContact($this->domain->getTechContact());
            $this->dataOrHandle($domain->getTechContact()); 
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
        foreach($this->domain->changes()->getChanges() as $key => $value) {            
            if(is_object($value) || is_array($value) || in_array($key,$this->domain->getLocks()->getLockTypes())) {
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
    public function delete() : Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new Order();
        $order->setType(OrderType::Delete_Domain);
        $order->setDomain($domain);        
        return $order;
    }
    public function restore() : Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new Order();
        $order->setType(OrderType::Restore_Domain);
        $order->setDomain($domain);        
        return $order;
    }
    public function renew() : ?Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new Order();
        $order->setType(OrderType::Renew_Domain);
        $order->setDomain($domain);        
        return $order;
    }
    public function expire() : ?Order {  
        if($this->domain->getAutoRenew()->getStatus()==false) {
            return null; 
        }  
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new Order();
        $order->setType(OrderType::Expire_Domain);
        $order->setDomain($domain);      
        return $order;
    }
    public function unexpire() : ?Order { 
        if($this->domain->getAutoRenew()->getStatus()==true) {
            // null; 
        }        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new Order();
        $order->setType(OrderType::Unexpire_Domain);
        $order->setDomain($domain);        
        return $order;
    }
    public function transferAway() : Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new Order();
        $order->setType(OrderType::Transfer_Away);
        $order->setDomain($domain);        
        return $order;
    }  
    public function updateAuthInfo() : ?Order {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new Order();
        $order->setType(OrderType::Update_AuthInfo);
        $domain->setAuthInfo($this->domain->getAuthInfo());
        $order->setDomain($domain);        
        return $order;
    }       
    private function copyNameAndHandle(Domain $domain) {
        $domain->setDomainHandle($this->domain->getDomainHandle());
        $domain->setDomainName($this->domain->getDomainName());
    }
    private function dataOrHandle(?DbBase $obj) {
        if(!$obj) return; 
        if($obj->changes()->propertyChanged("Handle")) {
            foreach($obj->properties() as $key => $value) {
                if($key !== "Handle") {
                    $obj->_set($key,null);
                }
            }
        } elseif($obj->changes()->hasChanges()) {
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
    public function changeLocks() : ?Order {                                  
        $domain = new Domain();
        $domain->setStatus($this->domain->getStatus());
        $domain->setDeleteLock($this->domain->getDeleteLock());
        $domain->setTransferLock($this->domain->getTransferLock());
        $domain->setUpdateLock($this->domain->getUpdateLock());
        $domain->getLocks()->setChangedLocks();
        $this->copyNameAndHandle($domain);
        $order = new Order();
        $order->setType(OrderType::Change_Locks);
        $order->setDomain($domain);        
        return $order; 
    }
}