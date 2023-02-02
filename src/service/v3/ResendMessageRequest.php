<?php

// XSLT-WSDL-Client. Generated PHP class of ResendMessageRequest

namespace ascio\service\v3;
use ascio\db\v3\ResendMessageRequestDb;
use ascio\api\v3\ResendMessageRequestApi;
use ascio\base\v3\Base;


class ResendMessageRequest extends Base  {

	protected $_apiProperties=["OrderId"];
	protected $_apiObjects=[];
	protected $OrderId;

	public function setOrderId (?string $OrderId = null) : self {
		$this->set("OrderId", $OrderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("OrderId", "string");
	}
}