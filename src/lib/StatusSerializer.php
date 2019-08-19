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
    public function setFields($fields) : self {
        $this->fields = $fields;
        return $this;
    }
    public function addFields($fields) : self {
        $this->fields = array_merge($fields,$this->fields);
        return $this;
    }
    public function console($logLevel, $text, $long = false)
    {
        $keyValues = [];
        $spacer = $long ? "\n" : ", ";
        foreach ($this->fields as $key => $value) {
            if(is_object($value)) {
                $value = get_class($value);
            }
            if(is_array($value)) {
                $value = count($value);
            }
            if($value) {
                $keyValues[] = $long ? $key .": ".$value : $value;
            } else {
                $keyValues[] = "No ".$key;
            }
        }
        $data = implode($spacer,$keyValues);
        $out = $this->getDate().$this->class." - ".$logLevel." - ".$text." - " .$data."\n";
        return $out;         
    }
    public function getDate()
    {
        return (new DateTime())->format('Y-m-d H:i:s.u');
    }
}