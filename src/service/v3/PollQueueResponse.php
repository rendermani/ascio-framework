<?php

// XSLT-WSDL-Client. Generated PHP class of PollQueueResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\PollQueueResponseDb;
use ascio\api\v3\PollQueueResponseApi;
use ascio\api\v3\AbstractResponseApi;


class PollQueueResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "Message"];
	protected $_apiObjects=["Errors", "Message"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $Message;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new PollQueueResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param PollQueueResponseDb|null $db
	* @return PollQueueResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setTotalCount (?int $TotalCount = null) : \ascio\v3\PollQueueResponse {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setMessage (?\ascio\v3\QueueMessage $Message = null) : \ascio\v3\PollQueueResponse {
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