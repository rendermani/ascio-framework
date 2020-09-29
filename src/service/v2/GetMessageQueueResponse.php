<?php

// XSLT-WSDL-Client. Generated PHP class of GetMessageQueueResponse

namespace ascio\service\v2;
use ascio\db\v2\GetMessageQueueResponseDb;
use ascio\api\v2\GetMessageQueueResponseApi;
use ascio\base\v2\ResponseRootElement;


class GetMessageQueueResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetMessageQueueResult", "item"];
	protected $_apiObjects=["GetMessageQueueResult", "item"];
	protected $GetMessageQueueResult;
	protected $item;

	public function setGetMessageQueueResult (?\ascio\v2\Response $GetMessageQueueResult = null) : self {
		$this->set("GetMessageQueueResult", $GetMessageQueueResult);
		return $this;
	}
	public function getGetMessageQueueResult () : ?\ascio\v2\Response {
		return $this->get("GetMessageQueueResult", "\\ascio\\v2\\Response");
	}
	public function createGetMessageQueueResult () : \ascio\v2\Response {
		return $this->create ("GetMessageQueueResult", "\\ascio\\v2\\Response");
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