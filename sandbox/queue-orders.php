<?php
namespace ascio\lib;
use ascio\v2\TestLib;
use ascio\lib\SubmitOptions;
use SoapFault;

require(__DIR__."/../vendor/autoload.php");
// an alternative can be set here
Ascio::setConfig();
// get Test-Domain
$domain = TestLib::getDomain("testme-".uniqid().".com");
try {
    $submitOptions = new SubmitOptions();
    // direct submit of no blocking orders
    $submitOptions->setQueue(false);
    $order = $domain->register($submitOptions);
    echo "Register: ". $domain->getDomainName()." Order: ".$order->getOrderId()." ".$order->db()->_id."\n";
    // as registers is running, the expire order will be auto-queued
    $order = $domain->expire($submitOptions);
    echo "Expire: ". $domain->getDomainName()." Order: ".$order->getOrderId()." ".$order->db()->_id."\n";
} catch (SoapFault $e) {
    echo "error!";
    echo $e->getMessage();
    // view SOAP-Request
    echo ascio::getClientV2()->__getLastRequest();
} catch (AscioException $e) {
    // view Ascio-Errors and the result
    echo $e->getMessage();
    var_dump($e->getResult()->getCreateOrderResult());
}
