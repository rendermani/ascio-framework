<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteRegistrant

namespace ascio\service\v3;
use ascio\db\v3\DeleteRegistrantDb;
use ascio\api\v3\DeleteRegistrantApi;
use ascio\base\v3\RequestRootElement;


class DeleteRegistrant extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\DeleteHandleRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\DeleteHandleRequest {
		return $this->get("request", "\\ascio\\v3\\DeleteHandleRequest");
	}
	public function createRequest () : \ascio\v3\DeleteHandleRequest {
		return $this->create ("request", "\\ascio\\v3\\DeleteHandleRequest");
	}
}