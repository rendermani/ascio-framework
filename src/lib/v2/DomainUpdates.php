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
            "Domain" => $this->domain->changes()->hasChanges() || $this->domain->getLocks()->hasChanges(),
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
            //TODO: Create Object and store LockType
            $orderTypes[] =(object)  [ "type" => "Change_Locks", "function" => "changeLocks"];             
        }
        if($changed->Domain ||$changed->Proxy) {
            $orderTypes[] = (object) [ "type" => "Domain_Details_Update", "function" => "domainDetailsUpdate"];             
        }
        if($changed->RegistrantSocial) {
            $orderTypes[] = (object) [ "type" => "Owner_Change", "function" => "ownerChange"] ;
            unset($changed->Registrant);
            unset($changed->Admin);
        } 
        if($changed->Registrant) {
            $orderTypes[] =(object)  [ "type" => "Registrant_Details_Update", "function" => "registrantDetailsUpdate"] ;
        } 
        if($changed->Nameservers || $changed->DnsSec) {
            $orderTypes[] =(object)  [ "type" => "Nameserver_Update", "function" => "nameserverUpdate"] ;
            unset($changed->Tech);
        }
        if($changed->Admin ||$changed->Tech ||$changed->Billing ||$changed->Reseller) {
            $orderTypes[] =(object)  [ "type" => "Contact_Update", "function" => "contactUpdate"] ;
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