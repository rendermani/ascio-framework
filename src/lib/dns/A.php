<?php

// XSLT-WSDL-Client. Generated DB-Model class of A. Can be copied and overwriten with own functions.

namespace ascio\dns;

class A extends \ascio\service\dns\A {
    public function clean() : bool  {
        if(strpos($this->getSource(), "*") !== false) {
            $this->setSource($this->getSource().".".$this->parent()->getZoneName());                
            return true; 
        }
        return false;

    }
}