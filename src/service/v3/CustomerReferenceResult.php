<?php

// XSLT-WSDL-Client. Generated PHP class of CustomerReferenceResult

namespace ascio\service\v3;
use ascio\db\v3\CustomerReferenceResultDb;
use ascio\api\v3\CustomerReferenceResultApi;
use ascio\base\v3\Base;


class CustomerReferenceResult extends Base  {

	protected $_apiProperties=["IsSuccessful", "ObjectHandle", "Message"];
	protected $_apiObjects=[];
	protected $IsSuccessful;
	protected $ObjectHandle;
	protected $Message;

	public function setIsSuccessful (?bool $IsSuccessful = null) : self {
		$this->set("IsSuccessful", $IsSuccessful);
		return $this;
	}
	public function getIsSuccessful () : ?bool {
		return $this->get("IsSuccessful", "bool");
	}
	public function setObjectHandle (?string $ObjectHandle = null) : self {
		$this->set("ObjectHandle", $ObjectHandle);
		return $this;
	}
	public function getObjectHandle () : ?string {
		return $this->get("ObjectHandle", "string");
	}
	public function setMessage (?string $Message = null) : self {
		$this->set("Message", $Message);
		return $this;
	}
	public function getMessage () : ?string {
		return $this->get("Message", "string");
	}
}