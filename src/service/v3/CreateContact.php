<?php

// XSLT-WSDL-Client. Generated PHP class of CreateContact

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\CreateContactDb;
use ascio\api\v3\CreateContactApi;


class CreateContact extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\CreateContactRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\CreateContactRequest {
		return $this->get("request", "\\ascio\\v3\\CreateContactRequest");
	}
	public function createRequest () : \ascio\v3\CreateContactRequest {
		return $this->create ("request", "\\ascio\\v3\\CreateContactRequest");
	}
}