<?php
namespace ascio\lib;

class Logger {
    protected $serializer;
    public function __construct($id, $serializer = null)
    {
        $this->id = $id; 
        $this->serializer = $serializer ?: new StatusSerializer();
    }
    public function console($logLevel,$text,$long=false) {
        echo $this->getSerializer()->console($logLevel,$text,$long);
        return $this;
    }
    public function db() {

    }
    public function file($logLevel,$text,$long=false) {
        echo "FILE";
        $dir = realpath(__DIR__."/../../data/logs/");
        file_put_contents($dir."/".$this->id.".log", $this->getSerializer()->console($logLevel,$text,$long),FILE_APPEND);
        return $this;
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