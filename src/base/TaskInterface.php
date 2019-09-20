<?php
namespace ascio\base;

use ascio\lib\StatusSerializer;
use ascio\lib\SubmitOptions;

// Todo: one interface for v2 and v3 orders. 
// common function: create, poll, queue, getMessages, properties, db, api, config, handle ...
interface TaskInterface {
    public function submit(?SubmitOptions $submitOptions=null);
    public function queue(?SubmitOptions $submitOptions=null);
    public function getStatus() : ?string;
    public function getType() : ?string;
    public function shouldQueue() : bool;
    public static function mapWorflowStatus($status);
    public function setWorkflowStatus($status=null);
    public function getWorkflowStatus();
    public function getSubmitOptions();
    public function setSubmitOptions(SubmitOptions $submitOptions);
}