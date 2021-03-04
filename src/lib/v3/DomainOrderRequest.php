<?php

// XSLT-WSDL-Client. Generated DB-Model class of DomainOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\v3;

class DomainOrderRequest extends \ascio\service\v3\DomainOrderRequest {
    protected $objectPropertyName = "Domain";
    
    public function getObjectName() : ?string {
        if($this->getDomain()) {
            return $this->getDomain()->getName();
        }
        return null;
    }
    public function getObjectKey() : string {
        return "Name";
    }

    public function register() : DomainOrderRequest {
        return $this->setType(OrderType::Register);
    }
    public function queueDomain() : DomainOrderRequest {
        return $this->setType(OrderType::Queue);
    }
    public function transfer() : DomainOrderRequest{
        return $this->setType(OrderType::Transfer);
    }
    public function registrantDetailsUpdate() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setOwner($this->getDomain()->getOwner());
        $this->dataOrHandle($domain->getOwner());
        $this->setType(OrderType::RegistrantDetailsUpdate);
        return $this->setDomain($domain);         
    }
    public function ownerChange() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setOwner($this->getDomain()->getOwner());
        if($this->getDomain()->getAdmin()->changes()->hasChanges()) {
            $domain->setAdmin($this->getDomain()->getAdmin());
            $this->dataOrHandle($domain->getAdmin());           
        }
        $this->dataOrHandle($domain->getOwner());    
        $this->setType(OrderType::OwnerChange);
        return $this->setDomain($domain);        
    }
    public function contactUpdate() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setAdmin($this->getDomain()->getAdmin());
        $this->dataOrHandle($domain->getAdmin());
        $domain->setTech($this->getDomain()->getTech());
        $this->dataOrHandle($domain->getTech());
        $domain->setBilling($this->getDomain()->getBilling());
        $this->dataOrHandle($domain->getBilling());
        $domain->setReseller($this->getDomain()->getReseller());
        $this->dataOrHandle($domain->getReseller());
        $this->setType(OrderType::Contact_Update);     
        $this->setDomain($domain);         
        return $order; 
    }
    public function nameserverUpdate() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $domain->setNameServers($this->getDomain()->getNameServers());
        $domain->getNameServers()->db()->_id = null;
        $domain->getNameServers()->db()->exists = false;
        foreach($domain->getNameServers()->objects() as $key => $ns) {
            $this->dataOrHandle($ns);
        } 
        if($this->getDomain()->getTech()->changes()->hasChanges()) {
            $domain->setTech($this->getDomain()->getTech());
            $this->dataOrHandle($domain->getTech()); 
        }
        $this->setType(OrderType::NameserverUpdate);
        return $this->setDomain($domain);        
    }
    public function domainDetailsUpdate() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $hasChanged = false;
        // get relevant changes
        foreach($this->getDomain()->changes()->getChanges() as $key => $value) {            
            if(is_object($value) || is_array($value) || in_array($key,$this->getDomain()->getLocks()->getLockTypes())) {
                continue;
            }
            $hasChanged = true;
            $domain->_set($key,$value);
        }
        // has no relevant changes
        if(!$hasChanged) return null; 

        $this->setType(OrderType::DetailsUpdate);
        return $this->setDomain($domain);        
    }
    public function delete() : DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $this->setType(OrderType::Delete);
        return $this->setDomain($domain);        
    }
    public function restore() : DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $this->setType(OrderType::Restore);
        return $this->setDomain($domain);        
    }
    public function renew() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $this->setType(OrderType::Renew);
        return $this->setDomain($domain);    
    }
    public function expire() : ?DomainOrderRequest {  
        if($this->getDomain()->getAutoRenew()->getStatus()==false) {
            return null; 
        }  
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $this->setType(OrderType::Expire);
        return $this->setDomain($domain);    
    }
    public function unexpire() : ?DomainOrderRequest { 
        if($this->getDomain()->getAutoRenew()->getStatus()==true) {
            return null; 
        }        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $this->setType(OrderType::Unexpire);
        return $this->setDomain($domain);    
    }
    public function transferAway() : DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $this->setType(OrderType::TransferAway);
        return $this->setDomain($domain);    
    }  
    public function updateAuthInfo() : ?DomainOrderRequest {        
        $domain = new Domain();
        $this->copyNameAndHandle($domain);
        $this->setType(OrderType::UpdateAuthInfo);
        return $this->setDomain($domain);    
    }       
    private function copyNameAndHandle(Domain $domain) {
        $domain->setHandle($this->getDomain()->getHandle());
        $domain->setName($this->getDomain()->getName());
    }
    public function changeLocks() : ?DomainOrderRequest {                                  
        $domain = new Domain();
        $domain->setStatus($this->getDomain()->getStatus());
        $domain->setDeleteLock($this->getDomain()->getDeleteLock());
        $domain->setTransferLock($this->getDomain()->getTransferLock());
        $domain->setUpdateLock($this->getDomain()->getUpdateLock());
        $domain->getLocks()->setChangedLocks();
        $this->copyNameAndHandle($domain);
        $this->setType(OrderType::ChangeLocks);
        return $this->setDomain($domain);        
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
}