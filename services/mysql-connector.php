<?php
namespace ascio\lib;

require(__DIR__."/../vendor/autoload.php");

Ascio::getConfig();

use Illuminate\Support\Str;

Consumer::objectIncremental(function($payload) {
    Ascio::setConfig($payload->Config);
    $obj = $payload->object;    
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
});