<?php
namespace ascio\lib;

use ascio\v3\PollQueueRequest;
use ascio\v3\MessageType;
use ascio\v2\MessageType as AscioMessageType;

require(__DIR__."/../vendor/autoload.php");

Ascio::setConfig();
$_GET["Callback"] = true; 
$_GET["Account"] = Ascio::getConfig()->get("v2")->account; 
$_GET["Environment"] =  Ascio::getConfig()->getEnvironment(); 
$_GET["Config"] = Ascio::getConfig()->getId(); 
Producer::callback(null,$_GET);



