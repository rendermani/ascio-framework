<?php
namespace ascio\lib;

use ascio\logic\v3\CallbackPayload;
use ascio\v3\OrderInfo;
use ascio\v3\QueueMessage;
use ascio\v3\Sync;
use DateTime;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("cvkd148");

$queueMessage = new QueueMessage(); 
$queueMessage->setObjectType("DomainType");
$queueMessage->setOrderId("TEST598556");

$sync = new Sync();
$sync->getOrder(new CallbackPayload($queueMessage));



