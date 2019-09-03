<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfString

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfStringDb;
use ascio\api\v2\ArrayOfStringApi;


abstract class ArrayOfString extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["string"];
	protected $_apiObjects=[];
	protected $string;

	public function setString (?Iterable $string = null) : self {
		$this->set("string", $string);
		return $this;
	}
	public function getString () : ?Iterable {
		return $this->get("string", "string");
	}
	public function addString () : string {
		return $this->add("string","string",func_get_args());
	}
}