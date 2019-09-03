<?php

// XSLT-WSDL-Client. Generated PHP class of AvailabilityCheckResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\AvailabilityCheckResponseDb;
use ascio\api\v2\AvailabilityCheckResponseApi;


abstract class AvailabilityCheckResponse extends ResponseRootElement  {

	protected $_apiProperties=["AvailabilityCheckResult", "results"];
	protected $_apiObjects=["AvailabilityCheckResult", "results"];
	protected $AvailabilityCheckResult;
	protected $results;

	public function setAvailabilityCheckResult (?\ascio\v2\Response $AvailabilityCheckResult = null) : self {
		$this->set("AvailabilityCheckResult", $AvailabilityCheckResult);
		return $this;
	}
	public function getAvailabilityCheckResult () : ?\ascio\v2\Response {
		return $this->get("AvailabilityCheckResult", "\\ascio\\v2\\Response");
	}
	public function createAvailabilityCheckResult () : \ascio\v2\Response {
		return $this->create ("AvailabilityCheckResult", "\\ascio\\v2\\Response");
	}
	public function setResults (?\ascio\v2\ArrayOfAvailabilityCheckResult $results = null) : self {
		$this->set("results", $results);
		return $this;
	}
	public function getResults () : ?\ascio\v2\ArrayOfAvailabilityCheckResult {
		return $this->get("results", "\\ascio\\v2\\ArrayOfAvailabilityCheckResult");
	}
	public function createResults () : \ascio\v2\ArrayOfAvailabilityCheckResult {
		return $this->create ("results", "\\ascio\\v2\\ArrayOfAvailabilityCheckResult");
	}
}