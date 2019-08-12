<?php
namespace ascio\lib;

use ascio\v2\Order;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$order = new Order();
$order->db()->getByOrderId("TEST567465");

$newOrder = $order->db()->nextDomain();
var_dump($newOrder);