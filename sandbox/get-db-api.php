<?php

namespace ascio\lib;

use ascio\v2\Order;
use ascio\v2\Domain;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

//$d = \DateTime::createFromFormat('Y-m-d?H:i:s.u', '2019-07-25 21:18:10');
//var_dump($d);
//die();

$order = new Order();
$order->db()->getByOrderId("TEST561580");
$order->api()->get(); 

$domain = new Domain();
$handle = $order->getDomain()->getDomainHandle();  
$domain->db()->getByHandle($handle);
$domain->setComment("comment1");
$domain->db()->setAttribute("Comment","c2");
$date1 = $domain->getCreDate();
$action = $domain->sync($handle);
$domain->setDomainType("1234");
$domain->getRegistrant()->setName("donald duck"); 
$date2 = $domain->getCreDate();

echo "same:\n";
echo $date1 == $date2;
$updates = $domain->serializeIncremental();

$domain = new Domain();
$handle = $order->getDomain()->getDomainHandle();  
$domain->db()->getByHandle($handle);
var_dump($domain->getComment());
$domain->deserialize($updates);
var_dump($domain->getDomainType());



/* $domain->produce(["action" => $action]);
echo $action." v2 Domain ".$domain->getDomainName().": ". $order->db()->_id."\n";
 */

