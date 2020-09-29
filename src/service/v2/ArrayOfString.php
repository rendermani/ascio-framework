<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfString

namespace ascio\service\v2;
use ascio\db\v2\ArrayOfStringDb;
use ascio\api\v2\ArrayOfStringApi;
use ascio\base\v2\ArrayBase;


class ArrayOfString extends ArrayBase implements \Iterator  {

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
	public function addString ($item = null) : string {
		return $this->addItem("string","string",func_get_args());
	}
}