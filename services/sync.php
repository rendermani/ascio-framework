<?php
namespace ascio\lib;
require(__DIR__."/../vendor/autoload.php");

$sync = new Sync();
Consumer::callback(function($payload) use ($sync) {       
    Ascio::setConfig($payload->Config); 
    if(
        $payload->OrderStatus == OrderStatus::Queued ||
        $payload->OrderStatus == OrderStatus::Submitting 
    ) {
        return; 
    }
    //$messageId = $payload->object->MsgId; 
    sleep(1);
    try {
        $sync->getOrder($payload->OrderId);
    } catch (AscioException $e) {
        echo $e->debug();
        throw $e;
    }
});