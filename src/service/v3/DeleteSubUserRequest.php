<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteSubUserRequest

namespace ascio\service\v3;
use ascio\db\v3\DeleteSubUserRequestDb;
use ascio\api\v3\DeleteSubUserRequestApi;
use ascio\base\v3\Base;


class DeleteSubUserRequest extends Base  {

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