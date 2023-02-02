<?php
namespace ascio\lib;
use ascio\logic\Payload;

 class TopicProducer {
    public static function send($topic, Payload $payload,$partition=0) {
        global $_GlobalProducer;
        if(!$_GlobalProducer) $_GlobalProducer = [];
        if(!array_key_exists($topic, $_GlobalProducer)) $_GlobalProducer[$topic] = new KafkaTopicProducer($topic);
        $_GlobalProducer[$topic]->send($payload,$partition);
    }
    public static function produce($topic,$obj) {
        global $_GlobalProducer;
        if(!$_GlobalProducer) $_GlobalProducer = [];
        if(!array_key_exists($topic,$_GlobalProducer)) $_GlobalProducer[$topic] = new KafkaTopicProducer($topic);
        $_GlobalProducer[$topic]->produce($obj);
    }
    public static function produceIncremental($topic,$obj,$parameters=null) {
        global $_GlobalProducer;        
        if(!$_GlobalProducer) $_GlobalProducer = [];
        if(!array_key_exists($topic,$_GlobalProducer)) $_GlobalProducer[$topic] = new KafkaTopicProducer($topic);       
        $_GlobalProducer[$topic]->produceIncremental($obj);
    }
}
