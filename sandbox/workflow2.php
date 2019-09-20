<?php
namespace ascio\lib;

use ascio\db\v2\DomainDb;
use ascio\v2\Domain;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Capsule\Manager as Capsule;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$domain = new Domain();
//$domain->sync("TESTME5D84034");die();
$domain->sync("TESTINGT91290");
$domain->getAutoRenew()->set(false);

$wf = new Workflow($domain);
$wf->getSubmitOptions()->setAutoUnlock(true);
$wf->addTasks($domain->getUpdateOrders());
$wf->submit();

