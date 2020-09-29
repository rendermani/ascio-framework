<?php
namespace ascio\lib;

use App\User as User;
use ascio\db\v2\OrderDb;
use Illuminate\Contracts\Cache\Factory as  Cache;
use Illuminate\Support\Facades\Auth;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("webrender");

User::create();

$user = User::where("id",1)->firstOrFail();
$user->saveAllChildren();
dd($user->allowedUsers());

$users = OrderDb::where('Type','Register_Domain')->whereIn("_client", [5])->paginate(10);
foreach($users as  $order) {
    dump ($order->_id)."\n";
}

