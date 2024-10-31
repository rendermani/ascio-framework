<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfOrder. Can be copied and overwriten with own functions.

namespace ascio\v2;

use ascio\db\v2\OrderDb;
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
    public function getFailed() {
        $orderDb = new OrderDb();
        foreach ($orderDb->failed()->limit(100)->get() as $failed) {
            $order = new Order();
            $order->set($failed);
            $this->add($order);
        }
    }
}