<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\v3;

use ascio\base\BaseClass;
use ascio\base\DbBase;
use ascio\lib\LockType;

class DomainUpdates {
    /**
     * @var Domain $domain
     */
    private $domain;
    function __construct(Domain $domain)
    {
        $this->domain = $domain;
    }
    public function getChanges() {
        $orderTypes = [];
        $changed = (object) [
            "Admin" => $this->domain->getAdmin() ? $this->domain->getAdmin()->changes()->hasChanges() : false,
            "Billing" => $this->domain->getBilling() ? $this->domain->getBilling()->changes()->hasChanges() : false,
            "Tech" => $this->domain->getTech() ? $this->domain->getTech()->changes()->hasChanges() : false,
            "Reseller" => $this->domain->getReseller() ? $this->domain->getResellerContact()->changes()->hasChanges()  : false,               
            "Nameservers" => $this->domain->getNameservers() ? $this->domain->getNameservers()->changes()->hasDeepChanges() : false,
            "DnsSec" => $this->domain->getDnsSecKeys() ? $this->domain->getDnsSecKeys()->changes()->hasDeepChanges() : false,
            "Domain" => $this->domain->changes()->hasChanges(["TransferLock","DeleteLock","UpdateLock","Status"]),
            "Proxy" => $this->domain->getPrivacyProxy() ? $this->domain->getPrivacyProxy()->changes()->hasDeepChanges() : false,
        ];
        if($this->domain->getOwner()) {
            $registrantChanges = $this->domain->getOwner()->changes(); 
            $changed->RegistrantSocial = 
                $registrantChanges->propertyChanged("FirstName") || 
                $registrantChanges->propertyChanged("LastName") || 
                $registrantChanges->propertyChanged("OrgName") || 
                $registrantChanges->propertyChanged("Email");
            $changed->Registrant =   $registrantChanges->hasChanges();             
        }
        return $changed; 
    }
    public function getOrderTypes() {
        $orderTypes = [];
        $changed = $this->getChanges();
        if($this->domain->getLocks()->hasChanges()) {
            $orderTypes[] =(object)  [ OrderType::ChangeLocks, "function" => "changeLocks"];             
        }
        if($this->domain->getAutoRenew()->hasChanges()) {
            if($this->domain->getAutoRenew()->get()) {
                $orderTypes[] =(object)  ["type" => OrderType::Unexpire, "function" => "unexpire"];             
            } else {
                $orderTypes[] =(object)  ["type" => OrderType::Expire, "function" => "expire"];             
            }
        }
        if(property_exists($changed,"Domain") && $changed->Domain ||property_exists($changed,"Proxy") && $changed->Proxy) {
            $orderTypes[] = (object) ["type" => OrderType::DetailsUpdate, "function" => "domainDetailsUpdate"];             
        }
        if(property_exists($changed,"RegistrantSocial") && $changed->RegistrantSocial) {
            $orderTypes[] = (object) ["type" => OrderType::OwnerChange, "function" => "ownerChange"] ;
            unset($changed->Registrant);
            unset($changed->Admin);
        } 
        if(property_exists($changed,"Registrant") && $changed->Registrant) {
            $orderTypes[] =(object)  [  "type" => OrderType::RegistrantDetailsUpdate, "function" => "registrantDetailsUpdate"] ;
        } 
        if(property_exists($changed,"Nameservers") && $changed->Nameservers || property_exists($changed,"DnsSec") && $changed->DnsSec) {
            $orderTypes[] =(object)  [  "type" => OrderType::NameserverUpdate, "function" => "nameserverUpdate"] ;
            unset($changed->Tech);
        }
        if(property_exists($changed,"Admin") && $changed->Admin ||property_exists($changed,"Tech") && $changed->Tech ||property_exists($changed,"Billing") && $changed->Billing ||property_exists($changed,"Reseller") && $changed->Reseller) {
            $orderTypes[] =(object)  [  "type" => OrderType::ContactUpdate, "function" => "contactUpdate"] ;
        }
        return $orderTypes; 
    }
    private function getObjectChanges(?DbBase $obj=null) {
        return $obj ? $obj->changes() : false;
    }
    private function hasObjectChanges(?DbBase $obj=null) {
        return $obj ? $obj->changes()->hasChanges() : false;
    }

}