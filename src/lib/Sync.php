<?php
namespace ascio\lib;

use ascio\base\OrderInfoInterface;
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
use SoapFault;

class Sync {
    public function getDbData($orderId) {
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
    public function getOrder(string $orderId) : ?OrderInfoInterface {
        try {
            $order = $this->getDbData($this->autoPrefix($orderId));            
            $order->api()->get($orderId);   
            $order->setWorkflowStatus();
            $action = ["action" => "update"];
            $order->produce($action);
            $this->log($order,$action["action"]);
            $this->getApiObject($order);
            $this->syncMessages($order->getOrderId());
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
                $this->syncMessages($order->getOrderId());
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
    public function syncOrders(SearchOrderRequest $searchOrderRequest = null,$index = 1) {
        $pagesize = 100;
        $searchOrderRequest = $searchOrderRequest ?: new SearchOrderRequest();
        $searchOrderRequest->setOrderSort(SearchOrderSortType::CreDateDesc);
        $searchOrderRequest->setIncludeDomainDetails(false);
        $page = new PagingInfo();
        $page->setPageSize($pagesize);
        $page->setPageIndex($index);
        $searchOrderRequest->setPageInfo($page);
        try {
            $result = Ascio::getClientV2()->searchOrder($searchOrderRequest);
        } catch (SoapFault $e) {
            $this->error("SoapFault",["message" => $e->getMessage(), "code" =>$e->getCode(),"index" => $index]);
            echo Ascio::getClientV2()->__getLastRequest();
            sleep(5);
            return $this->syncOrders($searchOrderRequest,$index); 
        }
        $nr = 0; 
        if($result->getSearchOrderResult()->getResultCode()==554) {
            $this->error("SoapFault",["message" => $result->getSearchOrderResult()->getMessage(), "code" =>$result->getSearchOrderResult()->getResultCode(),"index" => $index]);
            sleep(5);            
            return $this->syncOrders($searchOrderRequest,$index);
        }
        if($result->getOrders() == null) {
            var_dump($result->toJson());
        }
        //var_dump($result->getOrders()->properties()->toArray());
        while($result->getOrders()->valid()) {    
            foreach ($result->getOrders() as $order) {
                echo $nr++." | ".$index." : ".$order->getOrderId()."\n";
                $this->getOrder($order->getOrderId());
            }
            $index = $index + 1; 
            $page->setPageIndex($index);
            try {
                $result = Ascio::getClientV2()->searchOrder($searchOrderRequest);
            } catch (SoapFault $e) {
                $this->error("SoapFault",["message" => $e->getMessage(), "code" =>$e->getCode(),"index" => $index]);
                echo Ascio::getClientV2()->__getLastRequest();
                sleep(5);
                return $this->syncOrders($searchOrderRequest,$index);
            }
        } 
    }
    public function error($text, $fields) {
        $s = new StatusSerializer();
        $s->addFields($fields);
        echo $s->console(LogLevel::Error,"Sync failed: ".$text,true);

    }
    public function syncMessages(string $orderId) {
        try {
            $messages  = Ascio::getClientV2()->getMessages($orderId);
            if($messages->getMessages()) foreach($messages->getMessages() as $message) {
                $message->db()->_orderId = $orderId; 
                $message->produce();
            }
        } catch (SoapFault $e){
            echo "Error in $orderId\n";
            echo Ascio::getClientV2()->__getLastResponse();
        }
    }
    function syncRunningOrders() {
        $order = new Order();
        $orders = $order->db()
            ->where("_status","Running")
            ->where("_account",Ascio::getConfig()->getPartner("v2"))
            ->get();
        
        foreach($orders as $orderResult) {
            $sync = new Sync();
            echo "getOrder: ".$orderResult->OrderId."\n";
            $order = $sync->getOrder($orderResult->OrderId);
            if($order->db()->_status == OrderStatusType::Completed || $order->getStatus() == OrderStatusType::Pending_End_User_Action) {
                $params = [
                    "OrderId" => $orderResult->OrderId,
                    "OrderStatus" => $order->getStatus(),
                    "Environment" =>  Ascio::getConfig()->getEnvironment(),
                    "Account" => Ascio::getConfig()->get("v2")->account,
                    "Module" => "update"
                ];
                if($order instanceof Order) {
                    $params["ObjectName"] = $order->getDomain()->getDomainName();
                }
                Producer::callback($order,$params);
            }
        } 
        return count($orders) > 0;
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
    private function log($obj,$action,$fields = []) {
        echo $obj->getStatusSerializer()->addFields($fields)->console(LogLevel::Info,Str::ucfirst($action));
    }
}

