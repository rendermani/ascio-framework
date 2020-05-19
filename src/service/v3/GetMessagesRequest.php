<?php

// XSLT-WSDL-Client. Generated PHP class of GetMessagesRequest

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\GetMessagesRequestDb;
use ascio\api\v3\GetMessagesRequestApi;


class GetMessagesRequest extends DbBase  {

	protected $_apiProperties=["OrderId", "IncludeAttachmentContent"];
	protected $_apiObjects=[];
	protected $OrderId;
	protected $IncludeAttachmentContent;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetMessagesRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetMessagesRequestDb|null $db
	* @return GetMessagesRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setOrderId (?string $OrderId = null) : self {
		$this->set("OrderId", $OrderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("OrderId", "string");
	}
	public function setIncludeAttachmentContent (?bool $IncludeAttachmentContent = null) : self {
		$this->set("IncludeAttachmentContent", $IncludeAttachmentContent);
		return $this;
	}
	public function getIncludeAttachmentContent () : ?bool {
		return $this->get("IncludeAttachmentContent", "bool");
	}
}