<?php

// XSLT-WSDL-Client. Generated PHP class of CompletePasswordResetResponse

namespace ascio\service\dns;
use ascio\db\dns\CompletePasswordResetResponseDb;
use ascio\api\dns\CompletePasswordResetResponseApi;
use ascio\base\dns\ResponseRootElement;


class CompletePasswordResetResponse extends ResponseRootElement  {

	protected $_apiProperties=["CompletePasswordResetResult"];
	protected $_apiObjects=["CompletePasswordResetResult"];
	protected $CompletePasswordResetResult;

	public function setCompletePasswordResetResult (?\ascio\dns\Response $CompletePasswordResetResult = null) : self {
		$this->set("CompletePasswordResetResult", $CompletePasswordResetResult);
		return $this;
	}
	public function getCompletePasswordResetResult () : ?\ascio\dns\Response {
		return $this->get("CompletePasswordResetResult", "\\ascio\\dns\\Response");
	}
	public function createCompletePasswordResetResult () : \ascio\dns\Response {
		return $this->create ("CompletePasswordResetResult", "\\ascio\\dns\\Response");
	}
}