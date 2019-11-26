<?php
namespace ascio\lib;

use ascio\v2\Domain;
use ascio\v2\TestLib;


require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$domain = new Domain();
$domain->getByHandle("TESTME5D66885");
$wf = new Workflow($domain);
// if the orders of the workflow require and unlock it will be done before submitting the orders.
// After the orders are finished the relock will be restored if possible.
$wf->getSubmitOptions()->setAutoUnlock(true);
// add the expire order-object
$wf->addTask($domain->getOrderRequest()->expire());
// submit all orders
$wf->submit();