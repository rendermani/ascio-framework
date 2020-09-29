<?php
namespace ascio\lib;

use ascio\base\OrderInterface;
use ascio\base\TaskInterface;
use ascio\logic\CallbackPayload;
use ascio\service\v2\QueueItem;
use ascio\v2\Order;
use ascio\v2\OrderStatusType;
use DateTime;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\Translation\Dumper\YamlFileDumper;
use test\Domain;

require(__DIR__."/../vendor/autoload.php");
TaskQueue::consume();

