<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\v2;

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
            "Admin" => $this->domain->getAdminContact() ? $this->domain->getAdminContact()->changes()->hasChanges() : false,
            "Billing" => $this->domain->getBillingContact() ? $this->domain->getBillingContact()->changes()->hasChanges() : false,
            "Tech" => $this->domain->getTechContact() ? $this->domain->getTechContact()->changes()->hasChanges() : false,
            "Reseller" => $this->domain->getResellerContact() ? $this->domain->getResellerContact()->changes()->hasChanges()  : false,               
            "Nameservers" => $this->domain->getNameservers() ? $this->domain->getNameservers()->changes()->hasDeepChanges() : false,
            "DnsSec" => $this->domain->getDnsSecKeys() ? $this->domain->getDnsSecKeys()->changes()->hasDeepChanges() : false,
            "Domain" => $this->domain->changes()->hasChanges(),
            "Proxy" => $this->domain->getPrivacyProxy() ? $this->domain->getPrivacyProxy()->changes()->hasDeepChanges() : false,
        ];
        if($this->domain->getRegistrant()) {
            $registrantChanges = $this->domain->getRegistrant()->changes(); 
            $changed->RegistrantSocial = 
                $registrantChanges->propertyChanged("Name") || 
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
            $orderTypes[] =(object)  [ OrderType::Change_Locks, "function" => "changeLocks"];             
        }
        if($this->domain->getAutoRenew()->hasChanges()) {
            if($this->domain->getAutoRenew()->get()) {
                $orderTypes[] =(object)  ["type" => OrderType::Unexpire_Domain, "function" => "unexpire"];             
            } else {
                $orderTypes[] =(object)  ["type" => OrderType::Expire_Domain, "function" => "expire"];             
            }
        }
        if($changed->Domain ||$changed->Proxy) {
            $orderTypes[] = (object) ["type" => OrderType::Domain_Details_Update, "function" => "domainDetailsUpdate"];             
        }
        if($changed->RegistrantSocial) {
            $orderTypes[] = (object) ["type" => OrderType::Owner_Change, "function" => "ownerChange"] ;
            unset($changed->Registrant);
            unset($changed->Admin);
        } 
        if($changed->Registrant) {
            $orderTypes[] =(object)  [  "type" => OrderType::Registrant_Details_Update, "function" => "registrantDetailsUpdate"] ;
        } 
        if($changed->Nameservers || $changed->DnsSec) {
            $orderTypes[] =(object)  [  "type" => OrderType::Nameserver_Update, "function" => "nameserverUpdate"] ;
            unset($changed->Tech);
        }
        if($changed->Admin ||$changed->Tech ||$changed->Billing ||$changed->Reseller) {
            $orderTypes[] =(object)  [  "type" => OrderType::Contact_Update, "function" => "contactUpdate"] ;
        }
        return $orderTypes; 
    }
    private function getObjectChanges(?BaseClass $obj=null) {
        return $obj ? $obj->changes() : false;
    }
    private function hasObjectChanges(?BaseClass $obj=null) {
        return $obj ? $obj->changes()->hasChanges() : false;
    }

}