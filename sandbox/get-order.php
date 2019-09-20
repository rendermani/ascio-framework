<?php
namespace ascio\lib;
use ascio\v2\Order;

require(__DIR__."/../vendor/autoload.php");


Ascio::setConfig();

$order = new Order();
$order->api()->get("TEST571721");
var_dump($order->getOrderId());