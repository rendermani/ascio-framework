<?php
namespace ascio\lib;

class Logger {
    protected $serializer;
    public function __construct()
    {
        $this->serializer = new StatusSerializer();
    }
    public function console() {
        
    }
    public function db() {

    }
    public function file() {

    }
    public function kafka() {

    }
    public function setView() {}
    public function getView() {}
    public function setSerializer(StatusSerializer $serializer) {
        $this->serializer = $serializer;
    }
    public function getSerializer() : StatusSerializer {
        return $this->serializer;
    }

}