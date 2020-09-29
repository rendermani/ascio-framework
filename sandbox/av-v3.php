<?php
namespace ascio\lib;

use ascio\v2\QualityType;
use ascio\v3\AvailabilityInfoRequest;

require(__DIR__."/../vendor/autoload.php");

$request = new AvailabilityInfoRequest();
$request->setDomainName("testme.com");
$request->setQuality(QualityType::Live);
$result = Ascio::getClientV3()->availabilityInfo($request);

var_dump(Ascio::getClientV3()->__getLastRequest());
var_dump($result);