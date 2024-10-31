<?php
namespace ascio\base\v3;

class RequestRootElement extends Base {
    public function __construct()
    {
        parent::__construct();        
        if(isset($this->sessionId)) {
            $this->setSessionId(Ascio::getClient("v3")->getSessionId());
        }        
    }
}