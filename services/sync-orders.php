<?php
namespace ascio\services;

use ascio\lib\Sync;
use ascio\lib\Ascio;
use ascio\v2\SearchOrderRequest;
use DateTime;
use SoapFault;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig($argv[1]);
$searchOrderRequest = new SearchOrderRequest();
//$types = new ArrayOfOrderStatusType();
//$types->add(OrderStatusType::Failed);
//$searchOrderRequest->setOrderStatusTypes($types);
// example 2019-01-01T00:00
if($argv[2]) {
    $searchOrderRequest->setFromDate(new DateTime($argv[2]));
}
try {
    $sync = new Sync();
    $sync->syncOrders($searchOrderRequest,1);
} catch (SoapFault $e) {
    echo $e->getMessage() ." (".$e->getCode().")";  
    echo Ascio::getClientV2()->__getLastRequest();
}



