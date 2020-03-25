<?php
namespace ascio\lib;

require(__DIR__."/../vendor/autoload.php");

Ascio::init();

use Exception;
use Illuminate\Support\Str;

Consumer::objectIncremental(function($payload) {
    Ascio::setConfig($payload->Config);
    $obj = $payload->object;    
    try {
        if($payload->incremental) {       
            if($payload->action=="update") {
                $obj->getById($payload->object->db()->getKey());
                $obj->deserialize($payload->changes);
                $obj->db()->syncToDb();         
            } else {
                $obj->deserialize($payload->changes);
                $obj->db()->syncToDb();
            }
        } else {
            $obj->db()->syncToDb(); 
        } 
        echo $obj->getStatusSerializer()->console(LogLevel::Info,Str::ucfirst($payload->action));  
    } catch (Exception $e) {
        var_dump($payload->changes);
        $message = strpos($e->getMessage(),'Duplicate entry') === false ? $e->getMessage() : "Duplicate entry." ;
        echo $obj->getStatusSerializer()->console(LogLevel::Error,Str::ucfirst($payload->action).": ".$message);   
    }
});