<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteContact

namespace ascio\service\v3;
use ascio\db\v3\DeleteContactDb;
use ascio\api\v3\DeleteContactApi;
use ascio\base\v3\RequestRootElement;


class DeleteContact extends RequestRootElement  {

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