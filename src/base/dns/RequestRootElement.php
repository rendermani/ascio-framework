<?php
namespace ascio\base\dns;

class RequestRootElement extends Base {
    public function __construct()
    {
        parent::__construct();        
        if(isset($this->sessionId)) {
            $this->setSessionId(Ascio::getClient("dns")->getSessionId());
        }        
    }
}