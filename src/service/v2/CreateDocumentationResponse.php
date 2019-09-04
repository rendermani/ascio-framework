<?php

// XSLT-WSDL-Client. Generated PHP class of CreateDocumentationResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\CreateDocumentationResponseDb;
use ascio\api\v2\CreateDocumentationResponseApi;


abstract class CreateDocumentationResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateDocumentationResult", "documentationId"];
	protected $_apiObjects=["CreateDocumentationResult"];
	protected $CreateDocumentationResult;
	protected $documentationId;

	/**
	* Getters and setters for API-Properties
	*/
	public function setCreateDocumentationResult (?\ascio\v2\Response $CreateDocumentationResult = null) : self {
		$this->set("CreateDocumentationResult", $CreateDocumentationResult);
		return $this;
	}
	public function getCreateDocumentationResult () : ?\ascio\v2\Response {
		return $this->get("CreateDocumentationResult", "\\ascio\\v2\\Response");
	}
	public function createCreateDocumentationResult () : \ascio\v2\Response {
		return $this->create ("CreateDocumentationResult", "\\ascio\\v2\\Response");
	}
	public function setDocumentationId (?int $documentationId = null) : self {
		$this->set("documentationId", $documentationId);
		return $this;
	}
	public function getDocumentationId () : ?int {
		return $this->get("documentationId", "int");
	}
}