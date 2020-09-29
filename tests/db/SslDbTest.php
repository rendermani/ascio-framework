<?php
namespace ascio\test;
use PHPUnit\Framework\TestCase;
use ascio\lib\Ascio;
use ascio\v3\OrderType;
use ascio\v3\SslCertificateOrderRequest;
use ascio\v3\Contact;
use ascio\v3\Registrant;
use ascio\v3\ArrayOfString;
use Illuminate\Database\Eloquent\ModelNotFoundException;


final class SslDbTest extends TestCase {
     /**
     * @preserveGlobalState enabled
     */
    protected $order;
    public function testCreateData(): SslCertificateOrderRequest
    {
        Ascio::setConfig();
        $order = new SslCertificateOrderRequest();
        $order->setType(OrderType::Register);
        $certificate = $order->createSslCertificate();

        $contact = new Contact();
        $contact->setFirstName("Manuel");
        $contact->setLastName("Lautenschlager");
        $contact->setAddress1("adr.1");
        $contact->setEmail(Ascio::getConfig()->get()->email);

        $owner = new Registrant();
        $owner->setFirstName("Manuel");
        $owner->setLastName("Lautenschlager");
        $owner->setAddress1("adr.1");
        $owner->setEmail(Ascio::getConfig()->get()->email);
        $extensions = $owner->createExtensions();
        $extensions->addKeyValue()->setKey("Title")->setValue("Mr");
        $extensions->addKeyValue()->setKey("Test")->setValue("Mr");

        $certificate->setOwner($owner);
        $certificate->setAdmin($contact);
        $certificate->setCommonName("abc.com");
        $certificate->createSanNames()->add(["abc.de","cde.com"]);
        $this->assertEquals("Register",$order->getType(),"The OrderType should be Register");
        return $order;
    }
    /**
     * @depends testCreateData
     */
    public function testStoreOrder(SslCertificateOrderRequest $order) : string {
        $order->db()->syncToDb();
        $this->assertIsString($order->db()->getKey(),"The _id of the order should be an integer");
        $this->assertIsString($order->getSslCertificate()->db()->getKey(),"The _id of the certificate should be an integer");
        $this->assertIsString($order->getSslCertificate()->getOwner()->db()->getKey(),"The _id of the owner should be an integer");
        $this->assertEquals($order->getType(),"Register","The OrderType should be Register");
        $this->assertEquals($order->getSslCertificate()->getCommonName(),"abc.com","The common-name should be abc.com");
        $this->assertCount(2,$order->getSslCertificate()->getSanNames(),"There should be 2 SANs");
        $this->assertCount(2,$order->getSslCertificate()->getOwner()->getExtensions(),"There should be 2 Extensions. Test 2");
        $this->assertIsString($order->getSslCertificate()->getOwner()->getExtensions()->index(0)->db()->_parent_id,"The _parent_id of the KeyValue should be an integer");
        return $order->db()->getKey();
    }
     /**
     * @depends testStoreOrder
     */
    public function testReadOrder (string $id) {
        $order = new SslCertificateOrderRequest();
        $order->db()->_id = $id; 
        $order->db()->syncFromDb();
        
        $owner = $order->getSslCertificate()->getOwner();
        $extensions = $owner->getExtensions();
        $this->assertCount(2,$extensions,"There should be 2 Extensions");
        $this->assertEquals($order->getType(),"Register","The OrderType should be Register");
        $this->assertEquals($order->getSslCertificate()->getCommonName(),"abc.com","The common-name should be abc.com");
        $this->assertCount(2,$order->getSslCertificate()->getSanNames(),"There should be 2 SANs");
        $this->assertCount(2,$order->getSslCertificate()->getOwner()->getExtensions(),"There should be 2 Extensions. Test 2");
        return $id;
    }
     /**
     * @depends testReadOrder
     */
    public function testReadOrderAgain (string $id) {
        $order = new SslCertificateOrderRequest();
        $order->db()->_id = $id; 
        $order->db()->syncFromDb();
        
        $owner = $order->getSslCertificate()->getOwner();
        $extensions = $owner->getExtensions();
        $this->assertCount(2,$extensions,"There should be 2 Extensions");
        $this->assertEquals($order->getType(),"Register","The OrderType should be Register");
        $this->assertEquals($order->getSslCertificate()->getCommonName(),"abc.com","The common-name should be abc.com");
        $this->assertCount(2,$order->getSslCertificate()->getSanNames(),"There should be 2 SANs");
        $this->assertCount(2,$order->getSslCertificate()->getOwner()->getExtensions(),"There should be 2 Extensions. Test 2");
        return $id;
    }
        /**
     * @depends testReadOrderAgain
     */
    public function testUpdateOrder (string $id) {
        $order = new SslCertificateOrderRequest();
        $order->db()->getById($id);
        $order->getSslCertificate()->setCommonName("new.com");
        $order->getSslCertificate()->getOwner()->setFirstName("NewFirstName");
        $keyValue = $order->getSslCertificate()->getOwner()->getExtensions()->index(0);
        $keyValue->setValue("Doctor");
        $order->db()->syncToDb();

        $newOrder = new SslCertificateOrderRequest();
        $newOrder->db()->getById($id);
        $owner = $newOrder->getSslCertificate()->getOwner();
        $extensions = $owner->getExtensions();
        $this->assertCount(2,$extensions,"There should be 2 Extensions");
        $this->assertEquals($newOrder->getType(),"Register","The OrderType should be Register");
        $this->assertEquals($newOrder->getSslCertificate()->getCommonName(),"new.com","The common-name should be abc.com");
        $this->assertCount(2,$newOrder->getSslCertificate()->getSanNames(),"There should be 2 SANs");
        $this->assertCount(2,$newOrder->getSslCertificate()->getOwner()->getExtensions(),"There should be 2 Extensions. Test 2");
        $this->assertEquals("Doctor",$newOrder->getSslCertificate()->getOwner()->getExtensions()->index(0)->getValue(),"The new value should be 'Doctor'");
        return $id;
    }
     /**
     * @depends testUpdateOrder
     */
    public function testDeleteOrder (string $id) {
        $this->expectException(ModelNotFoundException::class);
        $order = new SslCertificateOrderRequest();
        $order->db()->getById($id);
        $order->db()->deleteRecursive(); 
        $newOrder = new SslCertificateOrderRequest();
        $newOrder->db()->getById($id);
    }


}

