<?php
namespace ascio\lib;

class TopicConsumer {
    public static function consume ($topic,$group, \closure $function) {
        global $_ObjectConsumer;
        if(!$_ObjectConsumer[$topic]) $_ObjectConsumer[$topic] = new KafkaTopicConsumer($topic,0,$group);
        $_ObjectConsumer[$topic]->consume(function($payload) use ($function) {
            $function($payload);
        });
    }
}