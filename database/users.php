<?php
namespace ascio\migration;

use ascio\lib\Ascio;
use ascio\v2 as v2;
use ascio\v3 as v3; 

use Illuminate\Database\Capsule\Manager as Capsule;


require(__DIR__."/../../vendor/autoload.php");
Ascio::setConfig();
Capsule::Schema()::create('users', function ($table) {
    $table->string('api_token', 80)->after('password')
                        ->unique()
                        ->nullable()
                        ->default(null);
});