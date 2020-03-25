<?php
namespace ascio\v2;

use ascio\lib\Ascio;
use ascio\v2\TestLib;
use SoapFault;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("mlautenschlager");

$criteria = new SearchCriteria();
$criteria->createWithoutstates()->addString("update_lock");
$criteria->createWithstates()->addString("active");
$clause = $criteria->createClauses()->addClause();
$clause->setAttribute("DomainName");
$clause->setOperator(SearchOperatorType::Like);
$clause->setValue("a%");

for ($z = 0; $z < 100; $z++) {
    $domains =  Ascio::getClientV2()->searchDomain($criteria);
    echo ($domains->getDomains()->count())."\n";
}


