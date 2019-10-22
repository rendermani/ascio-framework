<?php
namespace ascio\services;

use ascio\lib\Sync;
use ascio\lib\Ascio;

require(__DIR__."/../vendor/autoload.php");

$sync = new Sync();
$sync->syncOrders();



