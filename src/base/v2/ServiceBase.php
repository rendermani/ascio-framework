<?php
namespace ascio\base\v2;

use ascio\lib\Config;
use ascio\lib\AscioException;
use ascio\lib\Ascio;
use ascio\base\v2\RequestRootElement;
use ascio\v2\Response;
use ascio\lib\Producer;

class ServiceBase extends \SoapClient {
    private $sessionId;
    protected $classmap;
    private $cfg;
     /**
      * @param array $options A array of config values
      * @param string $wsdl The wsdl file to use
      */  
    public function __construct(array $options = array(), $wsdl = null) {                    
        $options["exceptions"] = true;
        $options["features"] = 1;
        $this->cfg = Ascio::getConfig()->get("v2");
        foreach ($this->classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
            $options['classmap'][$key] = $value;
          }
        }
        parent::__construct($wsdl, $options);
    }
    public function call($function,$args=[],$options = NULL, $input_headers = NULL, &$output_headers = NULL) {
        $class = "\\ascio\\v2\\".$function;
        /**
         * @var $requestObject RequestRootElement
         */
        $requestObject = new $class();
        $requestObject->set($args);        
        if($function != "LogIn") {
            if(!$this->getSessionId()) {
                $this->requestSessionId();
            } 
            $requestObject->setSessionId($this->getSessionId());                       
        }  
        $requestObject->set((array) $args);
        $argsNew = [$function => $requestObject->properties()->toArray()];
        $result = $this->__soapCall($function, $argsNew, $options, $input_headers, $output_headers);        
        /**
         * @var Response $status
         */
        $status = $result->{"get".$function."Result"}();
        $retryCounter = 0;
        if($status->getResultCode()==401 || $status->getResultCode()==554) {
            sleep(1);
            if(++$retryCounter >9) {
                var_dump($status);
                echo ["retries"=> $retryCounter];
                Producer::log($status,["retries"=> $retryCounter]);
            }
        } elseif($status->getResultCode()!==200) {            
            $this->setError($function,$args,$result,$status);
         }
        if($function == "LogIn") {
            $this->sessionId = $result->getSessionId();
        }        
        $result->init();
        return $result;
    }
    private function requestSessionId() {
        $session= array(
            "Account" => $this->cfg->account,
            "Password" => $this->cfg->password
        ); 
        $result = parent::__soapCall("LogIn",["LogIn" => ["session" => $session]]);
        $status = $result->getLoginResult();
        if($status->getResultCode()==200) {
           $this->sessionId = $result->getSessionId();
            return $this->sessionId;
        } else {
            $this->setError("LogIn",$session,$result,$status);
        }
    }
    public function setError($function, $request, $result,$status) {
        $exception = new AscioException($status->getMessage(),$status->getResultCode());
        $exception->setResult($function,$request,$status,$result);
        $exception->setSoap($this->__getLastRequest(),$this->__getLastResponse());
        throw $exception;
    }
    public function setConfig(Config  $config) {
        $this->cfg = $config->get("v2");
    }
    public function getConfig()  {
        return $this->cfg;
    }

    public function getSessionId() {
        return $this->sessionId;
    }
}