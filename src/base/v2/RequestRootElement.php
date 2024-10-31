<?php
namespace ascio\base\v2;

use ascio\base\BaseClass;

class RequestRootElement extends BaseClass {
    public function __construct()
    {
        parent::__construct();        
        if(isset($this->sessionId)) {
            $this->setSessionId(Ascio::getClient("v2")->getSessionId());
        }        
    }
}