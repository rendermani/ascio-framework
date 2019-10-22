<?php 
namespace ascio\lib;
require(__DIR__."/../vendor/autoload.php");

use Illuminate\Support\Str;

$client = \Doctrine\CouchDB\CouchDBClient::create(array(
    'dbname' => 'ascio-framework',
    'host' => 'couchdb',
    'user' => 'admin',
    'password' => 'smurf'
));
Consumer::object(function($payload) use($client) {
    Ascio::setConfig($payload->Config);
    $obj = $payload->object;    
    if($payload->action =="create") {
        $client->postDocument((array) $obj->serialize());
    } else {
        $doc = $client->findDocument($obj->db()->_id);
        $client->putDocument((array) $obj->serialize(),$obj->db()->_id,$doc->body["_rev"]);
    }
    echo $obj->getStatusSerializer()->console(LogLevel::Info,Str::ucfirst($payload->action));  
});