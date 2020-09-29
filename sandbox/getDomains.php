<?php
namespace ascio\lib;

use ascio\v3\ArrayOfstring;
use ascio\v3\Domain;
use ascio\v3\GetDomainRequest;
use ascio\v3\GetDomainsRequest;
use ascio\v3\OrderStatusType;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("webrender");

$request = new GetDomainsRequest();
$names = new ArrayOfstring();
$names->add("123anfragen.de");
$request->setObjectNames($names);
$result = Ascio::getClientV3()->getDomains($request);
//var_dump($result->getDomainInfos()[0]->getExpDate()); 
echo Ascio::getClientV3()->__getLastResponse();


$request = new GetDomainRequest();
$request->setHandle("123ANFRA85329");
//$result = Ascio::getClientV3()->getDomain($request);
//var_dump($result->getDomainInfo());



$result = Ascio::getClientV2("cvkd148")->getDomain("123ANFRA85329");
var_dump($result);