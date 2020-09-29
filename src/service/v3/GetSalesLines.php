<?php

// XSLT-WSDL-Client. Generated PHP class of GetSalesLines

namespace ascio\service\v3;
use ascio\db\v3\GetSalesLinesDb;
use ascio\api\v3\GetSalesLinesApi;
use ascio\base\v3\RequestRootElement;


class GetSalesLines extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetSalesLinesRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetSalesLinesRequest {
		return $this->get("request", "\\ascio\\v3\\GetSalesLinesRequest");
	}
	public function createRequest () : \ascio\v3\GetSalesLinesRequest {
		return $this->create ("request", "\\ascio\\v3\\GetSalesLinesRequest");
	}
}