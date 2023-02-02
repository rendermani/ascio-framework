<?php

// XSLT-WSDL-Client. Generated PHP class of ResendMessage

namespace ascio\service\v3;
use ascio\db\v3\ResendMessageDb;
use ascio\api\v3\ResendMessageApi;
use ascio\base\v3\RequestRootElement;


class ResendMessage extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\ResendMessageRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\ResendMessageRequest {
		return $this->get("request", "\\ascio\\v3\\ResendMessageRequest");
	}
	public function createRequest () : \ascio\v3\ResendMessageRequest {
		return $this->create ("request", "\\ascio\\v3\\ResendMessageRequest");
	}
}