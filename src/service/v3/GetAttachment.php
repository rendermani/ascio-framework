<?php

// XSLT-WSDL-Client. Generated PHP class of GetAttachment

namespace ascio\service\v3;
use ascio\db\v3\GetAttachmentDb;
use ascio\api\v3\GetAttachmentApi;
use ascio\base\v3\RequestRootElement;


class GetAttachment extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetAttachmentRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetAttachmentRequest {
		return $this->get("request", "\\ascio\\v3\\GetAttachmentRequest");
	}
	public function createRequest () : \ascio\v3\GetAttachmentRequest {
		return $this->create ("request", "\\ascio\\v3\\GetAttachmentRequest");
	}
}