<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\v3;
use ascio\base\DbBase;

class DomainOrderRequestLib {
    /**
     * @var Domain $domain
     */
    private $domain;
    public function __construct(Domain $domain)
    {
        $this->domain = $domain;
    }
    public function register() : DomainOrderRequest {
        $order = new DomainOrderRequest();
        $order->setType(OrderType::Register);
        $order->setDomain($this->domain);
        return $order;
    }
    public function queue() : DomainOrderRequest {
        $order = new DomainOrderRequest();
        $order->setType(OrderType::Queue);
        $order->setDomain($this->domain);
        return $order;
    }
    public function transfer() : DomainOrderRequest{
        $order = new DomainOrderRequest();
        $order->setType(OrderType::Transfer);
        $order->setDomain($this->domain);
        return $order;
    }
    public function registrantDetailsUpdate() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setOwner($this->domain->getOwner());
        $this->dataOrHandle($domain->getOwner());
        $order = new DomainOrderRequest();
        $order->setType(OrderType::DetailsUpdate);
        $order->setDomain($domain);        
        return $order; 
    }
    public function ownerChange() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setOwner($this->domain->getOwner());
        if($this->domain->getAdmin()->changes()->hasChanges()) {
            $domain->setAdmin($this->domain->getAdmin());
            $this->dataOrHandle($domain->getAdmin());           
        }
        $this->dataOrHandle($domain->getOwner());    
        $order = new DomainOrderRequest();
        $order->setType(OrderType::OwnerChange);
        $order->setDomain($domain);        
        return $order; 
    }
    public function contactUpdate() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setAdmin($this->domain->getAdmin());
        $this->dataOrHandle($domain->getAdmin());
        $domain->setTech($this->domain->getTech());
        $this->dataOrHandle($domain->getTech());
        $domain->setBilling($this->domain->getBilling());
        $this->dataOrHandle($domain->getBilling());
        $domain->setReseller($this->domain->getReseller());
        $this->dataOrHandle($domain->getReseller());
        $order = new DomainOrderRequest();
        $order->setType(OrderType::ContactUpdate);     
        $order->setDomain($domain);         
        return $order; 
    }
    public function nameserverUpdate() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setNameServers($this->domain->getNameServers());
        $domain->getNameServers()->db()->_id = null;
        $domain->getNameServers()->db()->exists = false;
        foreach($domain->getNameServers()->objects() as $key => $ns) {
            $this->dataOrHandle($ns);
        } 
        if($this->domain->getTech()->changes()->hasChanges()) {
            $domain->setTech($this->domain->getTech());
            $this->dataOrHandle($domain->getTech()); 
        }
        $order = new DomainOrderRequest();
        $order->setType(OrderType::NameserverUpdate);
        $order->setDomain($domain);        
        return $order; 
    }
    public function domainDetailsUpdate() : ?DomainOrderRequest {        
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

        $order = new DomainOrderRequest();
        $order->setType(OrderType::DetailsUpdate);
        $order->setDomain($domain);        
        return $order; 
    }
    public function delete() : DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new DomainOrderRequest();
        $order->setType(OrderType::Delete);
        $order->setDomain($domain);        
        return $order;
    }
    public function restore() : DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new DomainOrderRequest();
        $order->setType(OrderType::Restore);
        $order->setDomain($domain);        
        return $order;
    }
    public function renew() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new DomainOrderRequest();
        $order->setType(OrderType::Renew);
        $order->setDomain($domain);        
        return $order;
    }
    public function expire() : ?DomainOrderRequest {  
        if($this->domain->getAutoRenew()->getStatus()==false) {
            return null; 
        }  
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new DomainOrderRequest();
        $order->setType(OrderType::Expire);
        $order->setDomain($domain);      
        return $order;
    }
    public function unexpire() : ?DomainOrderRequest { 
        if($this->domain->getAutoRenew()->getStatus()==true) {
            return null; 
        }        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new DomainOrderRequest();
        $order->setType(OrderType::Unexpire);
        $order->setDomain($domain);        
        return $order;
    }
    public function transferAway() : DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new DomainOrderRequest();
        $order->setType(OrderType::TransferAway);
        $order->setDomain($domain);        
        return $order;
    }  
    public function updateAuthInfo() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $order = new DomainOrderRequest();
        $order->setType(OrderType::UpdateAuthInfo);
        $order->setDomain($domain);        
        return $order;
    }       
    private function copyNameAndHandle(Domain $domain) {
        $domain->setHandle($this->domain->getHandle());
        $domain->setName($this->domain->getName());
    }
    private function dataOrHandle(?Domain $obj) {
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
    public function changeLocks() : ?DomainOrderRequest {                                  
        $domain = new Domain();
        $domain->setStatus($this->domain->getStatus());
        $domain->setDeleteLock($this->domain->getDeleteLock());
        $domain->setTransferLock($this->domain->getTransferLock());
        $domain->setUpdateLock($this->domain->getUpdateLock());
        $domain->getLocks()->setChangedLocks();
        $this->copyNameAndHandle($domain);
        $order = new DomainOrderRequest();
        $order->setType(OrderType::ChangeLocks);
        $order->setDomain($domain);        
        return $order; 
    }
}