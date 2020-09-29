<?php
namespace ascio\lib;

use ascio\v3\OrderInfo;
use ascio\v3\OrderStatusType;

require(__DIR__."/../vendor/autoload.php");

$order = new OrderInfo();
$order->createOrderStatusHistory()->add(OrderStatusType::Completed);
var_dump($order->serialize());
