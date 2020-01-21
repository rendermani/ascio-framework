<?php
namespace ascio\lib;
use ascio\v2\TestLib;


require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$domain = TestLib::getDomain("testme-".uniqid().".com");
$domain->setDeleteLock("Lock");
$domain->register();


