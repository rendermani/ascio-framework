<?php
namespace ascio\lib;

use ascio\v2\ArrayOfAttachment;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("webrender");

$result = Ascio::getClientV2()->createSupportOrder("This is a test", "testing the body", new ArrayOfAttachment());
var_dump($result->toJson());