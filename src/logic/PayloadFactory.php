<?php
namespace ascio\logic;

use Exception;

class PayloadFactory {
    public static function deserialize($serialized) : Payload {
        $class = $serialized->class; 
        if($class) {
            assert(class_exists($class) !== null, "Class ".$class." should exist");
            $payload = new $class();
            $payload->deserialize($serialized);
            return $payload;
        } else {
            $payload = new Payload($serialized);
            return $payload;
        }
    }

}