<?php

// XSLT-WSDL-Client. Generated PHP class of AckQueueMessageResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\AckQueueMessageResponseDb;
use ascio\api\v3\AckQueueMessageResponseApi;
use ascio\api\v3\AbstractResponseApi;


abstract class AckQueueMessageResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors"];
	protected $_apiObjects=["Errors"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new AckQueueMessageResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param AckQueueMessageResponseDb|null $db
	* @return AckQueueMessageResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
}