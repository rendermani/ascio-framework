<?php

// XSLT-WSDL-Client. Generated PHP class of ValidateOrderResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\ValidateOrderResponseDb;
use ascio\api\v2\ValidateOrderResponseApi;


abstract class ValidateOrderResponse extends ResponseRootElement  {

	protected $_apiProperties=["ValidateOrderResult"];
	protected $_apiObjects=["ValidateOrderResult"];
	protected $ValidateOrderResult;

	/**
	* Getters and setters for API-Properties
	*/
	public function setValidateOrderResult (?\ascio\v2\Response $ValidateOrderResult = null) : self {
		$this->set("ValidateOrderResult", $ValidateOrderResult);
		return $this;
	}
	public function getValidateOrderResult () : ?\ascio\v2\Response {
		return $this->get("ValidateOrderResult", "\\ascio\\v2\\Response");
	}
	public function createValidateOrderResult () : \ascio\v2\Response {
		return $this->create ("ValidateOrderResult", "\\ascio\\v2\\Response");
	}
}