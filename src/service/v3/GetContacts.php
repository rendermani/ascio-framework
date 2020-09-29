<?php

// XSLT-WSDL-Client. Generated PHP class of GetContacts

namespace ascio\service\v3;
use ascio\db\v3\GetContactsDb;
use ascio\api\v3\GetContactsApi;
use ascio\base\v3\RequestRootElement;


class GetContacts extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetContactsRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetContactsRequest {
		return $this->get("request", "\\ascio\\v3\\GetContactsRequest");
	}
	public function createRequest () : \ascio\v3\GetContactsRequest {
		return $this->create ("request", "\\ascio\\v3\\GetContactsRequest");
	}
}