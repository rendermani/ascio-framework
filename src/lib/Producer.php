<?php
namespace ascio\lib;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use ascio\v2\Order;
use phpDocumentor\Reflection\Types\Integer;
use ascio\base\BaseClass;
use ascio\base\DbBase;
use ascio\logic\OrderPayload;
use ascio\logic\Payload;
use ascio\logic\SyncPayload;
use OrderInterface;

Class Producer {
    public static function object ($object,$parameters=null) {
        TopicProducer::produce("object.full",$object,$parameters);
        TopicProducer::produceIncremental("object.incremental",$object,$parameters);
    }
    public static function callback ($object,$parameters=null) {
        TopicProducer::produce("callback",$object,$parameters);
    }
    public static function log ($object,$parameters=null) {
        TopicProducer::produce("log",$object,$parameters);
    }
    public static function order (OrderPayload $orderPayload,$partition=0) {
        TopicProducer::send("order",$orderPayload,$partition);
    }
    public static function sync (SyncPayload $syncPayload,$partition=0) {
        TopicProducer::send("sync",$syncPayload,$partition);
    }
}
class TopicProducer {
    public static function send($topic, Payload $payload,$partition=0) {
        global $_GlobalProducer;
        if(!$_GlobalProducer[$topic]) $_GlobalProducer[$topic] = new KafkaTopicProducer($topic);
        $_GlobalProducer[$topic]->send($payload,$partition);
    }
    public static function produce($topic,$obj,$parameters=null) {
        global $_GlobalProducer;
        if(!$_GlobalProducer) $_GlobalProducer = [];
        if(!array_key_exists($topic,$_GlobalProducer)) $_GlobalProducer[$topic] = new KafkaTopicProducer($topic);
        $_GlobalProducer[$topic]->produce($obj,$parameters);
    }
    public static function produceIncremental($topic,$obj,$parameters=null) {
        global $_GlobalProducer;        
        if(!$_GlobalProducer) $_GlobalProducer = [];
        if(!array_key_exists($topic,$_GlobalProducer)) $_GlobalProducer[$topic] = new KafkaTopicProducer($topic);       
        $_GlobalProducer[$topic]->produceIncremental($obj,$parameters);
    }
}

class KafkaTopicProducer {
        /**
     * @var Logger $logger
     */
    public $logger;  
    public $partition = 0;   
    public $topic;
    /**
     * @var RdKafka\Producer $producer 
     */ 
    public $producer; 
    public function __construct(string $topic, ?int $partition = 0)
    {
        $topic = "ascio.api.framework.".$topic;  
        $this->partition = $partition; 
        $this->logger = new Logger('producer');
        $this->logger->pushHandler(new StreamHandler(__DIR__ . '/../../data/logs/producer-'.$topic.'.log'));
        $this->logger->debug('Running producer...');
        
        $this->producer = new \RdKafka\Producer();
        $this->producer->addBrokers('kafka');
        $this->topic = $this->producer->newTopic($topic);
        
    }
    public function send(Payload $payload,$partition=0) {
        $this->topic->produce($partition, 0, json_encode($payload,JSON_PRETTY_PRINT));
        //$this->producer->poll(0);
        while($this->producer->getOutQLen() > 0) {
            //$this->producer->poll(0);
        }
    }  
    public function produce(?BaseClass $obj = null,$properties = []) {
        if(is_object($obj)) {
            $class =  get_class($obj);
        } else $class = null;
        if($obj instanceof DbBase) {
            $id = $obj->db()->getId();
        } else $id = null;
        if($obj instanceof BaseClass) {
            $obj = $obj->serialize();
        }
        $payload = [
            "Config" => Ascio::getConfig()->getId()
        ];
        if($obj) $payload["object"] = $obj;
        if($class) $payload["class"] = $class;
        if($id) $payload["id"] = $id;
        $payload = array_merge($payload,(array) $properties);
        $this->topic->produce(0, 0, json_encode((object) $payload,JSON_PRETTY_PRINT));
        //$this->producer->poll(0);
        while($this->producer->getOutQLen() > 0) {
            //$this->producer->poll(0);
        }
    }
    public function produceIncremental(?BaseClass $obj = null,$properties = null) {
        $serialized = $properties["action"] == "update" ? $obj->serializeIncremental() : $obj->serialize();
        $incremental = $properties["action"] == "update" ? true : false;
        $payload = [
            "object" => $obj ? $serialized : null,
            "class" => get_class($obj),
            "id" => $obj->db()->getId(),
            "incremental" => $incremental,
            "Config" => Ascio::getConfig()->getId()                 
        ];
        $payload = array_merge($payload,(array) $properties);
        $this->topic->produce(0, 0, json_encode((object) $payload,JSON_PRETTY_PRINT));
        //$this->producer->poll(0);
        while($this->producer->getOutQLen() > 0) {
            //$this->producer->poll(0);
        }
    }
}

