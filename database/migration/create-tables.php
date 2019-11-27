<?php
namespace ascio\migration;

use ascio\lib\Ascio;
use ascio\v2 as v2;
use ascio\v3 as v3; 

use Illuminate\Database\Capsule\Manager as Capsule;
use ascio\dns\Zone;
use ascio\dns\User;
use ascio\dns\ZoneLogEntry;
use ascio\dns\RoleItem;
use ascio\v2\Message;
use ascio\v2\QueueItem;
use ascio\v3\SslCertificateInfo;
use ascio\v3\MarkInfo;
use ascio\v3\DefensiveInfo;
use ascio\v3\KeyValue;
use ascio\v3\NameWatchInfo;
use ascio\v2\Extension;
use ascio\v2\CallbackStatus;

require(__DIR__."/../../vendor/autoload.php");


Ascio::setConfig();
//Capsule::schema()->dropAllTables();

echo "Create v2\n";
$order = new v2\Order();
$order->db()->createTables();

echo "Create Messages v2\n";

$message = new Message();
$message->db()->createTables();

$queueItem = new QueueItem();
$queueItem->db()->createTables();

$extension = new Extension();
$extension->db()->createTables();

$callbackStatus = new CallbackStatus();
$callbackStatus->db()->createTables();

echo "Create v3\n";
$order = new v3\OrderInfo();
$order->db()->createTables();

$order = new v3\AbstractOrderRequest();
$order->db()->createTables();

$response = new v3\AbstractResponse();
$order->db()->createTables();

$keyValue = new KeyValue();
$keyValue->db()->createTables();

$info = new SslCertificateInfo();
$info->db()->createTables();

$info = new MarkInfo();
$info->db()->createTables();

$info = new DefensiveInfo();
$info->db()->createTables();

$info = new NameWatchInfo();
$info->db()->createTables();


echo "Create DNS Zone\n";
$dns = new Zone();
$dns->db()->createTables();

echo "Create DNS Users\n";
$user = new User();
$user->db()->createTables();

echo "Create DNS Log\n";
$zonelog = new ZoneLogEntry();
$zonelog->db()->createTables();

echo "Create DNS Role\n";
$role = new RoleItem();
$role->db()->createTables();

