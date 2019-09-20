<?php
namespace ascio\lib;

use ascio\v2\TestLib;
use SoapFault;
use ascio\lib\SubmitOptions;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$domain = TestLib::getDomain("testme-".uniqid().".com");
try {
    $submitOptions = new SubmitOptions();
    $submitOptions->setQueue(false);
    $order = $domain->register($submitOptions);
    echo "Register: ". $domain->getDomainName()." Order: ".$order->getOrderId()." ".$order->db()->_id."\n";
    $order = $domain->expire($submitOptions);
    echo "Expire: ". $domain->getDomainName()." Order: ".$order->getOrderId()." ".$order->db()->_id."\n";
} catch (SoapFault $e) {
    echo "error!";
    echo $e->getMessage();
    echo ascio::getClientV2()->__getLastRequest();
} catch (AscioException $e) {
    echo $e->getMessage();
    var_dump($e->getResult()->getCreateOrderResult());
}
