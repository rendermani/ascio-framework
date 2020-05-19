<?php

// XSLT-WSDL-Client. Generated PHP class of GetPriceHistoryRequest

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\GetPriceHistoryRequestDb;
use ascio\api\v3\GetPriceHistoryRequestApi;


class GetPriceHistoryRequest extends Base  {

	protected $_apiProperties=["ProductName"];
	protected $_apiObjects=[];
	protected $ProductName;

	public function setProductName (?string $ProductName = null) : self {
		$this->set("ProductName", $ProductName);
		return $this;
	}
	public function getProductName () : ?string {
		return $this->get("ProductName", "string");
	}
}