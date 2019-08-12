<?php
namespace ascio\lib;

use ascio\v2\SearchOrderRequest;
use ascio\v2\SearchOrderSortType;
use ascio\v2\PagingInfo;
use ascio\v2\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;

require(__DIR__."/../vendor/autoload.php");


Ascio::setConfig();

$order = new Order();
$order->db()->getByOrderId("TEST244127");
var_dump($order->db()->getDomain());
var_dump($order);