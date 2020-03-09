<?php
namespace ascio\base;

use ascio\lib\StatusSerializer;
use ascio\lib\SubmitOptions;

// Todo: one interface for v2 and v3 orders. 
// common function: create, poll, queue, getMessages, properties, db, api, config, handle ...
interface OrderInterface {
    public function submit(?SubmitOptions $submitOptions=null) : self;
    public function queue(?SubmitOptions $submitOptions=null) : self;
    public function getOrderId();
    public function getStatus() : ?string;
    public function getType();
    public function shouldQueue() : bool;
    public static function mapWorflowStatus($status);
    public function setWorkflowStatus($status=null);
    public function getWorkflowStatus();
    public function getSubmitOptions();
    public function setSubmitOptions(SubmitOptions $submitOptions);
    public function getResult();
    public function validate();
    public function syncOld($orderId);
    public function syncApi() : self;
    public function getMessages();
    public function getStatusSerializer() : StatusSerializer;
    public function db($db=null);
}