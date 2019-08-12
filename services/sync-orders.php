<?php
namespace ascio\services;

use ascio\lib\Sync;
use ascio\lib\Ascio;

require(__DIR__."/../vendor/autoload.php");

Ascio::setConfig();
$sync = new Sync();
$sync->syncOrders();



