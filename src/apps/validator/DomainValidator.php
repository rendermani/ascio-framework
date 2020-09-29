<?php
namespace ascio\validation;
use ascio\base\OrderInterface;
use ascio\v2\Order;
use ascio\validation\Validator;
use ascio\validation\ValidatorInterface;
require(__DIR__."/../../../vendor/autoload.php");


class DomainValidator extends Validator  implements ValidatorInterface  {

}

class OrderValidator {
    public function __construct(Order $order)
    {
        
    }
}

class RegistrantValidator extends ContactValidator {

}
class ContactValidator extends Validator {

}
