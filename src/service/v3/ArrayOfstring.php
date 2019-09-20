<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfstring

namespace ascio\service\v3;
use ascio\base\v3\ArrayBase;
use ascio\db\v3\ArrayOfstringDb;
use ascio\api\v3\ArrayOfstringApi;
use ascio\base\ArrayInterface;


abstract class ArrayOfstring extends ArrayBase implements ArrayInterface,\Iterator,\countable,\ArrayAccess  {

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