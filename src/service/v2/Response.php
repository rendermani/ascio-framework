<?php

// XSLT-WSDL-Client. Generated PHP class of Response

namespace ascio\service\v2;
use ascio\base\v2\Base;
use ascio\db\v2\ResponseDb;
use ascio\api\v2\ResponseApi;


abstract class Response extends Base  {

	protected $_apiProperties=["Message", "ResultCode", "Values"];
	protected $_apiObjects=["Values"];
	protected $Message;
	protected $ResultCode;
	protected $Values;

	public function setMessage (?string $Message = null) : self {
		$this->set("Message", $Message);
		return $this;
	}
	public function getMessage () : ?string {
		return $this->get("Message", "string");
	}
	public function setResultCode (?int $ResultCode = null) : self {
		$this->set("ResultCode", $ResultCode);
		return $this;
	}
	public function getResultCode () : ?int {
		return $this->get("ResultCode", "int");
	}
	public function setValues (?\ascio\v2\ArrayOfstring $Values = null) : self {
		$this->set("Values", $Values);
		return $this;
	}
	public function getValues () : ?\ascio\v2\ArrayOfstring {
		return $this->get("Values", "\\ascio\\v2\\ArrayOfstring");
	}
	public function createValues () : \ascio\v2\ArrayOfstring {
		return $this->create ("Values", "\\ascio\\v2\\ArrayOfstring");
	}
}