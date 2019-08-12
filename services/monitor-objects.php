<?php
namespace ascio\lib;

use ascio\v2\Order;
use ascio\v2\Domain;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

Consumer::object(function($payload) {
    $obj = $payload->object;
    if($obj instanceOf Order) {
        $objStr = ". OrderId: ".$obj->getOrderId();
    } elseif($obj instanceof Domain) {
        $objStr = ". Domain: ".$obj->getDomainName();
        if(!$obj->getDomainName()) {
            throw new \Exception("die: ".json_encode($payload));
        }
    } else $objStr = "";
    echo "consume ".$payload->action." object: ".get_class($obj)." ObjectId: ".$obj->db()->_id.$objStr."\n";
});