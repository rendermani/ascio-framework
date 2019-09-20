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
 *  @covers DbBase
*/
final class TestDbBaseClass extends TestCase {
   
    protected $order;
    private function checkDomainAttributes($domain) {
        $domainAttributes = $domain->db();
        $registrantAttributes = $domain->getRegistrant()->db();

        $this->assertNotNull($domain->getDomainName());
        $this->assertEquals("Daisy Duck",$domain->getRegistrant()->getName(),"New Name should be new");
        $this->assertEquals("C123",$domain->getComment(),"New Name should be new");
        //attributes exists and are linked
        $this->assertNotNull($domainAttributes->_id,"The db()->_id should be set"); 
        $this->assertNotNull($registrantAttributes->_id,"The Registrant->db()->_id should be set"); 
        $this->assertNotNull($registrantAttributes->_parent_id,"The Registrant->db()->_parent_id should be set"); 
        $this->assertNotNull($registrantAttributes->_type,"The Registrant->db()->_type should be set"); 
        $this->assertNotNull($registrantAttributes->_parent_type,"The Registrant->db()->_parent_type should be set"); 
        $this->assertNotNull($registrantAttributes->_parent_db_type,"The Registrant->db()->_parent_db_type should be set"); 
        $this->assertEquals($domainAttributes->_parent_id, $domain->DbAttributes->_id, "The registrant should be linked to the parent."); 
    }
    public function testSerializeAndDeserialize() {
        Ascio::setConfig();
        $domain = TestLib::getDomainFull();
        $serialized = $domain->serialize();
        $domain2 = new Domain();
        $domain2->deserialize($serialized);

        $this->assertEquals($domain->db()->_id, $domain2->db()->_id, "The db()->_id should be set"); 
        $this->assertEquals($domain->getRegistrant()->db()->_id, $domain2->getRegistrant()->db()->_id, "The db()->_id should be set"); 
        $this->assertEquals($domain2->db()->_id, $domain2->getRegistrant()->db()->_parent_id, "The registrant should be linked to the parent."); 
        $this->assertCount(3, $domain2->getPrivacyProxy()->getExtensions(), $domain2->db()->_id, "The arrays should be set"); 
    }
    public function testIncrementalSerialize() : object {
        $domain = TestLib::getDomainFull();
        $domain->setComment("C123");
        $domain->db()->syncToDb();
        $domain->getRegistrant()->setName("Daisy Duck");        
        $serialized = $domain->serializeIncremental();

        $domainAttributes = $serialized->DbAttributes;
        $registrantAttributes = $serialized->Registrant->DbAttributes;

        //attributes exists and are linked
        $this->assertNotNull($domainAttributes->_id,"The db()->_id should be set"); 
        $this->assertNotNull($registrantAttributes->_id,"The Registrant->db()->_id should be set"); 
        $this->assertNotNull($registrantAttributes->_parent_id,"The Registrant->db()->_parent_id should be set"); 
        $this->assertNotNull($registrantAttributes->_type,"The Registrant->db()->_type should be set"); 
        $this->assertNotNull($registrantAttributes->_parent_type,"The Registrant->db()->_parent_type should be set"); 
        $this->assertNotNull($registrantAttributes->_parent_db_type,"The Registrant->db()->_parent_db_type should be set"); 
        $this->assertEquals($domainAttributes->_parent_id, $domain->DbAttributes->_id, "The registrant should be linked to the parent."); 
        //no empty updates
        $this->assertNull($serialized->DomainType,"The domainType should be empty because not updated"); 
        $this->assertNull($serialized->Registrant->Email,"The Registrant Email should be empty because not updated"); 
        $this->assertNull ($serialized->AdminContact,"The Registrant Email should be empty because not updated"); 
        //only existing updates
        $this->assertNotNull($serialized->Comment,"The domainType should be empty because not updated"); 
        $this->assertNull($serialized->Registrant->Email,"The Registrant Email should be empty because not updated");         
        return $serialized;        
    }
    /**
     * @depends testIncrementalSerialize
     */
    public function testIncrementalDeserialize($serialized)  {
        $domain = new Domain(); 
        $domain->getById($serialized->DbAttributes->_id);
        $domain->deserialize($serialized);
        $this->checkDomainAttributes($domain);
        return $serialized;
    }
    /**
     * @depends testIncrementalSerialize
     */
    public function testIncrementalSyncTo($serialized)  {
        $domain = new Domain(); 
        $domain->getById($serialized->DbAttributes->_id);
        $domain->deserialize($serialized);
        $domain->db()->syncToDb();
        $this->checkDomainAttributes($domain);
        return $serialized;
    }
    /**
     * @depends testIncrementalSyncTo
     */
    public function testIncrementalSyncFrom($serialized)  {
        $domain = new Domain(); 
        $domain->db()->_id = $serialized->DbAttributes->_id;
        $domain->db()->syncFromDb();
        $this->checkDomainAttributes($domain);
    }


}

