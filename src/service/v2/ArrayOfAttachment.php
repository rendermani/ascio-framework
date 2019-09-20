<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfAttachment

namespace ascio\service\v2;
use ascio\base\v2\DbArrayBase;
use ascio\db\v2\ArrayOfAttachmentDb;
use ascio\api\v2\ArrayOfAttachmentApi;
use ascio\base\ArrayInterface;


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
	public function current() : \ascio\v2\Attachment {
		return parent::current();
	}
	public function first() : \ascio\v2\Attachment {
		return parent::first();
	}
	public function last() : \ascio\v2\Attachment {
		return parent::last();
	}
	public function index($nr) : \ascio\v2\Attachment {
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
		return $this->get("Attachment", "\\ascio\\v2\\Attachment");
	}
	public function createAttachment () : \ascio\v2\Attachment {
		return $this->create ("Attachment", "\\ascio\\v2\\Attachment");
	}
	public function addAttachment () : \ascio\v2\Attachment {
		return $this->addItem(func_get_args(),"\\ascio\\v2\\Attachment");
	}
	public function addAttachments ($array) : self {
		return $this->add(func_get_args());
	}
}