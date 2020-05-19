<?php

// XSLT-WSDL-Client. Generated PHP class of WhoisResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\WhoisResponseDb;
use ascio\api\v2\WhoisResponseApi;


class WhoisResponse extends ResponseRootElement  {

	protected $_apiProperties=["WhoisResult", "whoisData"];
	protected $_apiObjects=["WhoisResult"];
	protected $WhoisResult;
	protected $whoisData;

	public function setWhoisResult (?\ascio\v2\Response $WhoisResult = null) : self {
		$this->set("WhoisResult", $WhoisResult);
		return $this;
	}
	public function getWhoisResult () : ?\ascio\v2\Response {
		return $this->get("WhoisResult", "\\ascio\\v2\\Response");
	}
	public function createWhoisResult () : \ascio\v2\Response {
		return $this->create ("WhoisResult", "\\ascio\\v2\\Response");
	}
	public function setWhoisData (?string $whoisData = null) : self {
		$this->set("whoisData", $whoisData);
		return $this;
	}
	public function getWhoisData () : ?string {
		return $this->get("whoisData", "string");
	}
}