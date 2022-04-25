<?php
namespace ascio\base\v3;

use ascio\lib\Config;
use ascio\v3\AbstractResponse;
use ascio\lib\Ascio;
use ascio\lib\AscioException;
use ascio\lib\AscioOrderExceptionV3;

class ServiceBase extends \SoapClient {
    protected $cfg;
    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */      
    public function __construct(array $options = array(), $wsdl = null) {    
        $this->cfg = Ascio::getConfig()->get("v3");
        foreach ($this->classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
            $options['classmap'][$key] = $value;
          }
        }
        $options = array_merge([
            'features' => 1,
            'trace' => true
        ],$options);      
        $wsdl = $wsdl ? $wsdl : $this->cfg->wsdl;
        parent::__construct($wsdl, $options);
    }
    public function call($function,$args=[],$options = NULL, $input_headers = NULL, &$output_headers = NULL) {
        $credentials = ["Account"=>$this->cfg->account, "Password" => $this->cfg->password];
        $header = new \SoapHeader("http://www.ascio.com/2013/02","SecurityHeaderDetails", $credentials, false);
        Ascio::setHeaders("v3",$this,$header);
        /**
         * @var $result AbstractResponse
         */
        //$this->__setSoapHeaders([$header]);
        $result = $this->__soapCall($function, [$function => $args], $options, $input_headers, $output_headers);  
        $resultObject = $result->{$function."Result"};      
        $resultObject->init();
        if( method_exists($resultObject,"getResultCode") &&  $resultObject->getResultCode() >= 400) {            
            $this->setError($function,$args,$resultObject,$resultObject);
        }
       
        return $resultObject;
    }
    public function setConfig(Config  $config) {
        $this->config = $config;
    }
    public function getConfig() : Config{
        return $this->config;
    }
    public function setError($function, $request, $result,$status) {
        if($function == "ValidateOrder" || $function == "CreateOrder") { 
            $exception = new AscioOrderExceptionV3($status->getResultMessage,$status->getResultCode);
            if($function == "CreateOrder") {
                $exception->setOrder($result->getOrderInfo());
            }
            $exception->setResult($function,$request["request"],$status,$result);
        } else {
            $exception = new AscioException($status->getResultMessage(),$status->getResultCode());
            $exception->setResult($function,$request,$status,$result);
        }
        
        $exception->setSoap($this->__getLastRequest(),$this->__getLastResponse());
        throw $exception;
    }
}
