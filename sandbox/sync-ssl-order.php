<?php
namespace ascio\lib;

use ascio\v2\SearchOrderRequest;
use ascio\v2\SearchOrderSortType;
use ascio\v2\PagingInfo;
use ascio\v3\GetOrderRequest;
use SoapFault;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();


//$result = Ascio::getClientV2()->getOrder("TEST450550");
//var_dump($result->getOrder()->properties()->toArray());
//$domain = Ascio::getClientV2()->GetDomain($result->getOrder()->getDomain()->getDomainHandle());
$getOrderRequest = new GetOrderRequest();
$getOrderRequest->setOrderId("TEST553429");
try {
    $v3Order = Ascio::getClientV3()->getOrder($getOrderRequest);
} catch (AscioOrderExceptionV3 $e)  {
    echo $e->debugSoap();
} catch (SoapFault $e) {
    echo $e->getMessage()."\n";
    echo Ascio::getClientV3()->__getLastRequest();
    echo Ascio::getClientV3()->__getLastResponse();
    die();
}
echo Ascio::getClientV3()->__getLastResponse();
var_dump($v3Order->init()->getOrderInfo()->properties()->toArray());