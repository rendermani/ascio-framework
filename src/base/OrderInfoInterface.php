<?php
namespace ascio\base;

use ascio\lib\StatusSerializer;
use ascio\lib\SubmitOptions;

// Todo: one interface for v2 and v3 orders. 
// common function: create, poll, queue, getMessages, properties, db, api, config, handle ...
interface OrderInfoInterface {
    public function getOrderId();
    public function getStatus() : ?string;
    public static function mapWorkflowStatus($status);
    public function setWorkflowStatus($status=null);
    public function getWorkflowStatus();
    public function getResult();
    public function syncOld($orderId);
    public function syncApi() : self;
    public function getMessages();
    public function getStatusSerializer() : StatusSerializer;
    public function db($db=null);
    public function api($api=null);
    public function getObjectName() : ?string;
    public function getObjectKey() : string;
}