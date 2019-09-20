<?php
namespace ascio\lib;
require(__DIR__."/../vendor/autoload.php");

use ascio\v2\ArrayOfOrderStatusType;
use ascio\v2\ArrayOfOrderType;
use ascio\v2\Domain;
use ascio\v2\OrderStatusType;
use ascio\v2\OrderType;
use ascio\v2\PagingInfo;
use ascio\v2\SearchOrderRequest;

Ascio::setConfig("mlautenschlager");


$header = new \SoapHeader('http://www.ascio.com/2007/01','ImpersonationDetails', array('TransactionAccount'=>'webrender'), false);
$client = Ascio::getClientV2();
$client->__setSoapHeaders($header);

//@todo: refactor setOrderTypes. take arrays and convert. #regenerate-classes 
$orderRequest = new SearchOrderRequest();
$orderTypes = new ArrayOfOrderType();
$orderTypes->addOrderType(OrderType::Register_Domain);
$orderRequest->setOrderTypes($orderTypes);

$orderStatusTypes = new ArrayOfOrderStatusType();
$orderStatusTypes->addOrderStatusType(OrderStatusType::Completed);
$orderRequest->setOrderStatusTypes($orderStatusTypes);

$pageInfo = new PagingInfo();
$pageInfo->setPageIndex(1)->setPageSize(1);
$orderRequest->setPageInfo($pageInfo);
try {
    $result = $client->searchOrder($orderRequest);
    $handle = $result->getOrders()->index(0)->getDomain()->getDomainHandle();
    $domain = new Domain();
    $domain->setDomainHandle($handle);
    $domain->api()->get();
    $domain->db()->syncToDb();
    echo $domain->getDomainName(). "\n";
} catch (AscioException $e) {
    echo $e->getMessage()."\n";
    echo $e->debugSoap();
}