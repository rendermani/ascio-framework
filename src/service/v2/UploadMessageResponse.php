<?php

// XSLT-WSDL-Client. Generated PHP class of UploadMessageResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\UploadMessageResponseDb;
use ascio\api\v2\UploadMessageResponseApi;


class UploadMessageResponse extends ResponseRootElement  {

	protected $_apiProperties=["UploadMessageResult"];
	protected $_apiObjects=["UploadMessageResult"];
	protected $UploadMessageResult;

	public function setUploadMessageResult (?\ascio\v2\Response $UploadMessageResult = null) : self {
		$this->set("UploadMessageResult", $UploadMessageResult);
		return $this;
	}
	public function getUploadMessageResult () : ?\ascio\v2\Response {
		return $this->get("UploadMessageResult", "\\ascio\\v2\\Response");
	}
	public function createUploadMessageResult () : \ascio\v2\Response {
		return $this->create ("UploadMessageResult", "\\ascio\\v2\\Response");
	}
}