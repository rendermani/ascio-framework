<?php
namespace ascio\lib;
use ascio\v2\SearchOrderRequest;
use ascio\v2\SearchOrderSortType;
use ascio\v2\PagingInfo;
use ascio\v2\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ascio\lib\Ascio;
use ascio\lib\AscioException;
use ascio\v2\Domain;
use Illuminate\Support\Str;
use ascio\v2\OrderStatusType;

class Sync {
    private function getDbData($orderId) {
        try {
            $orderV2 = new Order();
            $orderV2->db()->getByHandle($orderId); 
            return $orderV2;
        } catch (ModelNotFoundException $e) {
            $orderV3 = new \ascio\v3\OrderInfo();
            $orderV3->db()->getByHandle($orderId);    
            return $orderV3;
        }    
    }
    /**
     * @var \ascio\v2\Order|\ascio\v3\AbstractOrderRequest $order
     */
    private function getApiObject($order) {
        switch(get_class($order)) {
            case "ascio\\v2\\Order" : $this->getDomain($order);break;
            default: $this->getV3Object($order);break;
        }
    }
    public function getOrder(string $orderId) {
        try {
            $order = $this->getDbData($this->autoPrefix($orderId));            
            $order->api()->get($orderId);   
            $order->setWorkflowStatus();
            $order->produce(["action" => "update"]);
            echo  "[sync] Update ".get_class($order).": ".$orderId.": ". $order->db()->_id.": ".$order->getStatus()."\n";
            $this->getApiObject($order);
            return $order;
        } catch (ModelNotFoundException $e) {
            try {     
                $order = new \ascio\v3\OrderInfo();
                $order->api()->get($orderId); 
                $order->db()->createDbProperties();
                $order->setWorkflowStatus();
                $order->produce(["action" => "create"]);
                $this->getV3Object($order);
                echo  "[sync] Create ".get_class($order).": ".$orderId.": ". $order->db()->_id."\n";
                return $order;
            } catch(AscioException $e) {
                $order = new Order();
                $order->api()->get($orderId);
                $order->db()->createDbProperties();
                $order->setWorkflowStatus();
                $order->produce(["action" => "create"]);
                echo  "[sync] Create ".get_class($order).": ". $order->db()->_id."\n";
                $this->getDomain($order);
                return $order;
            }
        }
    }
    private function getV3Object(\ascio\v3\OrderInfo  $order) {
        $name = $order->getOrderRequest()->objects()->index(0);
        $method = "get".$name;
        $class = "\\ascio\\v3\\Get".$name."Request";
        $handle = $order->getOrderRequest()->$method()->getHandle();
        $request = new $class();
        $request->setHandle($handle);
        $object = Ascio::getClientV3()->$method($request)->init();
        $info = $object->{"Get".$name."Info"}();
        $action = "create";
        $info->produce(["action" => $action]);
        return $info;
    }    
    private function getDomain(Order $order) : ?Domain  {
        $domain = new Domain();
        if(!($order->getDomain() && $order->getDomain()->getDomainHandle())) {
            return null; 
        }
        $action = $domain->sync($order->getDomain()->getDomainHandle());
        echo  "[sync] ".Str::ucfirst($action). " Domain ".$domain->getDomainName().": ". $order->db()->_id."\n";
        if($action) {
            $domain->produce(["action" => $action]);
        }
        return $domain;         
    }
    public function getMessage($messageId) {
        $message = Ascio::getClientV2()->getMessageQueue($messageId);
        $item = $message->getItem(); 
        $item->init();
        $item->db()->createDbProperties();
        Producer::object($item);
    }
    public function syncOrders() {
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
                $this->getOrder($order->getOrderId());
            }
            $index = $index + $pagesize; 
            $page->setPageIndex($index);
            $result = Ascio::getClientV2()->searchOrder($searchOrderRequest);
        } 
    }
    function autoPrefix ($id) {
        if((int) $id ==0) {
            return $id;
        }
        if(Ascio::getConfig()->getEnvironment()=="live") {
            return "A".$id;
        } else {
            return "TEST".$id;
        }
    }
}

