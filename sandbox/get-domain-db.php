<?php
namespace ascio\lib;

use ascio\v2\Domain;

require(__DIR__."/../vendor/autoload.php");

$domain = new Domain();
$result = $domain->db()
->where("DomainName","testme-5d5b1e40b4ce4.com")
->where("_part_of_order",null)
->where("Status","!=","DELETED")
->get();

foreach($result as $key => $value) {
    echo $key. ": ". $value->Status ."\n";
}
