<?php
namespace ascio\lib;

use ascio\v3\GetAccountBalanceRequest;
use ascio\v3\GetAccountTransactionsRequest;
use ascio\v3\GetSubUsersRequest;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$request = new GetAccountTransactionsRequest();
$account = Ascio::getClientV3()->getAccountTransactions($request);



