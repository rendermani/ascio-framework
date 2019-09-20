<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfOrder. Can be copied and overwriten with own functions.

namespace ascio\v2;

use ascio\lib\SubmitOptions;

class ArrayOfOrder extends \ascio\service\v2\ArrayOfOrder {
    public function submit(SubmitOptions $submitOptions=null) : void {
        foreach($this as $order) {
            $order->submit($submitOptions);
        }
    }
    public function queue(SubmitOptions $submitOptions=null) {
        $submitOptions = $submitOptions ?: new SubmitOptions();
        $submitOptions->setQueue(true);
        $this->submit($submitOptions);
    }
    public function validate() {
        
    }
}