<?php

// XSLT-WSDL-Client. Generated PHP class of DoRegistrantVerificationResponse

namespace ascio\service\v2;
use ascio\db\v2\DoRegistrantVerificationResponseDb;
use ascio\api\v2\DoRegistrantVerificationResponseApi;
use ascio\base\v2\ResponseRootElement;


class DoRegistrantVerificationResponse extends ResponseRootElement  {

	protected $_apiProperties=["DoRegistrantVerificationResult"];
	protected $_apiObjects=["DoRegistrantVerificationResult"];
	protected $DoRegistrantVerificationResult;

	public function setDoRegistrantVerificationResult (?\ascio\v2\Response $DoRegistrantVerificationResult = null) : self {
		$this->set("DoRegistrantVerificationResult", $DoRegistrantVerificationResult);
		return $this;
	}
	public function getDoRegistrantVerificationResult () : ?\ascio\v2\Response {
		return $this->get("DoRegistrantVerificationResult", "\\ascio\\v2\\Response");
	}
	public function createDoRegistrantVerificationResult () : \ascio\v2\Response {
		return $this->create ("DoRegistrantVerificationResult", "\\ascio\\v2\\Response");
	}
}