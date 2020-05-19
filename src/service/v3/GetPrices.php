<?php

// XSLT-WSDL-Client. Generated PHP class of GetPrices

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\GetPricesDb;
use ascio\api\v3\GetPricesApi;


class GetPrices extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetPricesRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetPricesRequest {
		return $this->get("request", "\\ascio\\v3\\GetPricesRequest");
	}
	public function createRequest () : \ascio\v3\GetPricesRequest {
		return $this->create ("request", "\\ascio\\v3\\GetPricesRequest");
	}
}