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
use ascio\v2\Order;
use ascio\v2\OrderType;
use ascio\lib\LockType;
use Illuminate\Contracts\Cache\Lock;

/**
 * @covers ascio\v2\Domain
 */
final class TestDomain extends TestCase {
    public function testGetDomainFromApi() {
        Ascio::setConfig();
        $domain = new Domain();
        $domain->getByHandle("ADARALOV36431");
        $this->assertEquals("adara-loves-manuel.com",$domain->getDomainName());
        return $domain;
    }
    /**
     * @depends testGetDomainFromApi
     */
    public function testOwnerChange(Domain $domain) {
        $domain->getRegistrant()->setName("My new name");    
        $orders = $domain->getUpdateOrders();
        /**
         * @var Order $order
         */
        $order = $orders[0];
        $this->assertCount(1,$orders,"There should be only 1 order");
        $this->assertEquals(OrderType::Owner_Change,$order->getType(), "The OrderType should be ".OrderType::Owner_Change);
        $this->assertEquals("ADARALOV36431",$order->getDomain()->getDomainHandle(), "The Domain-Name should be ADARALOV36431");
        $this->assertEquals("My new name",$order->getDomain()->getRegistrant()->getName(),"The registrant name should be my new name");
        $this->assertNull($order->getDomain()->getAdminContact(),"The AdminContact should be null");
        $this->assertNull($order->getDomain()->getTechContact(),"The TechContacthould be null");
        $this->assertNull($order->getDomain()->getBillingContact(),"The BillingContact should be null");
        $this->assertNull($order->getDomain()->getResellerContact(),"The ResellerContact should be null");
        $this->assertNull($order->getDomain()->getNameservers(),"The Nameservers should be null");
        $this->assertNull($order->getDomain()->getExpDate(),"The ExpireDate should be null");
        return $orders;
    }
    /**
     * @depends testGetDomainFromApi
     */
    public function xtestSubmit($orders) {
        foreach ($orders as $order) {
            /**
             * @var Order $order
             */
            $order->submit();            
        }
    }

