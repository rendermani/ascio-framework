<?php
require_once(__DIR__."/../vendor/autoload.php");

use ascio\lib\Ascio;
Ascio::setConfig();
$client = Ascio::getClient("v2");
var_dump($client);

