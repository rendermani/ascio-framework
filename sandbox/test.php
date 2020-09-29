<?php

use ascio\lib\Ascio;
use ascio\v2\Order;

require_once(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();


$order = new Order();
$order->getById("ascio.object.5f7236bb7c1e79.06187896");

