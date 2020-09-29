<?php

// XSLT-WSDL-Client. Generated PHP class of GetPriceHistory

namespace ascio\service\v3;
use ascio\db\v3\GetPriceHistoryDb;
use ascio\api\v3\GetPriceHistoryApi;
use ascio\base\v3\RequestRootElement;


class GetPriceHistory extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetPriceHistoryRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetPriceHistoryRequest {
		return $this->get("request", "\\ascio\\v3\\GetPriceHistoryRequest");
	}
	public function createRequest () : \ascio\v3\GetPriceHistoryRequest {
		return $this->create ("request", "\\ascio\\v3\\GetPriceHistoryRequest");
	}
}