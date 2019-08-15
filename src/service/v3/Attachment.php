<?php

// XSLT-WSDL-Client. Generated PHP class of Attachment

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\AttachmentDb;
use ascio\api\v3\AttachmentApi;


class Attachment extends DbBase  {

	protected $_apiProperties=["FileName", "Content"];
	protected $_apiObjects=[];
	protected $_substitutions = [
		["name" => "MarkOrderDocument","type" => "\\ascio\\v3\\MarkOrderDocument"] 
	];

	protected $FileName;
	protected $Content;

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
	public function setFileName (?string $FileName = null) : self {
		$this->set("FileName", $FileName);
		return $this;
	}
	public function getFileName () : ?string {
		return $this->get("FileName", "string");
	}
	public function setContent (?\base64Binary $Content = null) : self {
		$this->set("Content", $Content);
		return $this;
	}
	public function getContent () : ?\base64Binary {
		return $this->get("Content", "\\base64Binary");
	}
}