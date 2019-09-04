<?php

// XSLT-WSDL-Client. Generated PHP class of PollMessageResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\PollMessageResponseDb;
use ascio\api\v2\PollMessageResponseApi;


abstract class PollMessageResponse extends ResponseRootElement  {

	protected $_apiProperties=["PollMessageResult", "msgCount", "item"];
	protected $_apiObjects=["PollMessageResult", "item"];
	protected $PollMessageResult;
	protected $msgCount;
	protected $item;

	/**
	* Getters and setters for API-Properties
	*/
	public function setPollMessageResult (?\ascio\v2\Response $PollMessageResult = null) : self {
		$this->set("PollMessageResult", $PollMessageResult);
		return $this;
	}
	public function getPollMessageResult () : ?\ascio\v2\Response {
		return $this->get("PollMessageResult", "\\ascio\\v2\\Response");
	}
	public function createPollMessageResult () : \ascio\v2\Response {
		return $this->create ("PollMessageResult", "\\ascio\\v2\\Response");
	}
	public function setMsgCount (?int $msgCount = null) : self {
		$this->set("msgCount", $msgCount);
		return $this;
	}
	public function getMsgCount () : ?int {
		return $this->get("msgCount", "int");
	}
	public function setItem (?\ascio\v2\QueueItem $item = null) : self {
		$this->set("item", $item);
		return $this;
	}
	public function getItem () : ?\ascio\v2\QueueItem {
		return $this->get("item", "\\ascio\\v2\\QueueItem");
	}
	public function createItem () : \ascio\v2\QueueItem {
		return $this->create ("item", "\\ascio\\v2\\QueueItem");
	}
}