<?php
namespace ascio\lib;

use ascio\v2\Domain;
use ascio\v2\Order;

require(__DIR__."/../vendor/autoload.php");


Ascio::setConfig("freeparking");

$domain = new Domain();
$domain->setDomainHandle("DEMOTEST72442");
$domain->api()->get();
var_dump($domain->serialize());