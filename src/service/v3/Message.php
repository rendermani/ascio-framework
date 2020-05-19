<?php

// XSLT-WSDL-Client. Generated PHP class of Message

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\MessageDb;
use ascio\api\v3\MessageApi;


class Message extends DbBase  {

	protected $_apiProperties=["Attachments", "Body", "Created", "FromAddress", "Subject", "ToAddress", "Type"];
	protected $_apiObjects=["Attachments"];
	protected $Attachments;
	protected $Body;
	protected $Created;
	protected $FromAddress;
	protected $Subject;
	protected $ToAddress;
	protected $Type;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new MessageDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param MessageDb|null $db
	* @return MessageDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setAttachments (?\ascio\v3\ArrayOfAttachment $Attachments = null) : self {
		$this->set("Attachments", $Attachments);
		return $this;
	}
	public function getAttachments () : ?\ascio\v3\ArrayOfAttachment {
		return $this->get("Attachments", "\\ascio\\v3\\ArrayOfAttachment");
	}
	public function createAttachments () : \ascio\v3\ArrayOfAttachment {
		return $this->create ("Attachments", "\\ascio\\v3\\ArrayOfAttachment");
	}
	public function setBody (?string $Body = null) : self {
		$this->set("Body", $Body);
		return $this;
	}
	public function getBody () : ?string {
		return $this->get("Body", "string");
	}
	public function setCreated (?\DateTime $Created = null) : self {
		$this->set("Created", $Created);
		return $this;
	}
	public function getCreated () : ?\DateTime {
		return $this->get("Created", "\\DateTime");
	}
	public function setFromAddress (?string $FromAddress = null) : self {
		$this->set("FromAddress", $FromAddress);
		return $this;
	}
	public function getFromAddress () : ?string {
		return $this->get("FromAddress", "string");
	}
	public function setSubject (?string $Subject = null) : self {
		$this->set("Subject", $Subject);
		return $this;
	}
	public function getSubject () : ?string {
		return $this->get("Subject", "string");
	}
	public function setToAddress (?string $ToAddress = null) : self {
		$this->set("ToAddress", $ToAddress);
		return $this;
	}
	public function getToAddress () : ?string {
		return $this->get("ToAddress", "string");
	}
	public function setType (?string $Type = null) : self {
		$this->set("Type", $Type);
		return $this;
	}
	public function getType () : ?string {
		return $this->get("Type", "string");
	}
}