<?
namespace ascio\base\dns;
use ascio\base\Rest;
use ascio\base\ApiModelBase;

class ApiModel extends ApiModelBase implements Rest  {
    public function getClient() {
        return Ascio::getClient("dns");
    } 
}