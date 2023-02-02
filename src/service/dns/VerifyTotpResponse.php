<?php

// XSLT-WSDL-Client. Generated PHP class of VerifyTotpResponse

namespace ascio\service\dns;
use ascio\db\dns\VerifyTotpResponseDb;
use ascio\api\dns\VerifyTotpResponseApi;
use ascio\base\dns\ResponseRootElement;


class VerifyTotpResponse extends ResponseRootElement  {

	protected $_apiProperties=["VerifyTotpResult"];
	protected $_apiObjects=["VerifyTotpResult"];
	protected $VerifyTotpResult;

	public function setVerifyTotpResult (?\ascio\dns\Response $VerifyTotpResult = null) : self {
		$this->set("VerifyTotpResult", $VerifyTotpResult);
		return $this;
	}
	public function getVerifyTotpResult () : ?\ascio\dns\Response {
		return $this->get("VerifyTotpResult", "\\ascio\\dns\\Response");
	}
	public function createVerifyTotpResult () : \ascio\dns\Response {
		return $this->create ("VerifyTotpResult", "\\ascio\\dns\\Response");
	}
}