<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfMarkOrderDocument

namespace ascio\service\v3;
use ascio\base\v3\DbArrayBase;
use ascio\db\v3\ArrayOfMarkOrderDocumentDb;
use ascio\api\v3\ArrayOfMarkOrderDocumentApi;


class ArrayOfMarkOrderDocument extends DbArrayBase  {

	protected $_apiProperties=["MarkOrderDocument"];
	protected $_apiObjects=["MarkOrderDocument"];
	protected $MarkOrderDocument;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfMarkOrderDocumentDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ArrayOfMarkOrderDocumentDb|null $db
	* @return ArrayOfMarkOrderDocumentDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setMarkOrderDocument (?Iterable $MarkOrderDocument = null) : self {
		$this->set("MarkOrderDocument", $MarkOrderDocument);
		return $this;
	}
	public function getMarkOrderDocument () : ?Iterable {
		return $this->get("MarkOrderDocument", "\\ascio\\v3\\MarkOrderDocument");
	}
	public function createMarkOrderDocument () : \ascio\v3\MarkOrderDocument {
		return $this->create ("MarkOrderDocument", "\\ascio\\v3\\MarkOrderDocument");
	}
	public function addMarkOrderDocument () : \ascio\v3\MarkOrderDocument {
		return $this->add("MarkOrderDocument","\\ascio\\v3\\MarkOrderDocument",func_get_args());
	}
}