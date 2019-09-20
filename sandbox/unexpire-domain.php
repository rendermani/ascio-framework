<?php
namespace ascio\lib;

use ascio\v2\Domain;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$domain = new Domain();
$domain->sync("TESTME5D84034");
$domain->setDeleteLock(LockAction::Lock);
$domain->update();