<?php
namespace ascio\lib;

use ascio\v2\Order;
use ascio\v2\OrderStatusType;
use ascio\v2\OrderType;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$order = new Order();
$order->setType(OrderType::Register_Domain);
$order->setStatus(OrderStatusType::Completed);
$order->setWorkflowStatus(OrderStatus::Processing);
$order->createDomain()->setDomainName("testme.com");
echo $order->getStatusSerializer()->console(LogLevel::Info,"Processing");