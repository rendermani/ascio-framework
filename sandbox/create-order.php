<?php
namespace ascio\lib;

use ascio\v2\TestLib;
use SoapFault;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$domain = TestLib::getDomain("testme-".uniqid().".com");
try {
    $order = $domain->register();
    echo "Register: ". $domain->getDomainName()." Order: ".$order->getOrderId()." ".$order->db()->_id."\n";
} catch (SoapFault $e) {
    echo "error!";
    echo $e->getMessage();
    echo ascio::getClientV2()->__getLastRequest();
}

