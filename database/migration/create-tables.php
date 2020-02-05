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
use ascio\v2\Attachment;
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

echo "\nCreate v2\n\n";
echo "Create Order\n";

$order = new v2\Order();
$order->db()->createTables();

echo "Create Message\n";

$message = new Message();
$message->db()->createTables();

echo "Create Attachment\n";

$attachment = new Attachment();
$attachment->db()->createTables();

echo "Create QueueItem\n";

$queueItem = new QueueItem();
$queueItem->db()->createTables();

echo "Create Extension\n";

$extension = new Extension();
$extension->db()->createTables();

echo "Create CallbackStatus\n";

$callbackStatus = new CallbackStatus();
$callbackStatus->db()->createTables();

echo "\nCreate v3\n\n";
echo "Create Extension\n";
$order = new v3\OrderInfo();
$order->db()->createTables();

echo "Create Extension\n";
$order = new v3\AbstractOrderRequest();
$order->db()->createTables();

echo "Create AbstractResponse\n";
$response = new v3\AbstractResponse();
$order->db()->createTables();

echo "Create KeyValue\n";
$keyValue = new KeyValue();
$keyValue->db()->createTables();

echo "Create SslCertificateInfo\n";
$info = new SslCertificateInfo();
$info->db()->createTables();

echo "Create MarkInfo\n";
$info = new MarkInfo();
$info->db()->createTables();

echo "Create DefensiveInfo\n";
$info = new DefensiveInfo();
$info->db()->createTables();

echo "Create NameWatchInfo\n";
$info = new NameWatchInfo();
$info->db()->createTables();

echo "\nCreate DNS\n\n";
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

