<?php
namespace ascio\lib;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();
use Illuminate\Support\Str;

function getInfo($payload) {
    $obj = $payload->object; 
    switch(get_class($obj)) {
        case "ascio\\v2\\Order" : $handle = ". OrderId: ".$obj->getOrderId(); break;
        case "ascio\\v3\\Order" : $handle = ". OrderId: ".$obj->getOrderId(); break;
        case "ascio\\v2\\Domain": $handle = ". Domain: ".$obj->getDomainName(); break;
        default : $handle = "none"; 
    }
    $id = ". id:".$obj->db()->getKey(); 
    $idStr = get_class($obj).$handle.$id;
    $info = "[mysql-connector] ". Str::ucfirst($payload->action);
    $inc = $payload->incremental ? " incremental": " full" ; 
    $info .= $inc.": ".$idStr."\n";
    return $info; 
}
Consumer::objectIncremental(function($payload) {
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
    echo getInfo($payload);  
});