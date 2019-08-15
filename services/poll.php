<?php
namespace ascio\lib;

use ascio\v3\PollQueueRequest;
use ascio\v3\MessageType;
use ascio\v2\MessageType as AscioMessageType;

require(__DIR__."/../vendor/autoload.php");

function poll() {
    //echo "[poll] Lookup new messages for ".Ascio::getConfig()->get("v2")->account."\n";
    $result = Ascio::getClientV2()->pollMessage(AscioMessageType::Message_to_Partner);
    $item = $result->getItem();    
    while($item) {
        $orderId = prefix().$item->getOrderId();
        $item->setOrderId($orderId);
        echo $item->getStatusSerializer()->console(LogLevel::Info,"Got poll item");
        Producer::callback($item,[
            "OrderId" => $orderId,
            "MessageId" => $item->getMsgId(),
            "OrderStatus" => $item->getOrderStatus(),
            "DomainName" => $item->getDomainName(),
            "Environment" =>  Ascio::getConfig()->getEnvironment(),
            "Config" =>  Ascio::getConfig()->getId(),
            "Account" => Ascio::getConfig()->get("v2")->account]
        );
        Ascio::getClientV2()->ackMessage($item->getMsgId());
        $result = Ascio::getClientV2()->pollMessage(AscioMessageType::Message_to_Partner);
        $item = $result->getItem();    
    }
   
}
Ascio::setConfig();
function prefix () {
    if(Ascio::getConfig()->getEnvironment()=="live") {
        return "A";
    } else {
        return "TEST";
    }
}

echo "[poll] Start service\n";

while(true) {
    try {
        poll($prefix);
    }
    catch (AscioException $e) {
        echo "[poll] Error: ".$e->getCode() ." - " . $e->getMessage() . "\n";
        sleep(50);
    }     
    sleep(10);
}


