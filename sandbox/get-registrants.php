<?php

use ascio\lib\Ascio;
use ascio\lib\AscioException;
use ascio\v3\GetAccountBalanceRequest;
use ascio\v3\GetRegistrantsRequest;
use ascio\v3\PagingInfo;

require_once("../vendor/autoload.php");
Ascio::setConfig();
$pageInfo = new PagingInfo();
$pageInfo->setPageIndex(1);
$pageInfo->setPageSize(1);
$request = new GetRegistrantsRequest();
$request->setPageInfo($pageInfo);
try {
    Ascio::getClientV3()->getRegistrants($request);
} catch (AscioException $e) {
    echo $e->debugSoap();
}


