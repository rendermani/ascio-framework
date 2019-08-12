<?php
namespace ascio\test;
use PHPUnit\Framework\TestCase;
use ascio\lib\Ascio;
use ascio\v2\Contact;
use ascio\v2\Domain;
use ascio\v2\NameServer;
use ascio\v2\NameServers;
use ascio\v2\PrivacyProxy;
use ascio\v2\Extensions;
use ascio\v2\DomainUpdates;
use ascio\v2\TestLib;

/**
 * @covers ascio\v2\DomainUpdates
 */
final class TestDomainUpdates extends TestCase {

    public function testOwnerChange() {
        $domain = TestLib::getDomain();
        $domain->getRegistrant()->setName("My new name");
        $updates = new DomainUpdates($domain);
        $orderTypes = $updates->getOrderTypes();
        $this->assertEquals(["Owner_Change"],$this->reduceOrderTypes($orderTypes),"The OrderType should be Owner Change") ;
        return $domain; 
    }
    
    public function testOwnerChangeNoAdmin() {
        $domain = TestLib::getDomain();
        $domain->getRegistrant()->setName("My new name");
        $domain->getAdminContact()->setLastName("My new name");
        $updates = new DomainUpdates($domain);
        $orderTypes = $updates->getOrderTypes();
        $this->assertEquals(["Owner_Change"],$this->reduceOrderTypes($orderTypes),"The OrderType should be Owner Change and no Contact Update") ;
        return $domain; 
    }

    public function testOwnerContactUpdate() {
        $domain = TestLib::getDomain();
        $domain->getRegistrant()->setName("My new name");
        $domain->getTechContact()->setLastName("My new name");
        $updates = new DomainUpdates($domain);
        $orderTypes = $updates->getOrderTypes();
        $this->assertEquals(["Owner_Change","Contact_Update"],$this->reduceOrderTypes($orderTypes),"The OrderType should be Owner Change") ;
        return $domain; 
    }    

    public function testRegistrantDetailsUpdate() {
        $domain = TestLib::getDomain();
        $domain->getRegistrant()->setAddress2("My new adr");
        $updates = new DomainUpdates($domain);
        $orderTypes = $updates->getOrderTypes();
        $this->assertEquals(["Registrant_Details_Update"],$this->reduceOrderTypes($orderTypes),"The OrderType should be Registrant Details Update") ;
        return $domain; 
    }

    public function testContactUpdateTech() {
        $domain = TestLib::getDomain();
        $domain->getTechContact()->setAddress2("My new adr");
        $updates = new DomainUpdates($domain);
        $orderTypes = $updates->getOrderTypes();
        $this->assertEquals(["Contact_Update"],$this->reduceOrderTypes($orderTypes),"The OrderType should be Contact Update") ;
        return $domain; 
    }

    public function testNameserverUpdate() {
        $domain = TestLib::getDomain();
        $domain->changes()->setOriginal();
        $domain->getNameServers()->getNameServer1()->setHostName("ns.new.com");
        $updates = new DomainUpdates($domain);
        $orderTypes = $updates->getOrderTypes();
        $this->assertEquals(["Nameserver_Update"],$this->reduceOrderTypes($orderTypes),"The OrderType should be Nameserver Update") ;
        return $domain; 
    }

    public function testNameserverUpdateDnssec() {
        $domain = TestLib::getDomain();
        $domain->changes()->setOriginal();
        $domain->getDnsSecKeys()->getDnsSecKey1()->setDigest("123");
        $updates = new DomainUpdates($domain);
        $orderTypes = $updates->getOrderTypes();
        $this->assertEquals(["Nameserver_Update"],$this->reduceOrderTypes($orderTypes),"The OrderType should be Nameserver Update") ;
        return $domain; 
    }
    
    public function testNameserverUpdateNoTech() {
        $domain = TestLib::getDomain();
        $domain->getNameServers()->getNameServer1()->setHostName("ns.new.com");
        $domain->getTechContact()->setAddress2("My new adr");
        $updates = new DomainUpdates($domain);
        $orderTypes = $updates->getOrderTypes();
        $this->assertEquals(["Nameserver_Update"],$this->reduceOrderTypes($orderTypes),"The OrderType should be Nameserver Update and no Contact Update") ;
        return $domain; 
    }
    public function testDomainDetailsUpdate() {
        $domain = TestLib::getDomain();
        $domain->setRenewPeriod(2);
        $updates = new DomainUpdates($domain);
        $orderTypes = $updates->getOrderTypes();
        $this->assertEquals(["Domain_Details_Update"],$this->reduceOrderTypes($orderTypes),"The OrderType should be Domain Details Update") ;
        return $domain; 
    }
    public function testDomainDetailsPrivacy() {
        $domain = TestLib::getDomain();
        $domain->getPrivacyProxy()->getExtensions()->index(1)->setValue("1111");
        $updates = new DomainUpdates($domain);
        $orderTypes = $updates->getOrderTypes();
        $this->assertEquals(["Domain_Details_Update"],$this->reduceOrderTypes($orderTypes),"The OrderType should be Domain Details Update") ;
        return $domain; 
    }
    public function testAllUpdates() {
        $domain = TestLib::getDomain();
        $domain->setRenewPeriod(2);
        $domain->getNameServers()->getNameServer1()->setHostName("ns.new.com");
        $domain->getRegistrant()->setName("My new name");
        $domain->getBillingContact()->setAddress2("My new adr");

        $updates = new DomainUpdates($domain);
        $orderTypes = $updates->getOrderTypes();
        $this->assertEquals(["Domain_Details_Update","Owner_Change","Nameserver_Update","Contact_Update"],$this->reduceOrderTypes($orderTypes),"The OrderType should be Domain Details Update") ;
        return $domain; 
    }
    public function testNoUpdates() {
        $domain = TestLib::getDomain();
        $updates = new DomainUpdates($domain);
        $orderTypes = $updates->getOrderTypes();
        $this->assertEquals([],$this->reduceOrderTypes($orderTypes),"The OrderType should be Domain Details Update") ;
        return $domain; 
    }
    private function reduceOrderTypes ($orderTypes) {
        $result = [];
        foreach ($orderTypes as $orderType) {
            $result[] = $orderType->type;
        }
        return $result;
    }
}