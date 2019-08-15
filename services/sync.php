<?php
namespace ascio\lib;
require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$sync = new Sync();
Consumer::callback(function($payload) use ($sync) {        
    if(
        $payload->OrderStatus == OrderStatus::Queued ||
        $payload->OrderStatus == OrderStatus::Submitting 
    ) {
        return; 
    }
    //$messageId = $payload->object->MsgId; 
    sleep(1);
    $sync->getOrder($payload->OrderId);
});