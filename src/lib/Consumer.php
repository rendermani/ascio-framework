<?php
namespace ascio\lib;

class  Consumer {
    public static function object (\closure $function) {
        TopicConsumer::consume("object.full","object",$function);
    }
    public static function objectIncremental (\closure $function) {
        TopicConsumer::consume("object.incremental","object",$function);
    }
    public static function callback (\closure $function) {
        TopicConsumer::consume("callback","callback",$function);
    }
    public static function log (\closure $function) {
        TopicConsumer::consume("log","log", $function);
    }   
}