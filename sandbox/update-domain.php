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
    $domain->getAdminContact()->setFirstName("Manuel");
    $domain->getRegistrant()->setAddress1("new adr. 123");
    $domain->getNameServers()->createNameServer3()->setHostName("ns3.ascio.net");
    $domain->update();
} catch (SoapFault $e) {
    echo "error!";
    echo $e->getMessage();
    echo ascio::getClientV2()->__getLastRequest();
} catch (AscioException $e) {
    echo $e->getMessage();
    var_dump($e->getResult()->getCreateOrderResult());
}

