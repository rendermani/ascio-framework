<?php

// XSLT-WSDL-Client. Generated PHP class of MarkOrderDocument

namespace ascio\service\v3;
use ascio\v3\Attachment;
use ascio\db\v3\MarkOrderDocumentDb;
use ascio\api\v3\MarkOrderDocumentApi;
use ascio\api\v3\AttachmentApi;


class MarkOrderDocument extends Attachment  {

	protected $_apiProperties=["FileName", "Content", "DocType"];
	protected $_apiObjects=[];
	protected $FileName;
	protected $Content;
	protected $DocType;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new MarkOrderDocumentDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param MarkOrderDocumentDb|null $db
	* @return MarkOrderDocumentDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setDocType (?string $DocType = null) : \ascio\v3\MarkOrderDocument {
		$this->set("DocType", $DocType);
		return $this;
	}
	public function getDocType () : ?string {
		return $this->get("DocType", "string");
	}
}