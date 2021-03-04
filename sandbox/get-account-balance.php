<?php

use ascio\lib\Ascio;
use ascio\v3\GetAccountBalanceRequest;

require_once("../vendor/autoload.php");
Ascio::setConfig("webrender");
Ascio::getClientV3()->getAccountBalance(new GetAccountBalanceRequest());
