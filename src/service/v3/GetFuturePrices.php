<?php

// XSLT-WSDL-Client. Generated PHP class of GetFuturePrices

namespace ascio\service\v3;
use ascio\db\v3\GetFuturePricesDb;
use ascio\api\v3\GetFuturePricesApi;
use ascio\base\v3\RequestRootElement;


class GetFuturePrices extends RequestRootElement  {

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