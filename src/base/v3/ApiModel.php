<?
namespace ascio\base\v3;
use ascio\base\Rest;
use ascio\base\ApiModelBase;
use ascio\lib\Ascio;
use ascio\v3\Service;

class ApiModel extends ApiModelBase implements Rest  {
    public function getClient() {
        return Ascio::getClient("v3");
    } 
}