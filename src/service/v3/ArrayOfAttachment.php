<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfAttachment

namespace ascio\service\v3;
use ascio\base\v3\DbArrayBase;
use ascio\db\v3\ArrayOfAttachmentDb;
use ascio\api\v3\ArrayOfAttachmentApi;


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
	/**
	* Array-Specific methods
	*/
	public function current() : \ascio\v3\Attachment {
		return parent::current();
	}
	public function first() : \ascio\v3\Attachment {
		return parent::first();
	}
	public function last() : \ascio\v3\Attachment {
		return parent::last();
	}
	public function index($nr) : \ascio\v3\Attachment {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
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
	public function addAttachment () : \ascio\v3\Attachment {
		return $this->add("Attachment","\\ascio\\v3\\Attachment",func_get_args());
	}
}