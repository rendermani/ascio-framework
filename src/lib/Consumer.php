<?php
namespace ascio\lib;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use ascio\v2\Order;
use phpDocumentor\Reflection\Types\Integer;
use ascio\base\BaseClass;
use Exception;

class  Consumer {
    public static function object (\closure $function) {
        TopicConsumer::consume("object.full",$function);
    }
    public static function objectIncremental (\closure $function) {
        TopicConsumer::consume("object.incremental",$function);
    }
    public static function callback (\closure $function) {
        TopicConsumer::consume("callback",$function);
    }
    public static function log (\closure $function) {
        TopicConsumer::consume("log",$function);
    }   
}
class TopicConsumer {
    public static function consume ($topic,\closure $function) {
        global $_ObjectConsumer;
        if(!$_ObjectConsumer[$topic]) $_ObjectConsumer[$topic] = new KafkaTopicConsumer($topic);
        $_ObjectConsumer[$topic]->consume(function($payload) use ($function) {
            $className = $payload->class; 
            if($className && $payload->object) {
                $obj = new $className();
                $payload->changes = $payload->object;
                $payload->object = $obj instanceof BaseClass ? $obj->deserialize($payload->object) : $obj;
            }
            $function($payload);
        });
    }
}
class KafkaTopicConsumer {
        /**
     * @var Logger $logger
     */
    public $logger;   
    public $partition = 0;   
    public $topic;
    /**
     * @var RdKafka\KafkaConsumer $consumer 
     */ 
    public $consumer; 
    public function __construct(string $topic, ?int $partition = 0)
    {
        $topic = "ascio.api.framework.".$topic;
        echo "Running consumer...topic: ".$topic."\n";
        $this->partition = $partition; 
        $this->logger = new Logger('consumer');
        $this->logger->pushHandler(new StreamHandler(__DIR__ . '/../../data/logs/consumer-'.$topic.'.log'));
        $conf = new \RdKafka\Conf();
        // Set the group id. This is required when storing offsets on the broker
        $conf->set('group.id', 'ascio.framework');
        $this->consumer = new \RdKafka\Consumer($conf);
        $this->consumer->addBrokers('kafka');
        $topicConf = new \RdKafka\TopicConf();
        //$topicConf->set('offset.store.sync.interval.ms', 1000);
        $topicConf->set('enable.auto.commit', 'false');
        // Set the offset store method to 'file'
        $topicConf->set('offset.store.method', 'file');
        $topicConf->set('offset.store.path', sys_get_temp_dir());
        // Alternatively, set the offset store method to 'broker'
        // $topicConf->set('offset.store.method', 'broker');
        // Set where to start consuming messages when there is no initial offset in
        // offset store or the desired offset is out of range.
        // 'smallest': start from the beginning
        $topicConf->set('auto.offset.reset', 'smallest');
        $this->topic = $this->consumer->newTopic($topic, $topicConf);        

    }    
    public function consume( \closure $function) {             
        $this->topic->consumeStart($this->partition, RD_KAFKA_OFFSET_STORED);
        while (true) {
            $message = $this->topic->consume($this->partition, 1000);
            switch ($message->err) {
                case RD_KAFKA_RESP_ERR_NO_ERROR:
                    if($message->payload) {
                        $function(json_decode($message->payload,false,512));                        
                        $this->topic->offsetStore($message->partition, $message->offset);
                        $this->logger->info($message->payload);
                    }               
                    break;
                case RD_KAFKA_RESP_ERR__PARTITION_EOF:
                    $this->logger->debug('No more messages; will wait for more');
                    break;
                case RD_KAFKA_RESP_ERR__TIMED_OUT:
                    $this->logger->warn('Timed out');
                    break;
                default:
                    $this->logger->err($message->errstr() . ' - ' . $message->err);
                    echo $message->errstr();
                    sleep(5);
                    //throw new \Exception($message->errstr(), $message->err);
                    break;
            }
        }
    }

}
