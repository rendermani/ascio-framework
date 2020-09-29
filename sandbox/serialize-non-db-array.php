<?php
namespace ascio\lib;

use ascio\logic\BlockPayload;
use ascio\v2\Order;
use ascio\v3\ArrayOfOrderHistory;
use ascio\v3\OrderHistory;
use ascio\v3\OrderInfo;
use DateTime;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$orderInfo = new OrderInfo();
$orderInfo
    ->createOrderStatusHistory()
    ->addOrderHistory()
    ->setState("Validated")
    ->setDate(new DateTime());
$orderInfo
    ->getOrderStatusHistory()
    ->addOrderHistory()
    ->setState("Completed")
    ->setDate(new DateTime());


$serialized = json_encode($orderInfo->serialize());

$orderInfo = new OrderInfo(); 
/**
 * @var OrderInfo $deserialized 
 */
$deserialized = $orderInfo->deserialize(json_decode($serialized));
$deserialized->db()->syncToDb(); 

$orderInfo2 = new OrderInfo();
$orderInfo2->db()->getById($deserialized->db()->_id);
echo($orderInfo2->getOrderStatusHistory()->toJson(JSON_PRETTY_PRINT));