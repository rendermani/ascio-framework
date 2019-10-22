<?php
namespace ascio\base\v2;
use ascio\base\ApiModelBase;
use ascio\base\Rest;
use ascio\v2\Service;
use ascio\lib\Ascio;

class ApiModel extends ApiModelBase implements Rest  {
    public function getClient() {
        return Ascio::getClient("v2");
    } 

}