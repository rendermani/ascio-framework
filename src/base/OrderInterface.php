<?php
namespace ascio\base;

use ascio\lib\Handle;
use ascio\lib\StatusSerializer;
use ascio\lib\SubmitOptions;
use ascio\lib\Task;

// Todo: one interface for v2 and v3 orders. 
// common function: create, poll, queue, getMessages, properties, db, api, config, handle ...
interface OrderInterface {
    public function submit(?SubmitOptions $submitOptions=null) : ?OrderInfoInterface;
    public function queue(?SubmitOptions $submitOptions=null) : self;
    public function getType();
    public function shouldQueue() : bool;
    public static function mapWorkflowStatus($status);
    public function setWorkflowStatus($status=null);
    public function getWorkflowStatus();
    public function getSubmitOptions();
    public function setSubmitOptions(SubmitOptions $submitOptions);
    public function validate();
    public function getStatusSerializer() : StatusSerializer;
    public function db($db=null);
    public function getObjectName() : ?string;
    public function getObjectKey() : string;
    public function handle() : Handle;
    public function log($level,$text);
    public function api($api=null);
    public function getStatus();

}