<?php
namespace ascio\lib;

use ascio\v2\SearchOrderRequest;
use ascio\v2\SearchOrderSortType;
use ascio\v2\PagingInfo;
use ascio\v2\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;

require(__DIR__."/../vendor/autoload.php");

function getApiVersion($orderId) {
    try {
        $orderV2 = new Order();
        $orderV2->db()->getByOrderId($orderId);        
        getDomain($orderV2);
        return $orderV2;
    } catch (ModelNotFoundException $e) {
       
        $orderV3 = new \ascio\v3\OrderInfo();
        $orderV3->db()->getByOrderId($orderId);  
        getV3Object($orderV3);
        echo "v3 order db\n";        
        return $orderV3;
    }    
}
function getOrder($orderId) {
    try {
        $order = getApiVersion($orderId);
        $order->api()->get($orderId);        
        $order->db()->syncToDb();
    } catch (ModelNotFoundException $e) {
        try {            
            $order = new \ascio\v3\OrderInfo();
            $order->api()->get($orderId); 
            getV3Object($order);
            echo "v3 order\n";
        } catch(AscioException $e) {
            $order = new Order();
            $order->api()->get($orderId);
            getDomain($order);
        }
    }
    $order->db()->syncToDb();
}
function getV3Object(\ascio\v3\OrderInfo  $order) {
    $name = $order->getOrderRequest()->objects()->index(0);
    $method = "get".$name;
    $class = "\\ascio\\v3\\Get".$name."Request";
    $handle = $order->getOrderRequest()->$method()->getHandle();
    $request = new $class();
    $request->setHandle($handle);
    $object = Ascio::getClientV3()->$method($request)->init();
    $info = $object->{"Get".$name."Info"}();
    $info->db()->syncToDb();
    return $info;
}

function getDomain(Order $order) {
    if(!$order->getDomain()) return;
    $handle = $order->getDomain()->getDomainHandle();
    if(!$handle) return; 
    $result = Ascio::getClientV2()->getDomain($order->getDomain()->getDomainHandle());
    $domain = $result->getDomain()->init();
    $domain->db()->syncToDb();
    return $domain;     
}

Ascio::setConfig();

$pagesize = 5;
$searchOrderRequest = new SearchOrderRequest();
$searchOrderRequest->setOrderSort(SearchOrderSortType::CreDateAsc);
$searchOrderRequest->setIncludeDomainDetails(false);
$page = new PagingInfo();
$page->setPageSize($pagesize);
$index = 1;
$page->setPageIndex($index);
$searchOrderRequest->setPageInfo($page);
$result = Ascio::getClientV2()->searchOrder($searchOrderRequest);
$nr = 0; 
while($result->getOrders()->valid()) {    
    foreach ($result->getOrders() as $order) {
       echo $nr++.": ".$order->getOrderId()."\n";
       getOrder($order->getOrderId());
    }
    $index = $index + $pagesize; 
    $page->setPageIndex($index);
    $result = Ascio::getClientV2()->searchOrder($searchOrderRequest);
} 

//getOrder("TEST544501");
