<?php
namespace ascio\lib;

use ascio\v2\ArrayOfOrder;
use ascio\v2\Domain;
use ascio\v2\Order;
use ascio\v2\OrderStatusType;
use Illuminate\Database\Eloquent\ModelNotFoundException;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$domains = file_get_contents(__DIR__."/../data/import/test-domains.txt");


function processDomain($domainName) {
    $domainName = trim($domainName);
    if($domainName=="") return;
    $domain = new Domain();
    $domain->setDomainName($domainName);
    $domain->api()->getByName();
    $domain->produce(["action"=>"create"]);

    $domain->getAutoRenew()->set(false);
    $wf = new Workflow($domain);
    $wf->getSubmitOptions()->setAutoUnlock(true);
    $wf->getSubmitOptions()->setQueue(true);
    $wf->addTasks($domain->getUpdateOrders());
    foreach($wf->getOrderRequests() as $order) {
        echo $order->getDomain()->getDomainName().": ".$order->getType()."\n";
    }
    $wf->submit();
}
function syncRunningOrders() {
    $order = new Order();
    $orders = $order->db()
        ->where("_status","Running")
        ->where("_account",Ascio::getConfig()->getPartner("v2"))
        ->get();
    
    foreach($orders as $orderResult) {
        $sync = new Sync();
        echo "getOrder: ".$orderResult->OrderId."\n";
        $order = $sync->getOrder($orderResult->OrderId);
        if($order->db()->_status == OrderStatusType::Completed || $order->getStatus() == OrderStatusType::Pending_End_User_Action) {
            Producer::callback($order,[
                "OrderId" => $orderResult->OrderId,
                "OrderStatus" => $order->getStatus(),
                "DomainName" => $order->getDomain()->getDomainName(),
                "Environment" =>  Ascio::getConfig()->getEnvironment(),
                "Account" => Ascio::getConfig()->get("v2")->account,
                "Module" => "update"
                ]
            );
        }
    } 
    return count($orders) > 0;
}
foreach(explode("\n",$domains) as $domainName) {
   //processDomain($domainName); 
}  
while (syncRunningOrders()){
    sleep(5);
}  