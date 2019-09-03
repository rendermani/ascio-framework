<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfRegistrant

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfRegistrantDb;
use ascio\api\v2\ArrayOfRegistrantApi;


abstract class ArrayOfRegistrant extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["Registrant"];
	protected $_apiObjects=["Registrant"];
	protected $Registrant;

	public function setRegistrant (?Iterable $Registrant = null) : self {
		$this->set("Registrant", $Registrant);
		return $this;
	}
	public function getRegistrant () : ?Iterable {
		return $this->get("Registrant", "\\ascio\\v2\\Registrant");
	}
	public function createRegistrant () : \ascio\v2\Registrant {
		return $this->create ("Registrant", "\\ascio\\v2\\Registrant");
	}
	public function addRegistrant () : \ascio\v2\Registrant {
		return $this->add("Registrant","\\ascio\\v2\\Registrant",func_get_args());
	}
}