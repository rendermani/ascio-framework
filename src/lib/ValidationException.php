<?php
namespace ascio\lib;

use ascio\base\OrderInterface;

class ValidationException extends \Exception{
    protected $errors = [];
    protected $objectName; 
    protected $order;
    public function __toString()
    {
        $msg = $this->getObjectName() . "\n";
        $msg .= $this->getMessage() . "\n";
        if(count($this->errors) > 0) {
            $msg .= implode("\n",$this->errors);
        }
        return $msg;
    }
    public function toCSV()
    {
        $msg = $this->getObjectName() . ";";
        $msg .= $this->getMessage() . ";";
        if(count($this->errors) > 0) {
            $msg .= implode(", ",$this->errors);
        }
        return $msg."\n";
    }
    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set the value of errors
     *
     * @return  self
     */ 
    public function setErrors($errors)
    {
        $this->errors = $errors;

        return $this;
    }
    public function addError($error) : self {
        $this->errors[] = $error;
        return $this;
    }

    /**
     * Get the value of objectName
     */ 
    public function getObjectName()
    {
        return $this->objectName;
    }

    /**
     * Set the value of objectName
     *
     * @return  self
     */ 
    public function setObjectName($objectName)
    {
        $this->objectName = $objectName;

        return $this;
    }

    /**
     * Get the value of order
     */ 
    public function getOrder() : ?OrderInterface
    {
        return $this->order;
    }

    /**
     * Set the value of order
     *
     * @return  self
     */ 
    public function setOrder(?OrderInterface $order)
    {
        $this->order = $order;

        return $this;
    }
}

