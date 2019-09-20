<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfString

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfStringDb;
use ascio\api\v2\ArrayOfStringApi;
use ascio\base\ArrayInterface;


abstract class ArrayOfString extends ArrayBase implements ArrayInterface,\Iterator,\countable,\ArrayAccess  {

	protected $_apiProperties=["string"];
	protected $_apiObjects=[];
	protected $string;

	/**
	* Getters and setters for API-Properties
	*/
	public function setString (?Iterable $string = null) : self {
		$this->set("string", $string);
		return $this;
	}
	public function getString () : ?Iterable {
		return $this->get("string", "string");
	}
	public function addString () : string {
		return $this->addItem(func_get_args(),"string");
	}
	public function addStrings ($array) : self {
		return $this->add(func_get_args());
	}
}