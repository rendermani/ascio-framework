<?php
namespace ascio\lib;

use App\User as User;
use ascio\db\v2\OrderDb;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("webrender");
User::truncate();
$pw = password_hash("test", PASSWORD_BCRYPT);

$user = new User([
    "name" => "mani",
    "password" => $pw,
    "email" => "ml@webrender.de"
]);
$user->save();
$userSub2 = new User([
    "name" => "webrender",
    "password" => $pw,
    "email" => "manuel@webrender.de",
    "parent" => $user->id
]);
$userSub2->save();
$userSub3 = new User([
    "name" => "orkla",
    "password" => $pw,
    "email" => "test@webrender.de",
    "parent" => $user->id
]);
$userSub3->save();
$userSub4 = new User([
    "name" => "ascio",
    "password" => $pw,
    "email" => "me@webrender.de",
    "parent" => $userSub3->id
]);
$userSub4->save();
$userSub5 = new User([
    "name" => "softgarden",
    "password" => $pw,
    "email" => "admin@webrender.de",
    "parent" => $userSub3->id
]);
$userSub5->save();



