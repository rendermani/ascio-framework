<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfstring

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfstringDb;
use ascio\api\v3\ArrayOfstringApi;
use ascio\base\v3\ArrayBase;


class ArrayOfstring extends ArrayBase implements \Iterator  {

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