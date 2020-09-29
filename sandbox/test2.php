<?php
namespace ascio\lib;


use ascio\v3\OrderStatusType;

require(__DIR__."/../vendor/autoload.php");

Ascio::setConfig();

$task = new OrderTask();
//echo $task->getStatusSerializer()->console(LogLevel::Info,"Task");
$task->db()->getByOrderId("TEST584472");
echo "Test-id: ".$task->db()->_id."\n";

var_dump($task->db()->next(OrderStatusType::Completed));


