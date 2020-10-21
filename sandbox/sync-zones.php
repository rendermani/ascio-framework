<?php
namespace ascio\lib;
require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("softgarden");

use App\Http\Controllers\ZoneController;

$zoneController = new ZoneController();
$zoneController ->sync();