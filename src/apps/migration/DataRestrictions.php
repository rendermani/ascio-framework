<?php
namespace ascio\migration;

use ascio\v2\Order;
use Exception;
use softgarden\migration\DataCleaner;

abstract class DataRestrictions {
    protected $required = [];
    protected $tlds = [];

    public function add(File $file):self {
        $this->required[] = $file;
        return $this;
    }
    public function isUsed($name) : bool {
        return true; 
    }
    public function isIgnored($name) : bool {
        return !$this->isUsed($name);
    }
    public function addTlds($tlds) {
        $this->tlds = is_array($tlds) ? $tlds : [$tlds];
    }
    public function inTldList($name) {
        $nameArray = explode($name,".");
        $tld =  strtolower(implode(".",array_slice(explode(".",$name),1)));
        if(in_array($tld,$this->tlds)) {
            return true;
        }
        return false;  
    }
    public function hasTlds() {
        return count($this->tlds) > 0;
    }
}




