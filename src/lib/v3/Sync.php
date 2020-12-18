<?php
namespace ascio\v3;

use ascio\base\OrderInfoInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ascio\lib\Ascio;
use ascio\lib\LogLevel;
use ascio\lib\StatusSerializer;
use ascio\logic\CallbackPayload;
use ascio\logic\Payload;
use ascio\logic\SyncPayload;
use Illuminate\Support\Str;
use SoapFault;

class Sync {
    public function getOrder(Payload $payload) : ?OrderInfoInterface {
        if(!($payload instanceof CallbackPayload)) {
            return null;
        }
        $orderId = $payload->getOrderId();        
        try {
            $orderInfo = $payload->getOrderInfo();
            $update = true;

        } catch (ModelNotFoundException $e) {
            $orderInfo = new OrderInfo();
            $orderInfo->setOrderId($payload->getOrderId());
            $orderInfo->db()->createDbProperties();
            $update = false; 
        }
        $orderInfo->api()->get();
        $orderInfo->setWorkflowStatus();
        $syncPayload = new SyncPayload($orderInfo);
        $syncPayload->setUpdate($update)->send();
        $this->getObject($orderInfo);
        $this->syncMessages($orderId);
        return $orderInfo;
    }
    private function getObject(\ascio\v3\OrderInfo  $order) {
        if($order->getStatus()!== OrderStatusType::Completed) return null;
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
    public function getMessage($messageId) {
        $request = new GetQueueMessageRequest();
        $request->setMessageId($messageId);
        $message = Ascio::getClientV3()->getQueueMessage($request);
        $item = $message->getMessage(); 
        $item->init();
        $item->db()->createDbProperties();
        $payload = new SyncPayload($item);
        $payload->setUpdate(false);
        $payload->send();
    }
    public function syncOrders(GetOrdersRequest $getOrdersRequest = null,$index = 1) {
        $pagesize = 100;
        $getOrdersRequest = $getOrdersRequest ?: new GetOrdersRequest();
        $getOrdersRequest->setOrderSort(SearchOrderSortType::CreatedAsc);
        $page = new PagingInfo();
        $page->setPageSize($pagesize);
        $page->setPageIndex($index);
        $getOrdersRequest->setPageInfo($page);
        try {
            $result = Ascio::getClientV3()->getOrders($getOrdersRequest);
        } catch (SoapFault $e) {
            $this->error("SoapFault",["message" => $e->getMessage(), "code" =>$e->getCode(),"index" => $index]);
            echo Ascio::getClientV3()->__getLastRequest();
            sleep(5);
            return $this->syncOrders($getOrdersRequest,$index); 
        }
        $nr = 0; 
        if($result->getResultCode()==554) {
            $this->error("SoapFault",["message" => $result->getResultMessage(), "code" =>$result->getResultCode(),"index" => $index]);
            sleep(5);            
            return $this->syncOrders($getOrdersRequest,$index);
        }
        if($result->getOrdersInfo() == null) {
            var_dump($result->toJson());
        }
        while($result->getOrdersInfo()->valid()) {    
            foreach ($result->getOrdersInfo() as $order) {
                echo $nr++." | ".$index." : ".$order->getOrderId()."\n";
                $this->getOrder($order->getOrderId());
            }
            $index = $index + 1; 
            $page->setPageIndex($index);
            try {
                $result = Ascio::getClientV3()->getOrders($getOrdersRequest);
            } catch (SoapFault $e) {
                $this->error("SoapFault",["message" => $e->getMessage(), "code" =>$e->getCode(),"index" => $index]);
                echo Ascio::getClientV3()->__getLastRequest();
                sleep(5);
                return $this->syncOrders($getOrdersRequest,$index);
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
            $request = new GetMessagesRequest();
            $request->setOrderId($orderId);
            $messages  = Ascio::getClientV3()->getMessages($request);
            if($messages->getMessages()) foreach($messages->getMessages() as $message) {
                $message->db()->_orderId = $orderId; 
                $message->produce();
            }
        } catch (SoapFault $e){
            echo "Error in $orderId\n";
            echo Ascio::getClientV3()->__getLastResponse();
        }
    }
    function syncRunningOrders() {
        $order = new AbstractOrderRequest();
        $orders = $order->db()
            ->where("_status","Running")
            ->where("_account",Ascio::getConfig()->getPartner("v3"))
            ->get();
        
        foreach($orders as $orderResult) {
            $sync = new Sync();
            echo "getOrder: ".$orderResult->OrderId."\n";
            $order = $sync->getOrder($orderResult->OrderId);
            if($order->db()->_status == OrderStatusType::Completed || $order->getStatus() == OrderStatusType::PendingEndUserAction) {
                $params = [
                    "OrderId" => $orderResult->OrderId,
                    "OrderStatus" => $order->getStatus(),
                    "Environment" =>  Ascio::getConfig()->getEnvironment(),
                    "Account" => Ascio::getConfig()->get("v3")->account,
                    "Module" => "update"
                ];
                if($order instanceof AbstractOrderRequest) {
                    $params["ObjectName"] = $order->getObjectName();
                }
                $queueMessage = new QueueMessage();
                $queueMessage
                    ->setOrderId($orderResult->OrderId)
                    ->setOrderStatus($order->getStatus())
                    ->setObjectName($order->getObjectName());
                $callbackPayload = new CallbackPayload($queueMessage);
                $callbackPayload->send();
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

