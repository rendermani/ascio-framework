<?php

// XSLT-WSDL-Client. Generated PHP class of GetMessagesResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetMessagesResponseDb;
use ascio\api\v3\GetMessagesResponseApi;
use ascio\api\v3\AbstractResponseApi;


abstract class GetMessagesResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "Messages"];
	protected $_apiObjects=["Errors", "Messages"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $Messages;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetMessagesResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetMessagesResponseDb|null $db
	* @return GetMessagesResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setMessages (?\ascio\v3\ArrayOfMessage $Messages = null) : self {
		$this->set("Messages", $Messages);
		return $this;
	}
	public function getMessages () : ?\ascio\v3\ArrayOfMessage {
		return $this->get("Messages", "\\ascio\\v3\\ArrayOfMessage");
	}
	public function createMessages () : \ascio\v3\ArrayOfMessage {
		return $this->create ("Messages", "\\ascio\\v3\\ArrayOfMessage");
	}
}