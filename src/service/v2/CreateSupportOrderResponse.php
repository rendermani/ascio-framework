<?php

// XSLT-WSDL-Client. Generated PHP class of CreateSupportOrderResponse

namespace ascio\service\v2;
use ascio\db\v2\CreateSupportOrderResponseDb;
use ascio\api\v2\CreateSupportOrderResponseApi;
use ascio\base\v2\ResponseRootElement;


class CreateSupportOrderResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateSupportOrderResult", "orderId"];
	protected $_apiObjects=["CreateSupportOrderResult"];
	protected $CreateSupportOrderResult;
	protected $orderId;

	public function setCreateSupportOrderResult (?\ascio\v2\Response $CreateSupportOrderResult = null) : self {
		$this->set("CreateSupportOrderResult", $CreateSupportOrderResult);
		return $this;
	}
	public function getCreateSupportOrderResult () : ?\ascio\v2\Response {
		return $this->get("CreateSupportOrderResult", "\\ascio\\v2\\Response");
	}
	public function createCreateSupportOrderResult () : \ascio\v2\Response {
		return $this->create ("CreateSupportOrderResult", "\\ascio\\v2\\Response");
	}
	public function setOrderId (?string $orderId = null) : self {
		$this->set("orderId", $orderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("orderId", "string");
	}
}