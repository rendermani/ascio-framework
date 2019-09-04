<?php

// XSLT-WSDL-Client. Generated PHP class of GetQueueMessageResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetQueueMessageResponseDb;
use ascio\api\v3\GetQueueMessageResponseApi;
use ascio\api\v3\AbstractResponseApi;


abstract class GetQueueMessageResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "Message"];
	protected $_apiObjects=["Errors", "Message"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $Message;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetQueueMessageResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetQueueMessageResponseDb|null $db
	* @return GetQueueMessageResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setMessage (?\ascio\v3\QueueMessage $Message = null) : self {
		$this->set("Message", $Message);
		return $this;
	}
	public function getMessage () : ?\ascio\v3\QueueMessage {
		return $this->get("Message", "\\ascio\\v3\\QueueMessage");
	}
	public function createMessage () : \ascio\v3\QueueMessage {
		return $this->create ("Message", "\\ascio\\v3\\QueueMessage");
	}
}