<?php
namespace ascio\lib;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use ascio\v2\Order;
use phpDocumentor\Reflection\Types\Integer;
use ascio\base\BaseClass;

Class Producer {
    public static function object (?BaseClass $object,$parameters=null) {
        TopicProducer::produce("object.full",$object,$parameters);
        TopicProducer::produceIncremental("object.incremental",$object,$parameters);
    }
    public static function callback (?BaseClass $object,$parameters=null) {
        TopicProducer::produce("callback",$object,$parameters);
    }
    public static function log (?BaseClass $object,$parameters=null) {
        TopicProducer::produce("log",$object,$parameters);
    }
}
class TopicProducer {
    public static function produce($topic,$obj,$parameters=null) {
        global $_GlobalProducer;
        if(!$_GlobalProducer[$topic]) $_GlobalProducer[$topic] = new KafkaTopicProducer($topic);
        $_GlobalProducer[$topic]->produce($obj,$parameters);
    }
    public static function produceIncremental($topic,$obj,$parameters=null) {
        global $_GlobalProducer;
        if(!$_GlobalProducer[$topic]) $_GlobalProducer[$topic] = new KafkaTopicProducer($topic);
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
        $this->producer->setLogLevel(LOG_DEBUG);
        $this->producer->addBrokers('kafka');
        $this->topic = $this->producer->newTopic($topic);
        
    }    
    public function produce(?BaseClass $obj = null,$properties = []) {
        $payload = [
            "object" => $obj ? $obj->serialize() : null,
            "class" => get_class($obj),
            "id" => $obj->db()->getId(),
        ];
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
            "incremental" => $incremental                 
        ];
        $payload = array_merge($payload,(array) $properties);
        $this->topic->produce(0, 0, json_encode((object) $payload,JSON_PRETTY_PRINT));
        //$this->producer->poll(0);
        while($this->producer->getOutQLen() > 0) {
            //$this->producer->poll(0);
        }
    }
}

