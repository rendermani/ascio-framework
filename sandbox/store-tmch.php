<?php
namespace ascio\lib;

use ascio\v3\OrderType;
use ascio\v3\MarkOrderRequest;
use ascio\v3\Trademark;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$order = new MarkOrderRequest();
$order->setType(OrderType::Register);

$mark = new Trademark();
$mark->setMarkName("MarkManuel");

$order->setMark($mark);

$order->db()->syncToDb();