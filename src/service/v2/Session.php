<?php

// XSLT-WSDL-Client. Generated PHP class of Session

namespace ascio\service\v2;
use ascio\base\v2\Base;
use ascio\db\v2\SessionDb;
use ascio\api\v2\SessionApi;


abstract class Session extends Base  {

	protected $_apiProperties=["Account", "Password"];
	protected $_apiObjects=[];
	protected $Account;
	protected $Password;

	public function setAccount (?string $Account = null) : self {
		$this->set("Account", $Account);
		return $this;
	}
	public function getAccount () : ?string {
		return $this->get("Account", "string");
	}
	public function setPassword (?string $Password = null) : self {
		$this->set("Password", $Password);
		return $this;
	}
	public function getPassword () : ?string {
		return $this->get("Password", "string");
	}
}