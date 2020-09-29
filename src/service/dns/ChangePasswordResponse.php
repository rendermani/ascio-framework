<?php

// XSLT-WSDL-Client. Generated PHP class of ChangePasswordResponse

namespace ascio\service\dns;
use ascio\db\dns\ChangePasswordResponseDb;
use ascio\api\dns\ChangePasswordResponseApi;
use ascio\base\dns\ResponseRootElement;


class ChangePasswordResponse extends ResponseRootElement  {

	protected $_apiProperties=["ChangePasswordResult"];
	protected $_apiObjects=["ChangePasswordResult"];
	protected $ChangePasswordResult;

	public function setChangePasswordResult (?\ascio\dns\Response $ChangePasswordResult = null) : self {
		$this->set("ChangePasswordResult", $ChangePasswordResult);
		return $this;
	}
	public function getChangePasswordResult () : ?\ascio\dns\Response {
		return $this->get("ChangePasswordResult", "\\ascio\\dns\\Response");
	}
	public function createChangePasswordResult () : \ascio\dns\Response {
		return $this->create ("ChangePasswordResult", "\\ascio\\dns\\Response");
	}
}