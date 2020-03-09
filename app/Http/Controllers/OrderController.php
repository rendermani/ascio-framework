<?php

namespace App\Http\Controllers;


use ascio\db\v2\OrderDb;
use ascio\service\v2\OrderStatusType;
use ascio\v2\Order;

class OrderController extends Controller
{
    public function orders() {
        $orderDb = new OrderDb();
        switch (request("status")) {
            case "failed" : $orders = $orderDb->failed(); break;
            case "waiting" : $orders = $orderDb->waiting(); break;
            case "pending" : $orders = $orderDb->pending(); break;
            case "completed" : $orders = $orderDb->completed(); break;
            default: $orders = $orderDb; break;  
        }
        $orders = $orders->orderBy("CreDate","desc")->paginate(20)->appends("status",request("status"));
        foreach($orders as $orderData) {
            $order = new Order();
            $order->set($orderData);
            $orderData->Domain = $order->getDomain()->getDomainName();
            if($order->getStatus() !== OrderStatusType::Completed) {
                $orderData->Message = 
                $order->db()->_values 
                ? json_decode($order->db()->_values)
                : ($order->getLastQueueItem() ?[$order->getLastQueueItem()] : []) ;
                // use order-messages as alternative
                if(!$orderData->Message) {
                    $message = $order->getLastMessage();
                    $body = $message ? $message->getBody() : null;
                    if($body) {
                        $body = explode("\n",$body);
                        $orderData->Message = $body;
                    }
                }
            } else {
                $orderData->Message = [];
            }
            $lines = [];
            foreach($orderData->Message as $line) {
                if($line && trim($line) !== "") {
                    $lines[] = $line;
                }
            }
            $orderData->Message = $lines;

        }
        return view('orders')->with('orders', $orders);
    }
}
