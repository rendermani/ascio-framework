<?php
namespace ascio\lib;
use ascio\v2\MessageType as AscioMessageType;
use ascio\v3\AckQueueMessageRequest;
use ascio\v3\MessageType;
use ascio\v3\PollQueueRequest;
use SoapFault;

require(__DIR__."/../vendor/autoload.php");


function poll() {
    //echo "[poll] Lookup new messages for ".Ascio::getConfig()->get("v2")->account."\n";
    $queueRequest = new PollQueueRequest();
    $queueRequest->setMessageType(MessageType::MessageToPartner);
    $item = Ascio::getClientV3()->pollQueue($queueRequest)->getMessage();
    if($item) {
        echo "\n";
    }
    while($item) {
        $orderId = $item->getOrderId();
        $item->setOrderId($orderId);
        $params = [
            "OrderId" => $orderId,
            "MessageId" => $item->getId(),
            "OrderStatus" => $item->getOrderStatus(),
            "ObjectName" => $item->getObjectName(),
            "ObjectHandle" => $item->getObjectHandle(),
            "ObjectType" => $item->getObjectType(),
            "Environment" =>  Ascio::getConfig()->getEnvironment(),
            "Account" => Ascio::getConfig()->get("v3")->account,
            "Module" => "poll"
        ];
        echo $item->getStatusSerializer()->addFields($params)->console(LogLevel::Info,"Got poll item");
        Producer::callback($item, $params);
        $item->produce();
        $request = new AckQueueMessageRequest();
        $request->setMessageId($item->getId());
        Ascio::getClientV3()->ackQueueMessage($request);
        $item = Ascio::getClientV3()->pollQueue($queueRequest)->getMessage();

    }
   
}
echo "[poll] Start service\n";
$logger = new Logger("poll");
$statusSerializer = $logger->getSerializer();
$statusSerializer->setClass("poll.php");
while(true) {
    try {
        poll();
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


