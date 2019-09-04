<?php

// XSLT-WSDL-Client. Generated PHP class of AvailabilityInfoResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\AvailabilityInfoResponseDb;
use ascio\api\v2\AvailabilityInfoResponseApi;


abstract class AvailabilityInfoResponse extends ResponseRootElement  {

	protected $_apiProperties=["AvailabilityInfoResult", "PriceInfo"];
	protected $_apiObjects=["AvailabilityInfoResult", "PriceInfo"];
	protected $AvailabilityInfoResult;
	protected $PriceInfo;

	/**
	* Getters and setters for API-Properties
	*/
	public function setAvailabilityInfoResult (?\ascio\v2\Response $AvailabilityInfoResult = null) : self {
		$this->set("AvailabilityInfoResult", $AvailabilityInfoResult);
		return $this;
	}
	public function getAvailabilityInfoResult () : ?\ascio\v2\Response {
		return $this->get("AvailabilityInfoResult", "\\ascio\\v2\\Response");
	}
	public function createAvailabilityInfoResult () : \ascio\v2\Response {
		return $this->create ("AvailabilityInfoResult", "\\ascio\\v2\\Response");
	}
	public function setPriceInfo (?\ascio\v2\PriceInfo $PriceInfo = null) : self {
		$this->set("PriceInfo", $PriceInfo);
		return $this;
	}
	public function getPriceInfo () : ?\ascio\v2\PriceInfo {
		return $this->get("PriceInfo", "\\ascio\\v2\\PriceInfo");
	}
	public function createPriceInfo () : \ascio\v2\PriceInfo {
		return $this->create ("PriceInfo", "\\ascio\\v2\\PriceInfo");
	}
}