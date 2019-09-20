<?php
namespace ascio\lib;

use ascio\v2\Order;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$order = new Order();
$order->createDomain()->setDomainName("testsignal.de");

$order->setWorkflowStatus(OrderStatus::Submitting); 
Producer::callback($order,[
    "OrderStatus"=> OrderStatus::Submitting,
    "DomainName"=> "testsignal.de"
]); 
