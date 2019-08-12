<?php

// XSLT-WSDL-Client. Generated PHP class of UploadRegistrantVerificationMessageResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\UploadRegistrantVerificationMessageResponseDb;
use ascio\api\v2\UploadRegistrantVerificationMessageResponseApi;


class UploadRegistrantVerificationMessageResponse extends ResponseRootElement  {

	protected $_apiProperties=["UploadRegistrantVerificationMessageResult"];
	protected $_apiObjects=["UploadRegistrantVerificationMessageResult"];
	protected $UploadRegistrantVerificationMessageResult;

	public function setUploadRegistrantVerificationMessageResult (?\ascio\v2\Response $UploadRegistrantVerificationMessageResult = null) : \ascio\v2\UploadRegistrantVerificationMessageResponse {
		$this->set("UploadRegistrantVerificationMessageResult", $UploadRegistrantVerificationMessageResult);
		return $this;
	}
	public function getUploadRegistrantVerificationMessageResult () : ?\ascio\v2\Response {
		return $this->get("UploadRegistrantVerificationMessageResult", "\\ascio\\v2\\Response");
	}
	public function createUploadRegistrantVerificationMessageResult () : \ascio\v2\Response {
		return $this->create ("UploadRegistrantVerificationMessageResult", "\\ascio\\v2\\Response");
	}
}