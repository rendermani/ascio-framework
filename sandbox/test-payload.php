<?php

use ascio\lib\LogLevel;
use ascio\logic\BlockPayload;
use ascio\logic\SyncPayload;
use ascio\v2\OrderStatusType;
use ascio\v2\Order;
use ascio\v2\OrderType;
use ascio\v2\TestLib;
require(__DIR__."/../vendor/autoload.php");


$domain = TestLib::getDomain();
$order = new Order();
$order->getOrderId("A123442");
$order->setType(OrderType::Register_Domain);
$order->setStatus(OrderStatusType::Failed);
$order->setDomain($domain); 

$payload = new SyncPayload($order);
$serialized = $payload->serialize();

echo "id: ". $serialized->id . "\n";
echo "class: ". $serialized->class . "\n";
echo "objectType: ". $serialized->objectType . "\n";

$payloadNew = new SyncPayload();
$payloadNew->deserialize($serialized);
echo $order->log(LogLevel::Info,"original");
echo $payloadNew->getObject()->log(LogLevel::Info,"serialized");

echo "block payload"; 

$payload = new BlockPayload($order);
var_dump($payload->serialize());

//var_dump($serialized);