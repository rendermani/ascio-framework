<?php

// XSLT-WSDL-Client. Generated PHP class of CompleteTfaSetupResponse

namespace ascio\service\dns;
use ascio\db\dns\CompleteTfaSetupResponseDb;
use ascio\api\dns\CompleteTfaSetupResponseApi;
use ascio\base\dns\ResponseRootElement;


class CompleteTfaSetupResponse extends ResponseRootElement  {

	protected $_apiProperties=["CompleteTfaSetupResult"];
	protected $_apiObjects=["CompleteTfaSetupResult"];
	protected $CompleteTfaSetupResult;

	public function setCompleteTfaSetupResult (?\ascio\dns\Response $CompleteTfaSetupResult = null) : self {
		$this->set("CompleteTfaSetupResult", $CompleteTfaSetupResult);
		return $this;
	}
	public function getCompleteTfaSetupResult () : ?\ascio\dns\Response {
		return $this->get("CompleteTfaSetupResult", "\\ascio\\dns\\Response");
	}
	public function createCompleteTfaSetupResult () : \ascio\dns\Response {
		return $this->create ("CompleteTfaSetupResult", "\\ascio\\dns\\Response");
	}
}