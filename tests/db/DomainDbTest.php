<?php
namespace ascio\test;
use PHPUnit\Framework\TestCase;
use ascio\lib\Ascio;
use ascio\v2\Domain;
use ascio\v2\Contact;
use ascio\v2\NameServer;
use ascio\v2\NameServers;
use ascio\v2\Order;
use ascio\db\v2\OrderDb;
use ascio\v2\OrderType;
use ascio\v2\PrivacyProxy;
use ascio\service\v3\OrderStatusType;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class DomainDbTest extends TestCase {
   
    protected $order;
    
    private function checkDomainData(Order $order) {
        $this->assertEquals("Register_Domain",$order->getType(),"The OrderType is Register_Domain");
        $domain = $order->getDomain();        
        $extensions = $domain->getPrivacyProxy()->getExtensions();
        $this->assertCount(3,$extensions,"There should be 3 extensions");
    }
    public function testStoreOrder(): string
    {
        Ascio::setConfig();
        $email = "manuellautenschlager@gmail.com";
        $domain =  new Domain();
        $registrant =  $domain->createRegistrant();
        $registrant->setName("Jane Doe");
        $registrant->setAddress1("Address1Test");
        $registrant->setCity("CityTest");
        $registrant->setPostalCode("888349");
        $registrant->setCountryCode("DK");
        $registrant->setEmail($email);
        $registrant->setPhone("+45.123456789");
        $contact =  new Contact();
        $contact->setFirstName("John");
        $contact->setLastName("Doe");
        $contact->setAddress1("Address1Test");
        $contact->setPostalCode("888349");
        $contact->setCity("CityTest");
        $contact->setCountryCode("DK");
        $contact->setEmail($email);
        $contact->setPhone("+45.123456789");
        $contact->setType("owner");
        $nameServer1 =  new NameServer();
        $nameServer1->setHostName("ns1.ascio.net");
        $nameServer2 =  new NameServer();
        $nameServer2->setHostName("ns2.ascio.net");
        $nameServers =  new NameServers();
        $nameServers->setNameServer1($nameServer1);
        $nameServers->setNameServer2($nameServer2);
        $domain =  new Domain();
        $time = str_replace(".","",microtime(true));
        $domain->setDomainName("phpfw-manuel-".$time.".com");
        $domain->setRegistrant($registrant);
        $domain->setAdminContact($contact);
        $domain->setTechContact($contact);
        $domain->setBillingContact($contact);
        $domain->setNameServers($nameServers);
        $domain->setDiscloseSocialData("true");
        $proxy = new PrivacyProxy();
        $extensions = $proxy->createExtensions();
        $extensions->addExtension()->setKey("test")->setValue("1234");
        $extensions->addExtension()->setKey("test")->setValue("5678");
        $extensions->addExtension()->setKey("test")->setValue("910");
        $domain->setPrivacyProxy($proxy);
        $order = new Order();
        $order->setType(OrderType::Register_Domain);
        $order->setDomain($domain);
        $this->checkDomainData($order);
        $order->db()->syncToDb();
        $this->checkDomainData($order);
        return $order->db()->getId();
    }
    /**
     * @depends testStoreOrder
     * @covers ascio\v2\Order::__construct()
     * @covers ascio\db\v2\OrderDb::getById()
     */
    public function testReadOrder(string $id) : Order {
       $order = new Order();       
       $order->db()->getById($id); 
       $this->checkDomainData($order);
       return $order;
    }
    /**
     * @depends testReadOrder
     * @covers ascio\db\v2\OrderDb::getById()
     */
    public function testReadOrderAgain(Order  $order) : Order{
        $order->db()->getById($order->db()->getId()); 
        $this->checkDomainData($order);
        return $order;
     }
     /**
     * @depends testReadOrderAgain
     * @covers ascio\db\v2\OrderDb::syncToDb()
     * @covers ascio\db\v2\OrderDb::getById()
     */
    public function testUpdateOrder(Order  $order) : Order {
        $order->setStatus(OrderStatusType::PendingInternalProcessing);
        $order->getDomain()->getPrivacyProxy()->getExtensions()->index(0)->setValue("0000");
        $this->checkDomainData($order);
        $order->db()->syncToDb(); 
        $newOrder = new Order();
        $newOrder->db()->getById($order->db()->getId());
        $this->checkDomainData($newOrder);
        $extensions = $newOrder->getDomain()->getPrivacyProxy()->getExtensions(); 
        $this->assertEquals("0000",$extensions->index(0)->getValue(),"The first Extension->Value should be 0000");
        $this->assertCount(3,$extensions,"There should be 3 Extensions");   
        return $order;    
     }
    /**
     * @depends testUpdateOrder
     * @covers ascio\db\v2\OrderDb::deleteRecursive()
     * @covers ascio\db\v2\OrderDb::getById()
     */
    public function testDeleteOrder (Order $order) {
        $this->expectException(ModelNotFoundException::class);
        $order->db()->deleteRecursive(); 
        $newOrder = new Order();
        $newOrder->db()->getById($order->db()->getId());       
    }



}

