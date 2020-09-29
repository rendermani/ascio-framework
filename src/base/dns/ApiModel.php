<?php
namespace ascio\base\dns;
use ascio\base\ApiModelBase;
use ascio\base\Rest;
use ascio\lib\Ascio;

class ApiModel extends ApiModelBase implements Rest  {
    public function getClient() {
        return Ascio::getClient("dns");
    } 

}