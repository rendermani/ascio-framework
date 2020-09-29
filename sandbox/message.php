<?php
namespace ascio\lib;
require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("tritema");

$result = Ascio::getClientV2()->getMessageQueue(62486908);
var_dump($result->getItem()); 