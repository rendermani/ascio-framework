<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfAvailabilityCheckResult

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfAvailabilityCheckResultDb;
use ascio\api\v2\ArrayOfAvailabilityCheckResultApi;
use ascio\base\ArrayInterface;


abstract class ArrayOfAvailabilityCheckResult extends ArrayBase implements ArrayInterface,\Iterator,\countable,\ArrayAccess  {

	protected $_apiProperties=["AvailabilityCheckResult"];
	protected $_apiObjects=["AvailabilityCheckResult"];
	protected $AvailabilityCheckResult;

	/**
	* Array-Specific methods
	*/
	public function current() : \ascio\v2\AvailabilityCheckResult {
		return parent::current();
	}
	public function first() : \ascio\v2\AvailabilityCheckResult {
		return parent::first();
	}
	public function last() : \ascio\v2\AvailabilityCheckResult {
		return parent::last();
	}
	public function index($nr) : \ascio\v2\AvailabilityCheckResult {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
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
		return $this->addItem(func_get_args(),"\\ascio\\v2\\AvailabilityCheckResult");
	}
	public function addAvailabilityCheckResults ($array) : self {
		return $this->add(func_get_args());
	}
}