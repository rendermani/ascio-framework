<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfAttachment

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfAttachmentDb;
use ascio\api\v3\ArrayOfAttachmentApi;
use ascio\base\v3\DbArrayBase;


class ArrayOfAttachment extends DbArrayBase  {

	protected $_apiProperties=["Attachment"];
	protected $_apiObjects=["Attachment"];
	protected $Attachment;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfAttachmentDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ArrayOfAttachmentDb|null $db
	* @return ArrayOfAttachmentDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setAttachment (?Iterable $Attachment = null) : self {
		$this->set("Attachment", $Attachment);
		return $this;
	}
	public function getAttachment () : ?Iterable {
		return $this->get("Attachment", "\\ascio\\v3\\Attachment");
	}
	public function createAttachment () : \ascio\v3\Attachment {
		return $this->create ("Attachment", "\\ascio\\v3\\Attachment");
	}
	public function addAttachment ($item = null) : \ascio\v3\Attachment {
		return $this->addItem("Attachment","\\ascio\\v3\\Attachment",func_get_args());
	}
}