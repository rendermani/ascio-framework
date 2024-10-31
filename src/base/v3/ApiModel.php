<?php
namespace ascio\base\v3;
use ascio\base\Rest;
use ascio\base\ApiModelBase;
use ascio\lib\Ascio;
use ascio\service\v3\Service ;

class ApiModel extends ApiModelBase implements Rest  {
    public function getClient() : Service {
        return Ascio::getClient("v3");
    } 
}