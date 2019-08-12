<?php

// XSLT-WSDL-Client. Generated PHP class of LogInResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\LogInResponseDb;
use ascio\api\v2\LogInResponseApi;


class LogInResponse extends ResponseRootElement  {

	protected $_apiProperties=["LogInResult", "sessionId"];
	protected $_apiObjects=["LogInResult"];
	protected $LogInResult;
	protected $sessionId;

	public function setLogInResult (?\ascio\v2\Response $LogInResult = null) : \ascio\v2\LogInResponse {
		$this->set("LogInResult", $LogInResult);
		return $this;
	}
	public function getLogInResult () : ?\ascio\v2\Response {
		return $this->get("LogInResult", "\\ascio\\v2\\Response");
	}
	public function createLogInResult () : \ascio\v2\Response {
		return $this->create ("LogInResult", "\\ascio\\v2\\Response");
	}
	public function setSessionId (?string $sessionId = null) : \ascio\v2\LogInResponse {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
}