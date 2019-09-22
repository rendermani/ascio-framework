<?php
namespace ascio\lib;

use ascio\v2\Domain;


require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("webrender2");

$domain = new Domain();
//$domain->sync("TESTME5D84034");die();
$domain->sync("TESTINGT91290");
$domain->getAutoRenew()->set(false);

$wf = new Workflow($domain);
$wf->getSubmitOptions()->setAutoUnlock(true);
$wf->addTasks($domain->getUpdateOrders());
$wf->submit();

