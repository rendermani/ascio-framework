<?php
namespace ascio\lib;
use ascio\v2\MessageType as AscioMessageType;
use SoapFault;

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
            "Account" => Ascio::getConfig()->get("v2")->account,
            "Module" => "poll"
            ]
        );
        Ascio::getClientV2()->ackMessage($item->getMsgId());
        $result = Ascio::getClientV2()->pollMessage(AscioMessageType::Message_to_Partner);
        $item = $result->getItem();    
    }
   
}
function prefix () {
    if(Ascio::getConfig()->getEnvironment()=="live") {
        return "";
    } else {
        return "TEST";
    }
}

echo "[poll] Start service\n";
$logger = new Logger("poll");
$statusSerializer = $logger->getSerializer();
$statusSerializer->setClass("poll.php");
while(true) {
    try {
        poll($prefix);
    }
    catch (AscioException $e) {
        $logger->console(LogLevel::Error,$e->getCode() ." - " .$e->getMessage());;
        $logger->file(LogLevel::Error,$e->getCode() ." - " .$e->getMessage());;
        sleep(10);
    }    
    catch (SoapFault $e) {
        $logger->console(LogLevel::Error,$e->getCode() ." - " .$e->getMessage());;
        $logger->file(LogLevel::Error,$e->getCode() ." - " .$e->getMessage());;
        sleep(10);
    }     
    sleep(10+rand(0,3));
}


