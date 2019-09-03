<?php

// XSLT-WSDL-Client. Generated PHP class of AckMessageResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\AckMessageResponseDb;
use ascio\api\v2\AckMessageResponseApi;


abstract class AckMessageResponse extends ResponseRootElement  {

	protected $_apiProperties=["AckMessageResult"];
	protected $_apiObjects=["AckMessageResult"];
	protected $AckMessageResult;

	public function setAckMessageResult (?\ascio\v2\Response $AckMessageResult = null) : self {
		$this->set("AckMessageResult", $AckMessageResult);
		return $this;
	}
	public function getAckMessageResult () : ?\ascio\v2\Response {
		return $this->get("AckMessageResult", "\\ascio\\v2\\Response");
	}
	public function createAckMessageResult () : \ascio\v2\Response {
		return $this->create ("AckMessageResult", "\\ascio\\v2\\Response");
	}
}