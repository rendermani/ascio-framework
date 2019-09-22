<?php
namespace ascio\test;
use PHPUnit\Framework\TestCase;
use ascio\lib\Ascio;
use ascio\v2\Domain;
use ascio\v2\Contact;
use ascio\v2\NameServer;
use ascio\v2\NameServers;
use ascio\v2\Order;
use ascio\v2\OrderType;
use ascio\v2\PrivacyProxy;
use ascio\service\v3\OrderStatusType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ascio\v2\TestLib;
use ascio\base\BaseClass;

/**
 *  @covers DomainDb
*/
final class TestDbModel extends TestCase {
   
    protected $order;
    
    private function checkProperties($obj) {
        $this->assertEquals(Ascio::getConfig()->getEnvironment(),$obj->db()->_environment,"Test Environment should be set");        
        $this->assertEquals(Ascio::getConfig()->get("v2")->account,$obj->db()->_account,"The Account should be set");        
        $this->assertEquals(get_class($obj),$obj->db()->_type,"The type should match");        
        $this->assertEquals(Ascio::getConfig()->getId(),$obj->db()->_config,"The config should be set");           
        $this->assertStringStartsWith("ascio.object.", $obj->db()->_id);
    }
    private function checkForwardRelations($parent,$obj) {
        $this->assertStringStartsWith("ascio.object.", $parent->db()->_id);
        $this->assertEquals($parent->db()->_id, $obj->db()->_parent_id,get_class($parent). " and ". get_class($obj)." should be linked");
    }
    private function checkPartOfOrder(BaseClass $obj) {
        $this->assertTrue($obj->db()->_part_of_order,"Object ".get_class($obj)." should be part of order");
    }
    private function checkNotPartOfOrder(BaseClass $obj) {
        $this->assertNotTrue($obj->db()->_part_of_order,"Object ".get_class($obj)." should be part of order");
    }
    public function testCreateDbPropertiesDomain()
    {
        Ascio::setConfig();
        $domain = TestLib::getDomainFull();
        $domain->db()->createDbProperties();       
        $this->checkProperties($domain);
        $this->checkProperties($domain->getRegistrant());
        $this->checkProperties($domain->getPrivacyProxy());
        $this->checkProperties($domain->getPrivacyProxy()->getExtensions());
        $this->checkProperties($domain->getPrivacyProxy()->getExtensions()->index(0));        
        $this->checkForwardRelations($domain,$domain->getRegistrant());
        $this->checkForwardRelations($domain->getPrivacyProxy(),$domain->getPrivacyProxy()->getExtensions()->index(0));
        
        $this->checkNotPartOfOrder($domain);
        $this->checkNotPartOfOrder($domain->getRegistrant());
        $this->checkNotPartOfOrder($domain->getPrivacyProxy());
        $this->checkNotPartOfOrder($domain->getPrivacyProxy()->getExtensions()->index(0));
    
    }
    public function testCreateDbPropertiesOrder()
    {
        Ascio::setConfig();
        $order = new Order();
        $domain = TestLib::getDomainFull();
        $order->setDomain($domain);
        $order->db()->createDbProperties();               
        $this->checkProperties($domain);
        $this->checkProperties($domain->getRegistrant());
        $this->checkProperties($domain->getPrivacyProxy());
        $this->checkProperties($domain->getPrivacyProxy()->getExtensions());
        $this->checkProperties($domain->getPrivacyProxy()->getExtensions()->index(0));        

        $this->checkForwardRelations($domain,$domain->getRegistrant());
        $this->checkForwardRelations($domain->getPrivacyProxy(),$domain->getPrivacyProxy()->getExtensions()->index(0));
        $this->checkForwardRelations($order,$domain);

        $this->checkPartOfOrder($order);
        $this->checkPartOfOrder($domain);
        $this->checkPartOfOrder($domain->getRegistrant());
        $this->checkPartOfOrder($domain->getPrivacyProxy());
        $this->checkPartOfOrder($domain->getPrivacyProxy()->getExtensions()->index(0));
    }
    public function testSetIdsTwice()
    {
        Ascio::setConfig();
        $order = new Order();
        $domain = TestLib::getDomainFull();
        $order->setDomain($domain);
        $order->db()->createDbProperties();               
        $id = $order->db()->_id;
        $order->db()->createDbProperties();               
        $this->assertEquals($id,$order->db()->_id,"There should be no new ID when there is an old one"); 
    }



}

