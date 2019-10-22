<?php
namespace ascio\lib;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

require(__DIR__."/../vendor/autoload.php");
Ascio::init();
Ascio::setConfig();

var_dump([
    'name' => "Manuel",
    'email' => "manuel.lautenschlager@ascio.com",
    'api_token' => Str::random(60)
]);