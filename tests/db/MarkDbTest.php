<?php
namespace ascio\test;
use PHPUnit\Framework\TestCase;
use ascio\lib\Ascio;
use ascio\v3\OrderType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ascio\v3\MarkOrderRequest;
use ascio\v3\Trademark;
use ascio\v3\Registrant;

final class MarkDbTest extends TestCase {
     /**
     * @preserveGlobalState enabled
     */
    protected $order;
    public function testCreateData(): MarkOrderRequest
    {
        Ascio::setConfig();
        $order = new MarkOrderRequest();
        $order->setType(OrderType::Register);
        $mark = new Trademark();
        $mark->setMarkName("testmark");
        
        $owner = new Registrant();
        $owner->setFirstName("Manuel");
        $owner->setLastName("Lautenschlager");
        $owner->setAddress1("adr.1");
        $owner->setEmail(Ascio::getConfig()->get()->email);
        $extensions = $owner->createExtensions();
        $extensions->addKeyValue()->setKey("Title")->setValue("Mr");
        $extensions->addKeyValue()->setKey("Test")->setValue("Mr");
        $mark->setOwner($owner);
        $order->setMark($mark);

        $this->assertEquals("testmark",$order->getMark()->getMarkName(),"The mark-name should be 'testmark'");         
        return $order;
    }
    /**
     * @depends testCreateData
     */
    public function testStoreOrder(MarkOrderRequest $order) : string {
        $order->db()->syncToDb();
        $this->assertEquals("testmark",$order->getMark()->getMarkName(),"The mark-name should be 'testmark'"); 
        $this->assertEquals("Mr",$order->getMark()->getOwner()->getExtensions()->index(0)->getValue(),"The owner-extension should be 'Mr'"); 
        return $order->db()->getKey();
    }
     /**
     * @depends testStoreOrder
     */
    public function testReadOrder (string $id) {
        $order = new MarkOrderRequest();
        $order->db()->_id = $id; 
        $order->db()->syncFromDb();        
        $this->assertEquals("testmark",$order->getMark()->getMarkName(),"The mark-name should be 'testmark'"); 
        return $id;
    }
     /**
     * @depends testReadOrder
     */
    public function testUpdateOrder (string $id) {
        $order = new MarkOrderRequest();
        $order->db()->getById($id);
        $order->getMark()->setMarkName("newtestmark");
        $order->db()->syncToDb();

        $newOrder = new MarkOrderRequest();
        $newOrder->db()->getById($id);
        $this->assertEquals("Register",$newOrder->getType(),"The OrderType should be Register");
        $this->assertEquals("newtestmark",$newOrder->getMark()->getMarkName(),"The mark-name should be testmark 'newtestmark' ");
        $this->assertInstanceOf(Trademark::class, $newOrder->getMark());
        return $id;
    }
     /**
     * @depends testUpdateOrder
     */
    public function testDeleteOrder (string $id) {
        $this->expectException(ModelNotFoundException::class);
        $order = new MarkOrderRequest();
        $order->db()->getById($id);
        $order->db()->deleteRecursive(); 
        $newOrder = new MarkOrderRequest();
        $newOrder->db()->getById($id);
    }


}

