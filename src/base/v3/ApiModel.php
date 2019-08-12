<?
namespace ascio\base\v3;
use ascio\base\Rest;
use ascio\base\ApiModelBase;
use ascio\lib\Ascio;
use ascio\v3\Service;

class ApiModel extends ApiModelBase implements Rest  {
    public function __construct($parent=null) {
        parent::__construct($parent);
        $this->_client = Ascio::getClientV3();
    }
    public function getClient() : Service {
        return $this->_client;
    } 
}