<?php
namespace ascio\base\dns;

use ascio\lib\Ascio;
use ascio\lib\Config;
use SoapHeader;

class ServiceBase extends \SoapClient {
         /**
     * @param string $wsdl The wsdl file to use
     * @param array $options A array of config values
     */
    
    /**
     * @var iterable $apiProperties all properties that a sent from/to the API
     */
    protected $apiProperties;
    protected $cfg;
    private $sessionId;
    public function __construct(array $options = array(), $wsdl = null) {    
        $this->cfg = Ascio::getConfig()->get("dns");
        $ns = 'http://groupnbt.com/2010/10/30/Dns/DnsService'; //Namespace of the WS. 
        $headers = array(); 
        $headers[] = new SoapHeader($ns,'UserName', $this->cfg->account);
        $headers[] = new SoapHeader($ns, 'Password', $this->cfg->password);
        if($this->cfg->partner) $headers[] = new SoapHeader($ns, 'ActAs', $this->cfg->partner);
        if($this->cfg->partner) $headers[] = new SoapHeader($ns, 'Account', $this->cfg->partner);
        $this->__setSoapHeaders($headers);
        foreach($this->classmap as $key => $value) {
          if(!isset($options['classmap'][$key])) {
            $options['classmap'][$key] = $value;
          }
        }
        $options['trace'] = 1;
        parent::__construct($wsdl, $options);
    }
    public function call($function,$args,$options = NULL, $input_headers = NULL, &$output_headers = NULL) {
        $requestObject = new $function();
        $requestObject->set($args);
        if($function != "LogIn") {
            $requestObject->setSessionId($this->sessionId);

        }        
        $result = $this->__soapCall($function, $args, $options, $input_headers, $output_headers);
        if($function == "LogIn") {
            $this->sessionId = $result->getSessionId();

        }        
        $result->init($this);
    }
    public function setConfig(Config  $config) {
        $this->config = $config;
    }
    public function getConfig() : Config{
        return $this->config;
    }

    public function getSessionId() {
        return $this->sessionId;
    }
}
