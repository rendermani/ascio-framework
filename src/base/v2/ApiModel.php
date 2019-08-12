<?php
namespace ascio\base\v2;
use ascio\base\ApiModelBase;
use ascio\base\Rest;
use ascio\v2\Service;
use ascio\lib\Ascio;

class ApiModel extends ApiModelBase implements Rest  {
    public function __construct($parent=null) {
        parent::__construct($parent);
        $this->_client = Ascio::getClient("v2");     
    }
    public function getClient() : Service {
        return $this->_client;
    } 

}