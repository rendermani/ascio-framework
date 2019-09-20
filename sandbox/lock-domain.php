<?php
namespace ascio\lib;

use ascio\v2\Domain;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$domain = new Domain();
$domain->getByHandle("TESTME5D58412");
// $domain->api()->get("ALBERTIN75630");
// $domain->db()->syncToDb();

$domain->unexpire();
$domain
    ->setUpdateLock(LockAction::Unlock)
    ->setDeleteLock(LockAction::Unlock)
    ->update();

//$domain->setDeleteLock("Lock");
//domain->update();