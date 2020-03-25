<?php
namespace ascio\lib;

use ascio\v2\ArrayOfString;
use ascio\service\v2\QualityType;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$domains = new ArrayOfString();
$domains->addString("testme");

$tlds = new ArrayOfString();
$tlds->addString("at");

try {
    $results = Ascio::getClientV2()->availabilityCheck($domains,$tlds,QualityType::SmartLive);
    echo Ascio::getClientV2()->__getLastRequest()."\n\n";
    echo Ascio::getClientV2()->__getLastResponse()."\n\n";
} catch (AscioException $e) {
    echo "Error: ".$e->getMessage();
}
$out = "";
foreach($results->getResults()->getAvailabilityCheckResult() as $result ) {   
    $line = [];
    foreach($result->properties()->toArray() as $key => $value) {
        $line[] = $key .": ".$value; 
    }
    $out .= "[AvailabilityCheck] ". implode(", ",$line)."\n";
}
echo $out; 

