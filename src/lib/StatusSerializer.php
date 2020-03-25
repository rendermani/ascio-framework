<?php
namespace ascio\lib;

use ascio\base\BaseClass;
use DateTime;

class StatusSerializer {
    protected $fields=[];
    protected $class;
    protected $container;
    protected $script;
    protected $obj;
    public function __construct(?BaseClass $obj=null)
    {
        global $_SERVER; 
        $this->setClass($obj);
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
    public function console($logLevel, $text, $long = false) : string
    {
        $keyValues = ["partner" => Ascio::getConfig()->getPartner("v2")];
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
        $data = $data ?  " - ".$data : "";
        $text = $text ?  " - ".$text : "";

        $out = $this->getDate().$this->class." - ".$logLevel.$text.$data."\n";
        return $out;         
    }
    public function getDate()
    {
        return (new DateTime())->format('Y-m-d H:i:s.u');
    }

    /**
     * Get the value of class
     */ 
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set the value of class
     *
     * @return  self
     */ 
    public function setClass($class=null)
    {
        if(is_object($class)) {
            $class = " [".get_class($class)."]";
        } elseif (is_string($class)) {
            $class = " [".$class."]";
        } 
        $this->class = $class;
        return $this;
    }

    /**
     * Get the value of container
     */ 
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Set the value of container
     *
     * @return  self
     */ 
    public function setContainer($container)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * Get the value of script
     */ 
    public function getScript()
    {
        return $this->script;
    }

    /**
     * Set the value of script
     *
     * @return  self
     */ 
    public function setScript($script)
    {
        $this->script = $script;

        return $this;
    }

    /**
     * Get the value of obj
     */ 
    public function getObj()
    {
        return $this->obj;
    }

    /**
     * Set the value of obj
     *
     * @return  self
     */ 
    public function setObj($obj)
    {
        $this->obj = $obj;

        return $this;
    }
}