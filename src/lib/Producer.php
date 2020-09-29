<?php
namespace ascio\lib;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use ascio\v2\Order;
use phpDocumentor\Reflection\Types\Integer;
use ascio\base\BaseClass;
use ascio\base\DbBase;
use ascio\logic\CallbackPayload;
use ascio\logic\OrderPayload;
use ascio\logic\Payload;
use ascio\logic\SyncPayload;
use OrderInterface;

Class Producer {
    public static function object (SyncPayload $payload) {
        TopicProducer::produce("object.full",$payload);
        TopicProducer::produceIncremental("object.incremental",$payload);
    }
    public static function callback (CallbackPayload $payload,$parameters=null) {
        TopicProducer::produce("callback",$payload,$parameters);
    }
    public static function log ($payload,$parameters=null) {
        TopicProducer::produce("log",$payload,$parameters);
    }
    public static function order (OrderPayload $orderPayload,$partition=0) {
        TopicProducer::send("order",$orderPayload,$partition);
    }
    public static function sync (SyncPayload $syncPayload,$partition=0) {
        TopicProducer::send("sync",$syncPayload,$partition);
    }
}