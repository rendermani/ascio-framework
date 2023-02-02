<?php

// XSLT-WSDL-Client. Generated PHP class of InitiateTfaSetupResponse

namespace ascio\service\dns;
use ascio\db\dns\InitiateTfaSetupResponseDb;
use ascio\api\dns\InitiateTfaSetupResponseApi;
use ascio\base\dns\ResponseRootElement;


class InitiateTfaSetupResponse extends ResponseRootElement  {

	protected $_apiProperties=["InitiateTfaSetupResult", "tfaSetup"];
	protected $_apiObjects=["InitiateTfaSetupResult", "tfaSetup"];
	protected $InitiateTfaSetupResult;
	protected $tfaSetup;

	public function setInitiateTfaSetupResult (?\ascio\dns\Response $InitiateTfaSetupResult = null) : self {
		$this->set("InitiateTfaSetupResult", $InitiateTfaSetupResult);
		return $this;
	}
	public function getInitiateTfaSetupResult () : ?\ascio\dns\Response {
		return $this->get("InitiateTfaSetupResult", "\\ascio\\dns\\Response");
	}
	public function createInitiateTfaSetupResult () : \ascio\dns\Response {
		return $this->create ("InitiateTfaSetupResult", "\\ascio\\dns\\Response");
	}
	public function setTfaSetup (?\ascio\dns\TfaSetup $tfaSetup = null) : self {
		$this->set("tfaSetup", $tfaSetup);
		return $this;
	}
	public function getTfaSetup () : ?\ascio\dns\TfaSetup {
		return $this->get("tfaSetup", "\\ascio\\dns\\TfaSetup");
	}
	public function createTfaSetup () : \ascio\dns\TfaSetup {
		return $this->create ("tfaSetup", "\\ascio\\dns\\TfaSetup");
	}
}