<?php 
namespace ascio\lib;
require(__DIR__."/../vendor/autoload.php");
use Illuminate\Support\Str;

Ascio::setConfig();

\Predis\Autoloader::register();

$client = new \Predis\Client([
    'scheme' => 'tcp',
    'host'   => 'redis',
    'port'   => 6379,
]);

Consumer::object(function($payload) use($client) {
    Ascio::setConfig($payload->Config);
    $obj = $payload->object;
    $client->set($obj->db()->_id,$obj->toJson());
    echo $obj->getStatusSerializer()->console(LogLevel::Info,Str::ucfirst($payload->action));  
});