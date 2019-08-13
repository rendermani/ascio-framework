<?php
namespace ascio\lib;
use Illuminate\Database\Capsule\Manager as Capsule;

class AscioEnvironment {
    const Live = "live";
    const Testing = "testing";
}
class LockType {
    const Update = "UPDATE_LOCK";
    const Transfer = "TRANSFER_LOCK";
    const Delete = "DELETE_LOCK";
}
class LogLevel {
    const Debug = "DEBUG";
    const Info = "INFO";
    const Warn = "WARN";
    const Error = "ERROR";
    const FatalError = "FATAL_ERROR";
}
class ApiName {
    const V2 = "v2";
    const V3 = "v3";
    const Dns = "dns";
}
class OrderStatus {
    const NotSet="NotSet";
    const Stored="Stored";
    const Queued="Queued";
    const Submitting="Submitting";
    const Running="Running";
    const Blocking="Blocking";
    const WaitingForUser="WaitingForUser";
    const BlockedByOtherOrder="BlockedByOtherOrder";
    const Processing="Processing";
    const Completed="Completed";
}


class Ascio {
    public static function setConfig($id="default") {
        global $_AscioLastConfigId, $_AscioConfigsSet;              
        if(isset($_AscioConfigsSet[$id])) {
            return $_AscioConfigsSet[$id];
        }
        $config = new Config($id);
        self::setDb($config);
        $_AscioLastConfigId = $id;
        $_AscioConfigsSet = $_AscioConfigsSet ? $_AscioConfigsSet : [];
        $_AscioConfigsSet[$id] = $config;
        return $config;
    }
    public static function getClient($apiName, $configId = null) {       
        global $_AscioApiClients, $_AscioLastConfigId;
        $configId = $configId ? $configId : $_AscioLastConfigId ;
        // init singleton
        $_AscioApiClients = $_AscioApiClients ? $_AscioApiClients : [];
        $_AscioApiClients[$configId] = array_key_exists($configId,$_AscioApiClients) ? $_AscioApiClients[$configId] : [];
        $_AscioApiClients[$configId][$apiName] = array_key_exists($apiName,$_AscioApiClients[$configId]) ? $_AscioApiClients[$configId][$apiName] : [];

        if(!$_AscioApiClients[$configId][$apiName] ) {
            $config = self::setConfig($configId);
            $_AscioApiClients[$configId][$apiName]  = self::getApiClient($apiName,$config);
        }        
        return $_AscioApiClients[$configId][$apiName];     
    }
    public static function getClientV2 ($configId = null) : \ascio\v2\Service {
        return self::getClient("v2",$configId);
    }
    public static function getClientV3 ($configId = null) : \ascio\v3\Service {
        return self::getClient("v3",$configId);
    }
    public static function getClientDns ($configId = null) : \ascio\dns\Service {
        return self::getClient("dns",$configId);
    }
    public static function getConfig() : Config {
        global $_AscioLastConfigId, $_AscioConfigsSet;   
        return $_AscioConfigsSet[$_AscioLastConfigId];
    }
    static private function getApiClient($apiName, Config $config) {
        switch($apiName) {
            case "v2" : $client = new \ascio\v2\Service([],$config->get($apiName)->wsdl); break;
            case "v3" : $client = new \ascio\v3\Service([],$config->get($apiName)->wsdl); break;
            case "dns" : $client = new \ascio\dns\Service([],$config->get($apiName)->wsdl); break;
        }
        $client->setConfig($config);
        return $client;
    }
    
    static private function setDb($config) {       
        $capsule = new Capsule;     
        $capsule->addConnection((array) $config->get("db"));            
        $capsule->setAsGlobal();
        $capsule->bootEloquent(); 
    }

}
class Config {
    private $id = "default";
    private $apiName;
    private $config; 
    public function __construct($configId)
    {
        $this->id = $configId; 
    }
    public function get($apiName = null)  {
        $this->fromFile();
        return $apiName ? $this->config->{$apiName} : $this->config;
    }
    public function getEnvironment(){
        return $this->config->environment;
    }
    private function fromFile() {
        if($this->config) {
            return $this->config;
        }
        $file = getenv("AscioConfigPath")."/".$this->id.".json";
        if(!file_exists($file)) {
            throw new \Exception("File ".$file." not found");
        }
        $content = file_get_contents($file);
        $this->fromJson($content);
    }
    private function fromJson($string) {
        $this->fromObject(json_decode($string));
    }
    public function fromObject($object) {
        $this->config = $object;    
        $this->config->id = $this->getId();    
    }
    public function getId()
    {
        return $this->id;
    }
    public function getApiName()
    {
        return $this->apiName;
    }
}
