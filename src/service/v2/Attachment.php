<?php

// XSLT-WSDL-Client. Generated PHP class of Attachment

namespace ascio\service\v2;
use ascio\base\v2\DbBase;
use ascio\db\v2\AttachmentDb;
use ascio\api\v2\AttachmentApi;


class Attachment extends DbBase  {

	protected $_apiProperties=["Data", "FileName"];
	protected $_apiObjects=[];
	protected $Data;
	protected $FileName;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new AttachmentDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param AttachmentDb|null $db
	* @return AttachmentDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setData (?\base64Binary $Data = null) : \ascio\v2\Attachment {
		$this->set("Data", $Data);
		return $this;
	}
	public function getData () : ?\base64Binary {
		return $this->get("Data", "\\base64Binary");
	}
	public function setFileName (?string $FileName = null) : \ascio\v2\Attachment {
		$this->set("FileName", $FileName);
		return $this;
	}
	public function getFileName () : ?string {
		return $this->get("FileName", "string");
	}
}