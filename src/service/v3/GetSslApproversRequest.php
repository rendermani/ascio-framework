<?php

// XSLT-WSDL-Client. Generated PHP class of GetSslApproversRequest

namespace ascio\service\v3;
use ascio\db\v3\GetSslApproversRequestDb;
use ascio\api\v3\GetSslApproversRequestApi;
use ascio\base\v3\Base;


class GetSslApproversRequest extends Base  {

	protected $_apiProperties=["ProductCode", "Name"];
	protected $_apiObjects=[];
	protected $ProductCode;
	protected $Name;

	public function setProductCode (?string $ProductCode = null) : self {
		$this->set("ProductCode", $ProductCode);
		return $this;
	}
	public function getProductCode () : ?string {
		return $this->get("ProductCode", "string");
	}
	public function setName (?string $Name = null) : self {
		$this->set("Name", $Name);
		return $this;
	}
	public function getName () : ?string {
		return $this->get("Name", "string");
	}
}