<?php
namespace ascio\lib;

use ascio\db\v2\DomainDb;
use ascio\v2\Domain;
use ascio\v2\TestLib;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Capsule\Manager as Capsule;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

//$domain = TestLib::getDomain("testme-".uniqid().".com");
//$domain->register();

$domain = new Domain();
$domain->getByHandle("TESTME5D14605");
$wf = new Workflow($domain);
$wf->getSubmitOptions()->setAutoUnlock(true);
$wf->addTask($domain->getOrderRequest()->expire());
//$wf->submit();
foreach($wf->getOrderRequests() as $order) {
    echo $order->getType()."\n";
    echo " - TransferLock: ".$order->getDomain()->getTransferLock()."\n"; 
    echo " - DeleteLock: ".$order->getDomain()->getDeleteLock()."\n"; 
    echo " - UpdateLock: ".$order->getDomain()->getUpdateLock()."\n"; 
}
$wf->submit();