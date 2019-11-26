<?php
namespace ascio\lib;
use ascio\v2\TestLib;
use SoapFault;

require(__DIR__."/../vendor/autoload.php");
// an alternative can be set here
Ascio::setConfig();
// get Test-Domain
$domain = TestLib::getDomain("testme-".uniqid().".com");
try {
    // register the domain
    $order = $domain->register();
    echo "Register: ". $domain->getDomainName()." Order: ".$order->getOrderId()." ".$order->db()->_id."\n";
    // change domain data
    $domain->getAdminContact()->setFirstName("Manuel");
    $domain->getRegistrant()->setAddress1("new adr. 123");
    $domain->getNameServers()->createNameServer3()->setHostName("ns3.ascio.net");
    // 3 orders are created: Registrant_Details_Update, Contact_Update and Nameserver_Update
    $domain->update();
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

