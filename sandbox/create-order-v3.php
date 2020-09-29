<?php
namespace ascio\lib;

use ascio\v3\TestLib;
use SoapFault;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();
$domain = TestLib::getDomain("testme-".uniqid().".com");

try {  
    //$domain->getRegistrant()->setPhone("1234");
    //$domain->getAdminContact()->setPhone("1234");
    //$domain->getTechContact()->setPhone("1234");
    $order = $domain->register();
    echo "Register: ". $domain->getName()." Order: ".$order->getOrderId()." ".$order->db()->_id."\n";
} catch (SoapFault $e) {
    echo $e->getMessage()."\n\n";
    echo ascio::getClientV3()->__getLastRequest();
}

