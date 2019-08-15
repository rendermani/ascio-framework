<?php

// XSLT-WSDL-Client. Generated PHP class of LogIn

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\LogInDb;
use ascio\api\v2\LogInApi;


class LogIn extends RequestRootElement  {

	protected $_apiProperties=["session"];
	protected $_apiObjects=["session"];
	protected $session;

	public function setSession (?\ascio\v2\Session $session = null) : self {
		$this->set("session", $session);
		return $this;
	}
	public function getSession () : ?\ascio\v2\Session {
		return $this->get("session", "\\ascio\\v2\\Session");
	}
	public function createSession () : \ascio\v2\Session {
		return $this->create ("session", "\\ascio\\v2\\Session");
	}
}