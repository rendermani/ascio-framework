<?php

// XSLT-WSDL-Client. Generated PHP class of GetMarks

namespace ascio\service\v3;
use ascio\db\v3\GetMarksDb;
use ascio\api\v3\GetMarksApi;
use ascio\base\v3\RequestRootElement;


class GetMarks extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetMarksRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetMarksRequest {
		return $this->get("request", "\\ascio\\v3\\GetMarksRequest");
	}
	public function createRequest () : \ascio\v3\GetMarksRequest {
		return $this->create ("request", "\\ascio\\v3\\GetMarksRequest");
	}
}