<?php

// XSLT-WSDL-Client. Generated PHP class of GetSubUserRequest

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\GetSubUserRequestDb;
use ascio\api\v3\GetSubUserRequestApi;


class GetSubUserRequest extends Base  {

	protected $_apiProperties=["UserName"];
	protected $_apiObjects=[];
	protected $UserName;

	public function setUserName (?string $UserName = null) : self {
		$this->set("UserName", $UserName);
		return $this;
	}
	public function getUserName () : ?string {
		return $this->get("UserName", "string");
	}
}