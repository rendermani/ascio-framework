<?php

// XSLT-WSDL-Client. Generated PHP class of InitiatePasswordResetResponse

namespace ascio\service\dns;
use ascio\db\dns\InitiatePasswordResetResponseDb;
use ascio\api\dns\InitiatePasswordResetResponseApi;
use ascio\base\dns\ResponseRootElement;


class InitiatePasswordResetResponse extends ResponseRootElement  {

	protected $_apiProperties=["InitiatePasswordResetResult"];
	protected $_apiObjects=["InitiatePasswordResetResult"];
	protected $InitiatePasswordResetResult;

	public function setInitiatePasswordResetResult (?\ascio\dns\Response $InitiatePasswordResetResult = null) : self {
		$this->set("InitiatePasswordResetResult", $InitiatePasswordResetResult);
		return $this;
	}
	public function getInitiatePasswordResetResult () : ?\ascio\dns\Response {
		return $this->get("InitiatePasswordResetResult", "\\ascio\\dns\\Response");
	}
	public function createInitiatePasswordResetResult () : \ascio\dns\Response {
		return $this->create ("InitiatePasswordResetResult", "\\ascio\\dns\\Response");
	}
}