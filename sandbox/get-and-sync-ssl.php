<?php
namespace ascio\lib;
use ascio\v3\SslCertificateOrderRequest;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$order = new SslCertificateOrderRequest();
$order->db()->_id = 1;
$order->db()->syncFromDb(); 
$result = $order->properties()->toArray();
