<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfstring

namespace ascio\service\v3;
use ascio\base\v3\ArrayBase;
use ascio\db\v3\ArrayOfstringDb;
use ascio\api\v3\ArrayOfstringApi;


class ArrayOfstring extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["string"];
	protected $_apiObjects=[];
	protected $string;

	public function setString (?Iterable $string = null) : \ascio\v3\ArrayOfstring {
		$this->set("string", $string);
		return $this;
	}
	public function getString () : ?Iterable {
		return $this->get("string", "string");
	}
	public function addString () : ?string {
		return $this->add("string","string",func_get_args());
	}
}