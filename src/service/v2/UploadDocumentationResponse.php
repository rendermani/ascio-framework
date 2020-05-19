<?php

// XSLT-WSDL-Client. Generated PHP class of UploadDocumentationResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\UploadDocumentationResponseDb;
use ascio\api\v2\UploadDocumentationResponseApi;


class UploadDocumentationResponse extends ResponseRootElement  {

	protected $_apiProperties=["UploadDocumentationResult"];
	protected $_apiObjects=["UploadDocumentationResult"];
	protected $UploadDocumentationResult;

	public function setUploadDocumentationResult (?\ascio\v2\Response $UploadDocumentationResult = null) : self {
		$this->set("UploadDocumentationResult", $UploadDocumentationResult);
		return $this;
	}
	public function getUploadDocumentationResult () : ?\ascio\v2\Response {
		return $this->get("UploadDocumentationResult", "\\ascio\\v2\\Response");
	}
	public function createUploadDocumentationResult () : \ascio\v2\Response {
		return $this->create ("UploadDocumentationResult", "\\ascio\\v2\\Response");
	}
}