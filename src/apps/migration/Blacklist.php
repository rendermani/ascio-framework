<?php
namespace ascio\migration;

use ascio\v2\Order;
use Exception;
use softgarden\migration\DataCleaner;

class Blacklist extends DataRestrictions {
    protected $required = [];

    public function isUsed($name) : bool {
        if($this->hasTlds() && $this->inTldList($name)) {
            return false; 
        }
        foreach($this->required as $file) {
            /**
             * @var File $file
             */
            if($file->exists($name)) {
                return false;
            }            
        }
        return  true; 
    }
}




