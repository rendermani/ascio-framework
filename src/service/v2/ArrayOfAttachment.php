<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfAttachment

namespace ascio\service\v2;
use ascio\base\v2\DbArrayBase;
use ascio\db\v2\ArrayOfAttachmentDb;
use ascio\api\v2\ArrayOfAttachmentApi;


abstract class ArrayOfAttachment extends DbArrayBase  {

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
		return $this->get("Attachment", "\\ascio\\v2\\Attachment");
	}
	public function createAttachment () : \ascio\v2\Attachment {
		return $this->create ("Attachment", "\\ascio\\v2\\Attachment");
	}
	public function addAttachment () : \ascio\v2\Attachment {
		return $this->add("Attachment","\\ascio\\v2\\Attachment",func_get_args());
	}
}