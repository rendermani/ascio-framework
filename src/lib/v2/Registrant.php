<?php

// XSLT-WSDL-Client. Generated DB-Model class of Registrant. Can be copied and overwriten with own functions.

namespace ascio\v2;
use ascio\db\v2\RegistrantDb;
use ascio\api\v2\RegistrantApi;
use ascio\lib\ValidationException;

class Registrant extends \ascio\service\v2\Registrant {
    function validateCountryCode($objectName=null) {
        if(!preg_match("/[A-Z]{2}/",$this->getCountryCode())) {
            $error = new ValidationException("Invalid country code: ".$this->getCountryCode(),412);
            $error->setObjectName($objectName);
            if($this->parent()) {
                $error->setOrder($this->parent()->parent());
            }
            throw($error);
        }
        return true;
    }
    public function validate($objectName = null) {
        $this->validateCountryCode($objectName);
    }
}