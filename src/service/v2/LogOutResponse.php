<?php

// XSLT-WSDL-Client. Generated PHP class of LogOutResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\LogOutResponseDb;
use ascio\api\v2\LogOutResponseApi;


class LogOutResponse extends ResponseRootElement  {

	protected $_apiProperties=["LogOutResult"];
	protected $_apiObjects=["LogOutResult"];
	protected $LogOutResult;

	public function setLogOutResult (?\ascio\v2\Response $LogOutResult = null) : \ascio\v2\LogOutResponse {
		$this->set("LogOutResult", $LogOutResult);
		return $this;
	}
	public function getLogOutResult () : ?\ascio\v2\Response {
		return $this->get("LogOutResult", "\\ascio\\v2\\Response");
	}
	public function createLogOutResult () : \ascio\v2\Response {
		return $this->create ("LogOutResult", "\\ascio\\v2\\Response");
	}
}