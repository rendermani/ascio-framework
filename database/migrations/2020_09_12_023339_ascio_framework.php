<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use ascio\lib\Ascio;
use ascio\v2 as v2;
use ascio\v3 as v3; 
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
use ascio\v3\DomainInfo;
use ascio\v3\ErrorCode;
use ascio\v3\Message as V3Message;
use ascio\v3\OrderHistory;

class AscioFramework extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Ascio::setConfig();
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
        echo "Create OrderInfo\n";
        $order = new v3\OrderInfo();
        $history = $order->createOrderStatusHistory()->add(new OrderHistory());

        $order->db()->createTables();

        echo "Create AbstractOrderRequest\n";
        $order = new v3\AbstractOrderRequest();
        $order->db()->createTables();

        echo "Create Message\n";

        $message = new V3Message();
        $message->db()->createTables();

        echo "Create QueueMessage\n";
        $message = new v3\QueueMessage();
        $message->db()->createTables();

        echo "Create Error\n";
        $error = new ErrorCode();
        $error->db()->createTables();

        echo "Create AbstractResponse\n";
        $response = new v3\AbstractResponse();
        $order->db()->createTables();

        echo "Create KeyValue\n";
        $keyValue = new KeyValue();
        $keyValue->db()->createTables();

        echo "Create DomainInfo\n";
        $info = new DomainInfo();
        $info->db()->createTables();


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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach(Schema::getAllTables() as $table){
            if(strpos($table->Tables_in_ascio,"v2_")=== 0) Schema::dropIfExists($table->Tables_in_ascio);
            if(strpos($table->Tables_in_ascio,"v3_")=== 0) Schema::dropIfExists($table->Tables_in_ascio);
            if(strpos($table->Tables_in_ascio,"dns_")=== 0) Schema::dropIfExists($table->Tables_in_ascio);
        }
    }
}
