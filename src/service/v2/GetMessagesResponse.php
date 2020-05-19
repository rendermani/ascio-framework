<?php

// XSLT-WSDL-Client. Generated PHP class of GetMessagesResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\GetMessagesResponseDb;
use ascio\api\v2\GetMessagesResponseApi;


class GetMessagesResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetMessagesResult", "messages"];
	protected $_apiObjects=["GetMessagesResult", "messages"];
	protected $GetMessagesResult;
	protected $messages;

	public function setGetMessagesResult (?\ascio\v2\Response $GetMessagesResult = null) : self {
		$this->set("GetMessagesResult", $GetMessagesResult);
		return $this;
	}
	public function getGetMessagesResult () : ?\ascio\v2\Response {
		return $this->get("GetMessagesResult", "\\ascio\\v2\\Response");
	}
	public function createGetMessagesResult () : \ascio\v2\Response {
		return $this->create ("GetMessagesResult", "\\ascio\\v2\\Response");
	}
	public function setMessages (?\ascio\v2\ArrayOfMessage $messages = null) : self {
		$this->set("messages", $messages);
		return $this;
	}
	public function getMessages () : ?\ascio\v2\ArrayOfMessage {
		return $this->get("messages", "\\ascio\\v2\\ArrayOfMessage");
	}
	public function createMessages () : \ascio\v2\ArrayOfMessage {
		return $this->create ("messages", "\\ascio\\v2\\ArrayOfMessage");
	}
}