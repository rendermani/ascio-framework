<?php
namespace ascio\lib;

use ascio\v2\TestLib;
use SoapFault;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("webrender2");
$domain = TestLib::getDomain("testme-".uniqid().".com");

try {  
    $order = $domain->register();
    echo "Register: ". $domain->getDomainName()." Order: ".$order->getOrderId()." ".$order->db()->_id."\n";
} catch (SoapFault $®e) {
    echo $e->getMessage()."\n\n";
    echo ascio::getClientV2()->__getLastRequest();
}

