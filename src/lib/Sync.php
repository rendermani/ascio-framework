<?php
namespace ascio\lib;

use ascio\base\OrderInterface;
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
use ascio\v3\OrderStatusType as v3OrderStatusType;

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
    public function getOrder(string $orderId) : ?OrderInterface {
        try {
            $order = $this->getDbData($this->autoPrefix($orderId));            
            $order->api()->get($orderId);   
            $order->setWorkflowStatus();
            $action = ["action" => "update"];
            $order->produce($action);
            $this->log($order,$action["action"]);
            $this->getApiObject($order);
            return $order;
        } catch (ModelNotFoundException $e) {
            try {     
                $order = new \ascio\v3\OrderInfo();
                $order->api()->get($orderId); 
                $order->db()->createDbProperties();
                $order->setWorkflowStatus();
                $action = ["action" => "create"];
                $order->produce($action);
                $this->getV3Object($order);
                $this->log($order,$action["action"]);
                return $order;
            } catch(AscioException $e) {
                $order = new Order();
                $order->api()->get($orderId);
                $order->db()->createDbProperties();
                $order->setWorkflowStatus();
                $action = ["action" => "create"];
                $order->produce($action);
                $this->log($order,$action["action"]);
                $this->getDomain($order);
                return $order;
            }
        }
    }
    private function getV3Object(\ascio\v3\OrderInfo  $order) {
        if($order->getStatus()!== v3OrderStatusType::Completed) return null;
        $name = $order->getOrderRequest()->objects()->index(0);
        $method = "get".$name;
        $class = "\\ascio\\v3\\Get".$name."Request";
        $handle = $order->getOrderRequest()->$method()->getHandle();
        $request = new $class();
        $request->setHandle($handle);
        $object = Ascio::getClientV3()->$method($request)->init();
        $info = $object->{"Get".$name."Info"}();
        $action = "create";
        $this->log($object,$action);
        $info->produce(["action" => $action]);
        return $info;
    }    
    private function getDomain(Order $order) : ?Domain  {
        if($order->getStatus() !== OrderStatusType::Completed) return null;
        $domain = new Domain();
        if(!($order->getDomain() && $order->getDomain()->getDomainHandle())) {
            return null; 
        }
        $action = $domain->sync($order->getDomain()->getDomainHandle());
        $this->log($domain,$action);
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
        if($result->getSearchOrderResult()->getResultCode()==554) {
            echo "Error syncing. Retrying after 5 seconds/n";
            var_dump($result->getSearchOrderResult()->properties()->toArray());
            sleep(5);            
            $this->syncOrders();

        }
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
    /**
     * Fix for OrderIDs without prefix
     */
    function autoPrefix ($id) {
        if((int) $id == 0) {
            return $id;
        }
        if(Ascio::getConfig()->getEnvironment()=="live") {
            return "A".$id;
        } else {
            return "TEST".$id;
        }
    }
    private function log($obj,$action) {
        echo $obj->getStatusSerializer()->console(LogLevel::Info,Str::ucfirst($action));
    }
}

