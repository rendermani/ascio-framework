<?php
namespace ascio\base;

use ascio\lib\StatusSerializer;
use ascio\lib\SubmitOptions;
use ascio\logic\CallbackPayload;

// Todo: one interface for v2 and v3 orders. 
// common function: create, poll, queue, getMessages, properties, db, api, config, handle ...
interface TaskInterface {
    public function submit(?SubmitOptions $submitOptions=null);
    public function queue(?SubmitOptions $submitOptions=null);
    public function getStatus() : ?string;
    public function getType() : ?string;
    public function shouldQueue() : bool;
    public function getObjectName();
    public function getObjectKey();
    public function getObjectId();
    public static function mapWorkflowStatus($status);
    public function setWorkflowStatus($status=null);
    public function getWorkflowStatus();
    public function getSubmitOptions();
    public function setSubmitOptions(SubmitOptions $submitOptions);
    public function getStatusSerializer() : StatusSerializer;
    public function linkToPrevious(TaskInterface $previousTask);
    public function db($db=null);
    public function log($loglevel, $text, $fields = []);
}