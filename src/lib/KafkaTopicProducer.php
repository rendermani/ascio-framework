<?php
namespace ascio\lib;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use ascio\logic\Payload;

class KafkaTopicProducer {
        /**
     * @var Logger $logger
     */
    public $logger;  
    public $partition = 0;   
    public $topic;
    /**
     * @var \RdKafka\Producer $producer 
     */ 
    public $producer; 
    public function __construct(string $topic, ?int $partition = 0)
    {
        global $_ENV;        
        $topic = "ascio.api.framework.".$topic;  
        $this->partition = $partition; 
        $this->logger = new Logger('producer');
        $this->logger->pushHandler(new StreamHandler(__DIR__ . '/../../data/logs/producer-'.$topic.'.log'));
        $this->logger->debug('Running producer...');
        $conf = new \RdKafka\Conf();
        $conf->set('metadata.broker.list', $_ENV["KAFKA_HOST"].":".$_ENV["KAFKA_PORT"]);
        $this->producer = new \RdKafka\Producer($conf);
        $this->producer->addBrokers($_ENV["KAFKA_HOST"].":".$_ENV["KAFKA_PORT"]);
        $this->topic = $this->producer->newTopic($topic);
        
    }
    public function send(Payload $payload,$partition=0) {
        $this->topic->produce($partition, 0, json_encode($payload->serialize(),JSON_PRETTY_PRINT));
        $this->producer->poll(0);
        while($this->producer->getOutQLen() > 0) {
            $this->producer->poll(0);
        }
    }  
    public function produce(Payload $payload) { 
        $this->topic->produce(0, 0, json_encode($payload->serialize(),JSON_PRETTY_PRINT));
        $this->producer->poll(0);
        while($this->producer->getOutQLen() > 0) {
            $this->producer->poll(0);
        }
    }
    public function produceIncremental(Payload $payload = null) {  
        $this->topic->produce(0, 0, json_encode($payload->serialize(),JSON_PRETTY_PRINT));
        $this->producer->poll(0);
        while($this->producer->getOutQLen() > 0) {
            $this->producer->poll(0);
        }
    }
}

