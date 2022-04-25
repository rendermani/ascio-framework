<?php
namespace ascio\lib;

use ascio\logic\BlockPayload;
use ascio\logic\CallbackPayload;
use ascio\logic\Payload;
use ascio\v3\Sync;

require(__DIR__."/../vendor/autoload.php");

// @TODO: only sync domain when completed and failed. 

Consumer::callback(function(Payload $payload) {        
    if($payload instanceof BlockPayload) {
        DomainBlocker::block($payload->getObjectName());
        return;
    }
    
    Ascio::setConfig($payload->getConfig()); 
    if(
        $payload->getWorkflowStatus() == OrderStatus::Queued ||
        $payload->getWorkflowStatus() == OrderStatus::Submitting 
    ) {
        return; 
    }
    sleep(1);
    try {
        $sync = new Sync(); 
        $sync->getOrder($payload);
    } catch (AscioException $e) {
        echo $e->getMessage();
        throw $e;
    }
});