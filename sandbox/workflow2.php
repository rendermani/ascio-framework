<?php
namespace ascio\lib;
use ascio\v2\TestLib;


require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("webrender2");

$domain = TestLib::getDomain("testme-".uniqid().".com");
$domain->setDeleteLock("Lock");
$domain->setStatus("DELETE_LOCK");
// register domain
$domain->register();
// set AutoRenew
$domain->getAutoRenew()->set(false);
// set AutoUnlock
// submit workflow
$wf = new Workflow($domain);
$wf->getSubmitOptions()->setAutoUnlock(true);
$wf->addTasks($domain->getUpdateOrders());
$wf->submit();

