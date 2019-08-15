<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfMessage

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfMessageDb;
use ascio\api\v2\ArrayOfMessageApi;


class ArrayOfMessage extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["Message"];
	protected $_apiObjects=["Message"];
	protected $Message;

	public function setMessage (?Iterable $Message = null) : self {
		$this->set("Message", $Message);
		return $this;
	}
	public function getMessage () : ?Iterable {
		return $this->get("Message", "\\ascio\\v2\\Message");
	}
	public function createMessage () : \ascio\v2\Message {
		return $this->create ("Message", "\\ascio\\v2\\Message");
	}
	public function addMessage () : \ascio\v2\Message {
		return $this->add("Message","\\ascio\\v2\\Message",func_get_args());
	}
}