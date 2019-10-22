<?php
namespace ascio\lib;

use ascio\v2\Domain;
use ascio\v2\TestLib;


require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("webrender2");

$domain = new Domain();
$domain->getByHandle("TESTME5D66885");
$wf = new Workflow($domain);
$wf->getSubmitOptions()->setAutoUnlock(true);
$wf->addTask($domain->getOrderRequest()->expire());
$wf->submit();