<?php
namespace ascio\lib;
use ascio\v2\TestLib;


require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$domain = TestLib::getDomain("testme-".uniqid().".com");
$domain->setDeleteLock("Lock");
$domain->setStatus("DELETE_LOCK");
// register domain
$domain->register();
// set AutoRenew
$domain->getAutoRenew()->set(false);
$wf = new Workflow($domain);
// if the orders of the workflow require and unlock it will be done before submitting the orders.
// After the orders are finished the relock will be restored if possible.
$wf->getSubmitOptions()->setAutoUnlock(true);
$wf->addTasks($domain->getUpdateOrders());
// submit workflow
$wf->submit();

