<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfAvailabilityCheckResult

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfAvailabilityCheckResultDb;
use ascio\api\v2\ArrayOfAvailabilityCheckResultApi;


abstract class ArrayOfAvailabilityCheckResult extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["AvailabilityCheckResult"];
	protected $_apiObjects=["AvailabilityCheckResult"];
	protected $AvailabilityCheckResult;

	public function setAvailabilityCheckResult (?Iterable $AvailabilityCheckResult = null) : self {
		$this->set("AvailabilityCheckResult", $AvailabilityCheckResult);
		return $this;
	}
	public function getAvailabilityCheckResult () : ?Iterable {
		return $this->get("AvailabilityCheckResult", "\\ascio\\v2\\AvailabilityCheckResult");
	}
	public function createAvailabilityCheckResult () : \ascio\v2\AvailabilityCheckResult {
		return $this->create ("AvailabilityCheckResult", "\\ascio\\v2\\AvailabilityCheckResult");
	}
	public function addAvailabilityCheckResult () : \ascio\v2\AvailabilityCheckResult {
		return $this->add("AvailabilityCheckResult","\\ascio\\v2\\AvailabilityCheckResult",func_get_args());
	}
}