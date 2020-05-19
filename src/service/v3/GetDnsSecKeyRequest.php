<?php

// XSLT-WSDL-Client. Generated PHP class of GetDnsSecKeyRequest

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\GetDnsSecKeyRequestDb;
use ascio\api\v3\GetDnsSecKeyRequestApi;


class GetDnsSecKeyRequest extends Base  {

	protected $_apiProperties=["Handle"];
	protected $_apiObjects=[];
	protected $Handle;

	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
}