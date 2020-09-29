<?php
namespace ascio\lib;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use ascio\v2\Order;
use phpDocumentor\Reflection\Types\Integer;
use ascio\base\BaseClass;
use ascio\base\DbBase;
use ascio\logic\Payload;
use ascio\logic\PayloadFactory;
use Exception;

class TopicConsumer {
    public static function consume ($topic,$group, \closure $function) {
        global $_ObjectConsumer;
        if(!$_ObjectConsumer[$topic]) $_ObjectConsumer[$topic] = new KafkaTopicConsumer($topic,0,$group);
        $_ObjectConsumer[$topic]->consume(function($payload) use ($function) {
            $function($payload);
        });
    }
}