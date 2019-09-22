<?php
namespace ascio\lib;

use ascio\v2\Domain;
use Illuminate\Database\Eloquent\ModelNotFoundException;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("cvkd148");

$domains = file_get_contents(__DIR__."/../data/import/test-domains.txt");

foreach(explode("\n",$domains) as $domainName) {
    $domain = new Domain();
    $domain->setDomainName($domainName);
    try {
        $domain->db()->getByName();
    } catch (ModelNotFoundException $e) {
        $domain->api()->getByName();
        $domain->produce();
    }
    $domain->getAutoRenew()->set(false);
    $wf = new Workflow($domain);
    $wf->getSubmitOptions()->setAutoUnlock(true);
    $wf->getSubmitOptions()->setQueue(true);
    $wf->addTasks($domain->getUpdateOrders());
    $wf->submit();
}  