        /**
     * @depends testGetDomainFromApi
     */
    public function testRegistrantDetailsUpdate(Domain $domain) {
        $domain = new Domain();
        $domain->getByHandle("ADARALOV36431");
        $domain->getRegistrant()->setAddress1("My new adr");
        $orders = $domain->getUpdateOrders();
        /**
         * @var Order $order
         */
        $order = $orders[0];
        $this->assertCount(1,$orders,"There should be only 1 order");
        $this->assertEquals(OrderType::Registrant_Details_Update,$order->getType(), "The OrderType should be ".OrderType::Registrant_Details_Update);
        $this->assertEquals("ADARALOV36431",$order->getDomain()->getDomainHandle(), "The Domain-Name should be ADARALOV36431");
        $this->assertEquals("My new adr",$order->getDomain()->getRegistrant()->getAddress1(),"The registrant address should be my new adr");
        $this->assertNull($order->getDomain()->getAdminContact(),"The AdminContact should be null");
        $this->assertNull($order->getDomain()->getTechContact(),"The TechContacthould be null");
        $this->assertNull($order->getDomain()->getBillingContact(),"The BillingContact should be null");
        $this->assertNull($order->getDomain()->getResellerContact(),"The ResellerContact should be null");
        $this->assertNull($order->getDomain()->getNameservers(),"The Nameservers should be null");
        $this->assertNull($order->getDomain()->getExpDate(),"The ExpireDate should be null");
        return $orders;
    }
    /**
     * @depends testGetDomainFromApi
     */
    public function testContactUpdate(Domain $domain) {        
        $domain = new Domain();
        $domain->getByHandle("ADARALOV36431");
        $domain->getAdminContact()->setAddress1("My new adr");
        $orders = $domain->getUpdateOrders();
        //var_dump($orders[0]->properties()->toArray()); die();
        /**
         * @var Order $order
         */
        $order = $orders[0];
        $this->assertCount(1,$orders,"There should be only 1 order");
        $this->assertEquals(OrderType::Contact_Update,$order->getType(), "The OrderType should be ".OrderType::Contact_Update);
        $this->assertEquals("ADARALOV36431",$order->getDomain()->getDomainHandle(), "The Domain-Name should be ADARALOV36431");
        $this->assertEquals("My new adr",$order->getDomain()->getAdminContact()->getAddress1(),"The registrant address should be my new adr");
        $this->assertNotNull($order->getDomain()->getAdminContact(),"The AdminContact should be set");
        $this->assertNotNull($order->getDomain()->getTechContact(),"The TechContacthould be set");
        $this->assertNotNull($order->getDomain()->getBillingContact(),"The BillingContact should be set");
        $this->assertNull($order->getDomain()->getResellerContact(),"The ResellerContact should be null");
        $this->assertNull($order->getDomain()->getRegistrant(),"The Registrant should be null");
        $this->assertNull($order->getDomain()->getNameservers(),"The Nameservers should be null");
        $this->assertNull($order->getDomain()->getExpDate(),"The ExpireDate should be null");
        return $orders;
    }
        /**
     * @depends testGetDomainFromApi
     */
    public function testContactUpdateAdminTech(Domain $domain) {        
        $domain = new Domain();
        $domain->getByHandle("ADARALOV36431");
        $domain->getAdminContact()->setAddress1("My new adr");
        $domain->getTechContact()->setAddress2("My new adr 2");
        $orders = $domain->getUpdateOrders();
        /**
         * @var Order $order
         */
        $order = $orders[0];
        $this->assertCount(1,$orders,"There should be only 1 order");
        $this->assertEquals(OrderType::Contact_Update,$order->getType(), "The OrderType should be ".OrderType::Contact_Update);
        $this->assertEquals("ADARALOV36431",$order->getDomain()->getDomainHandle(), "The Domain-Name should be ADARALOV36431");
        $this->assertEquals("My new adr",$order->getDomain()->getAdminContact()->getAddress1(),"The admin address should be 'My new adr'");
        $this->assertEquals("My new adr 2",$order->getDomain()->getTechContact()->getAddress2(),"The tech address should be 'My new adr 2'");
        $this->assertNotNull($order->getDomain()->getAdminContact(),"The AdminContact should be set");
        $this->assertNotNull($order->getDomain()->getTechContact(),"The TechContacthould be set");
        $this->assertNotNull($order->getDomain()->getBillingContact(),"The BillingContact should be set");
        $this->assertNull($order->getDomain()->getResellerContact(),"The ResellerContact should be null");
        $this->assertNull($order->getDomain()->getRegistrant(),"The Registrant should be null");
        $this->assertNull($order->getDomain()->getNameservers(),"The Nameservers should be null");
        $this->assertNull($order->getDomain()->getExpDate(),"The ExpireDate should be null");
        return $orders;
    }
    /**
     * @depends testGetDomainFromApi
     */
    public function testNameserverUpdate(Domain $domain) {
        $domain = new Domain();
        $domain->getByHandle("ADARALOV36431");
        $domain->getNameServers()->getNameServer2()->setHostName("ns.new.com");
        $orders = $domain->getUpdateOrders();
        /**
         * @var Order $order
         */
        $order = $orders[0];
        $this->assertCount(1,$orders,"There should be only 1 order");
        $this->assertEquals(OrderType::Nameserver_Update,$order->getType(), "The OrderType should be ".OrderType::Nameserver_Update);
        $this->assertEquals("ADARALOV36431",$order->getDomain()->getDomainHandle(), "The Domain-Name should be ADARALOV36431");
        $this->assertEquals("ns.new.com",$order->getDomain()->getNameServers()->getNameServer2()->getHostName(),"The nameserver hostname should be my new ns.new.com");
        $this->assertNull($order->getDomain()->getAdminContact(),"The AdminContact should not be set");
        $this->assertNull($order->getDomain()->getTechContact(),"The TechContacthould not be set");
        $this->assertNull($order->getDomain()->getBillingContact(),"The BillingContact should not be set");
        $this->assertNull($order->getDomain()->getResellerContact(),"The ResellerContact should be null");
        $this->assertNull($order->getDomain()->getRegistrant(),"The Registrant should be null");
        $this->assertNotNull($order->getDomain()->getNameservers(),"The Nameservers should be null");
        $this->assertNull($order->getDomain()->getExpDate(),"The ExpireDate should be null");
        return $orders;
    }
    /**
     * @depends testGetDomainFromApi
     */
    public function testDomainDetailsUpdate(Domain $domain) {
        $domain = new Domain();
        $domain->getByHandle("ADARALOV36431");
        $domain->setRenewPeriod(5);
        $domain->setTransferLock("Unlock");
        $orders = $domain->getUpdateOrders();
        /**
         * @var Order $order
         */
        $order = $orders[0];
        $this->assertCount(1,$orders,"There should be only 1 order");
        $this->assertEquals(OrderType::Domain_Details_Update,$order->getType(), "The OrderType should be ".OrderType::Domain_Details_Update);
        $this->assertEquals("ADARALOV36431",$order->getDomain()->getDomainHandle(), "The Domain-Name should be ADARALOV36431");
        $this->assertEquals(5,$order->getDomain()->getRenewPeriod(),"The domain RenewPeriod should be 5");
        $this->assertEquals(null,$order->getDomain()->getTransferLock(),"The locks should be 0");
        $this->assertNull($order->getDomain()->getAdminContact(),"The AdminContact should be null");
        $this->assertNull($order->getDomain()->getTechContact(),"The TechContacthould be null");
        $this->assertNull($order->getDomain()->getBillingContact(),"The BillingContact should be null");
        $this->assertNull($order->getDomain()->getResellerContact(),"The ResellerContact should be null");
        $this->assertNull($order->getDomain()->getNameservers(),"The Nameservers should be null");
        $this->assertNull($order->getDomain()->getRegistrant(),"The Registrant should be null");
        $this->assertNull($order->getDomain()->getExpDate(),"The ExpireDate should be null");
        return $orders;
    }
    /**
     * @depends testGetDomainFromApi
     */
    public function testChangeLocks(Domain $domain) {
        $domain = new Domain();
        $domain->getByHandle("ADARALOV36431");
        $domain->getLocks()->deleteLock()->set(true);
        $orders = $domain->getUpdateOrders();
        /**
         * @var Order $order
         */
        $order = $orders[0];
        $this->assertCount(1,$orders,"There should be only 1 order");
        $this->assertEquals(OrderType::Change_Locks,$order->getType(), "The OrderType should be ".OrderType::Change_Locks);
        $this->assertEquals("ADARALOV36431",$order->getDomain()->getDomainHandle(), "The Domain-Handle should be ADARALOV36431");
        $this->assertEquals("Lock",$order->getDomain()->getDeleteLock(),"The Delete-Lock should be 'Lock'");
        $this->assertEquals(null,$order->getDomain()->getTransferLock(),"The Transfer-Lock should be null");
        $this->assertEquals(null,$order->getDomain()->getUpdateLock(),"The Update-Lock should be null");
        $this->assertNull($order->getDomain()->getAdminContact(),"The AdminContact should be null");
        $this->assertNull($order->getDomain()->getTechContact(),"The TechContacthould be null");
        $this->assertNull($order->getDomain()->getBillingContact(),"The BillingContact should be null");
        $this->assertNull($order->getDomain()->getResellerContact(),"The ResellerContact should be null");
        $this->assertNull($order->getDomain()->getNameservers(),"The Nameservers should be null");
        $this->assertNull($order->getDomain()->getRegistrant(),"The Registrant should be null");
        $this->assertNull($order->getDomain()->getExpDate(),"The ExpireDate should be null");
        return $orders;
    }
    /**
     * @depends testGetDomainFromApi
     */
    public function testNameserverUpdateWithTech(Domain $domain) {
        $domain = new Domain();
        $domain->getByHandle("ADARALOV36431");
        $domain->getNameServers()->getNameServer2()->setHostName("ns.new.com");
        $domain->getTechContact()->setAddress2("My new adr 2");
        $orders = $domain->getUpdateOrders();
        /**
         * @var Order $order
         */
        $order = $orders[0];
        $this->assertCount(1,$orders,"There should be only 1 order");
        $this->assertEquals(OrderType::Nameserver_Update,$order->getType(), "The OrderType should be ".OrderType::Nameserver_Update);
        $this->assertEquals("ADARALOV36431",$order->getDomain()->getDomainHandle(), "The Domain-Name should be ADARALOV36431");
        $this->assertEquals("My new adr 2",$order->getDomain()->getTechContact()->getAddress2(),"The registrant address should be 'My new adr 2'");
        $this->assertNull($order->getDomain()->getAdminContact(),"The AdminContact should be null");
        $this->assertNull($order->getDomain()->getBillingContact(),"The BillingContact should be null");
        $this->assertNull($order->getDomain()->getResellerContact(),"The ResellerContact should be null");
        $this->assertNotNull($order->getDomain()->getNameservers(),"The Nameservers should not be null");
        $this->assertNotNull($order->getDomain()->getTechContact(),"The Tech should not be null");
        $this->assertNull($order->getDomain()->getRegistrant(),"The Registrant should be null");
        $this->assertNull($order->getDomain()->getExpDate(),"The ExpireDate should be null");
        return $orders;
    }
    /**
     * @depends testGetDomainFromApi
     */
    public function testNameserverUpdateWithAdmin(Domain $domain) {
        $domain = new Domain();
        $domain->getByHandle("ADARALOV36431");
        $domain->getNameServers()->getNameServer2()->setHostName("ns.new.com");
        $domain->getAdminContact()->setAddress1("My new adr");
        $orders = $domain->getUpdateOrders();
        /**
         * @var Order $order
         */
        $order = $orders[0];
        $this->assertCount(2,$orders,"There should be 2 orders");
        $this->assertEquals(OrderType::Nameserver_Update,$order->getType(), "The OrderType should be ".OrderType::Nameserver_Update);
        $this->assertEquals("ADARALOV36431",$order->getDomain()->getDomainHandle(), "The Domain-Name should be ADARALOV36431");
        $this->assertNull($order->getDomain()->getBillingContact(),"The BillingContact should be null");
        $this->assertNull($order->getDomain()->getResellerContact(),"The ResellerContact should be null");
        $this->assertNull($order->getDomain()->getAdminContact(),"The AdminContact should be null");
        $this->assertNotNull($order->getDomain()->getNameservers(),"The Nameservers should not be null");
        $this->assertNull($order->getDomain()->getRegistrant(),"The Registrant should be null");
        $this->assertNull($order->getDomain()->getExpDate(),"The ExpireDate should be null");
        
        $order2 = $orders[1];
        $this->assertEquals(OrderType::Contact_Update,$order2->getType(), "The OrderType should be ".OrderType::Contact_Update);
        $this->assertEquals("ADARALOV36431",$order2->getDomain()->getDomainHandle(), "The Domain-Name should be ADARALOV36431");
        $this->assertEquals("My new adr",$order2->getDomain()->getAdminContact()->getAddress1(),"The registrant address should be 'My new adr'");
        $this->assertNotNull($order2->getDomain()->getAdminContact(),"The AdminContact should be set");
        $this->assertNotNull($order2->getDomain()->getTechContact(),"The TechContacthould be set");
        $this->assertNotNull($order2->getDomain()->getBillingContact(),"The BillingContact should be set");
        $this->assertNull($order2->getDomain()->getResellerContact(),"The ResellerContact should be null");
        $this->assertNull($order2->getDomain()->getRegistrant(),"The Registrant should be null");
        $this->assertNull($order2->getDomain()->getNameservers(),"The Nameservers should be null");
        $this->assertNull($order2->getDomain()->getExpDate(),"The ExpireDate should be null");
        return $orders;
    }
    /**
     * @depends testGetDomainFromApi
     */
    public function testOwnerNsContactUpdate(Domain $domain) {
        $domain = new Domain();
        $domain->getByHandle("ADARALOV36431");
        $domain->getNameServers()->getNameServer2()->setHostName("ns.new.com");
        $domain->getBillingContact()->setAddress1("My new adr");
        $domain->getAdminContact()->setAddress1("My new adr");
        $domain->getRegistrant()->setName("My new name");
        $orders = $domain->getUpdateOrders();
        $this->assertCount(3,$orders,"There should be 3 orders");        
        $this->assertEquals($this->getOrderTypes($orders),["Owner_Change","Nameserver_Update","Contact_Update"],"OrderTypes should match.");

        return $orders;
    }
    /**
     * @depends testGetDomainFromApi
     */
    public function testRdNsContactUpdate(Domain $domain) {
        $domain = new Domain();
        $domain->getByHandle("ADARALOV36431");
        $domain->getNameServers()->getNameServer2()->setHostName("ns.new.com");
        $domain->getBillingContact()->setAddress1("My new adr");
        $domain->getAdminContact()->setAddress1("My new adr");
        $domain->getRegistrant()->setAddress1("My new name");
        $orders = $domain->getUpdateOrders();
        $this->assertCount(3,$orders,"There should be 3 orders");        
        $this->assertEquals($this->getOrderTypes($orders),["Registrant_Details_Update","Nameserver_Update","Contact_Update"],"OrderTypes should match.");
        return $orders;
    }
    /**
     * @depends testGetDomainFromApi
     */
    public function testDnsSec(Domain $domain) {
        $domain = new Domain();
        $domain->getByHandle("ADARALOV36431");
        $domain->createDnsSecKeys()->createDnsSecKey1()->setDigest("123");
        $orders = $domain->getUpdateOrders();
        $order = $orders[0];
        $this->assertCount(1,$orders,"There should be 1 order");
        $this->assertEquals(OrderType::Nameserver_Update,$order->getType(), "The OrderType should be ".OrderType::Nameserver_Update);
        $this->assertEquals("123", $domain->getDnsSecKeys()->getDnsSecKey1()->getDigest(),"The Digest should be 123");
        return $orders;
    }
    private function getOrderTypes($orders) {
        foreach($orders as $order) {
            $orderTypes[] = $order->getType();
        }
        return $orderTypes;
    }


}