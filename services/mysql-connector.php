<?php
namespace ascio\lib;

require(__DIR__."/../vendor/autoload.php");

Ascio::init();

use ascio\logic\Payload;
use ascio\logic\SyncPayload;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

Consumer::objectIncremental(function(SyncPayload $payload) {
    //if(!($payload instanceof SyncPayload)) return; 
    Ascio::setConfig($payload->getConfig());
    $obj = $payload->getObject();    
    try {        
        if($payload->isUpdate()) {
            try {
                $type = get_class($obj);
                $oldObject = new $type;
                $oldObject->getById($payload->getObject()->db()->getKey());
            } catch (ModelNotFoundException $e) {
                echo $obj->log(LogLevel::Error,Str::ucfirst($payload->action).", Not found: ".$payload->object->db()->getKey());  
                throw new Exception("Object with the _id ".$payload->object->db()->getKey(). " not found." );
            }
            $changes = $payload->getChanges();
            if($changes)  {
                $oldObject->setIncr($payload->getChanges());            
                $oldObject->db()->syncToDb();         
            }            

            $obj = $oldObject;
        } else {
            $obj->db()->syncToDb(); 
        }
        if($payload->action) {
            $action = ", ". Str::ucfirst($payload->action);
        } else {
            $action = "";
        }
        echo $obj->log(LogLevel::Info.$action.", ID:".$payload->object->db()->getKey());                
    } catch (Exception $e) {
        if(strpos($e->getMessage(),'Duplicate entry') === false) {
            echo $e->getMessage();
            echo $e->getTraceAsString();
           
        } else {
            echo "objectId: ".$payload->object->db()->getKey();
            echo $obj->log(LogLevel::Warn,Str::ucfirst($payload->action).": Duplicate entry.");   
        }        
    }
});