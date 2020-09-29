<?php
namespace ascio\test;

use ascio\lib\Ascio;
use ascio\lib\LogLevel;
use ascio\logic\BlockPayload;
use ascio\logic\Payload;
use ascio\logic\PayloadFactory;
use ascio\logic\SyncPayload;
use ascio\v2\OrderStatusType;
use ascio\v2\Order;
use ascio\v2\OrderType;
use ascio\v2\TestLib;
use PHPUnit\Framework\TestCase;

/**
 * @covers ascio\lib\Changes
 */
final class SyncPayloadTest extends TestCase {
    public function testInitPayload() {
        Ascio::setConfig();
        $domain = TestLib::getDomain();
        $order = new Order();
        $order->getOrderId("A123442");
        $order->setType(OrderType::Register_Domain);
        $order->setStatus(OrderStatusType::Failed);
        $order->setDomain($domain);         
        $payload = new SyncPayload($order);
        /**
         * @var Order $orderPayload
         */
        $orderPayload = $payload->getObject();
        $this->assertEquals($domain->getDomainName(),$payload->getObjectName(),"The Objectname should be the DomainName");
        $this->assertEquals(OrderStatusType::Failed,$payload->getStatus(),"The Status should be Failed");
        $this->assertNotNull($orderPayload->getDomain(),"A domain should exist");
        return $payload;
    }    
    /**
    * @depends testInitPayload
    */
    public function testSerialize(SyncPayload $payload) {
        $serialized = $payload->serialize();
        $this->assertEquals($payload->getClass(),$serialized->class,"The class should be serialized");
        $this->assertNotNull($serialized->id,"The id should be not be null");
        $this->assertEquals($payload->getId(),$serialized->id,"The id should be serialized");
        $this->assertEquals($payload->getObjectType(),$serialized->objectType,"The objectType should be serialized");
        $this->assertNotNull($serialized->object->Domain,"A domain should exist");
        return $serialized; 
    }
    /**
    * @depends testSerialize
    */
    public function testDeserialze($serialized) {
        /**
         * @var SyncPayload $payload
         */
        $payload = PayloadFactory::deserialize($serialized);  
        /**
         * @var Order $object
         */
        $object = $payload->getObject();
        $this->assertEquals($payload->getClass(),"ascio\\logic\\SyncPayload","The class should be serialized");
        $this->assertNotNull($payload->getId(),"The id should be not be null");
        $this->assertEquals($serialized->id,$payload->getId(),"The id should be serialized");
        $this->assertEquals($payload->getObjectType(),"ascio\\v2\\Order","The objectType should be serialized");
        $this->assertNotNull($object->getDomain(),"A domain should exist");
    }


}