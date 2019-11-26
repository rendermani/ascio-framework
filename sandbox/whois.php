<?php
namespace ascio\lib;

use ascio\v2\ArrayOfString;
use ascio\service\v2\QualityType;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

try {
    $results = Ascio::getClientV2()->whois("hostpoint.li");
} catch (AscioException $e) {
    echo "Error: ".$e->getMessage();
}
var_dump($results->getWhoisData());

