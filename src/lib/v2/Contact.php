<?php

// XSLT-WSDL-Client. Generated DB-Model class of Contact. Can be copied and overwriten with own functions.

namespace ascio\v2;
use ascio\db\v2\ContactDb;
use ascio\api\v2\ContactApi;
use ascio\lib\SubmitOptions;
use ascio\lib\ValidationException;

class Contact extends \ascio\service\v2\Contact {

    public function update(SubmitOptions $options) {

    }
    function validateCountryCode($objectName) {
        if(!preg_match("/[A-Z]{2}/",$this->getCountryCode())) {
            $error = new ValidationException("Invalid country code: ".$this->getCountryCode(),412);
            if($this->parent()) {
                $error->setOrder($this->parent()->parent());
            }
            $error->setObjectName($objectName);
            throw($error);
        }
        return true;
    }
    public function validate($objectName = null) {
        $this->validateCountryCode($objectName);
    }
}