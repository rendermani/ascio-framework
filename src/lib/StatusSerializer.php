<?php
namespace ascio\lib;

use ascio\base\BaseClass;
use DateTime;

class StatusSerializer {
    protected $fields;
    public function __construct(?BaseClass $obj=null)
    {
        global $_SERVER; 
        $this->class = $obj ? " [".get_class($obj)."]" : null;
        $this->container = gethostname();
        $this->script = basename($_SERVER["SCRIPT_FILENAME"], '.php');
        $this->obj = $obj;
    }
    public function setFields($fields) {
        $this->fields = $fields;
    }
    public function addFields($fields) {
        $this->fields = array_merge($fields,$this->fields);
    }
    public function console($logLevel, $text, $long = false)
    {
        $keyValues = [];
        foreach ($this->fields as $key => $value) {
            if($value) {
                $keyValues[] = $long ? $key .": ".$value : $value;
            } else {
                $keyValues[] = "No ".$key;
            }
        }
        $data = implode(", ",$keyValues);
        $out = $this->getDate().$this->class." - ".$logLevel." - ".$text." - " .$data."\n";
        return $out;         
    }
    public function getDate()
    {
        return (new DateTime())->format('Y-m-d H:i:s.u');
    }
}