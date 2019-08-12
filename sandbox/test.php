<?php
require_once(__DIR__."/../vendor/autoload.php");
require_once(__DIR__."/../src/lib/Rest.php");
use ascio\lib\Abc;
use ascio\lib\Ascio;
use ascio\v2\Contact;
use ascio\lib\Changes;
use ascio\lib\Rest;

Ascio::setConfig();

var_dump(class_exists("Abc"));

class ttt implements Rest {

}