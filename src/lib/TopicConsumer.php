<?php
namespace ascio\lib;

class TopicConsumer {
    public static function consume ($topic,$group, \closure $function) {        
        global $_ObjectConsumer;
        if(!$_ObjectConsumer) $_ObjectConsumer  = [];
        if(!array_key_exists("topic",$_ObjectConsumer)) $_ObjectConsumer[$topic] = new KafkaTopicConsumer($topic,0,$group);
        $_ObjectConsumer[$topic]->consume(function($payload) use ($function) {
            $function($payload);
        });
    }
}