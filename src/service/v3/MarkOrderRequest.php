<?php

// XSLT-WSDL-Client. Generated PHP class of MarkOrderRequest

namespace ascio\service\v3;
use ascio\v3\AbstractOrderRequest;
use ascio\db\v3\MarkOrderRequestDb;
use ascio\api\v3\MarkOrderRequestApi;
use ascio\api\v3\AbstractOrderRequestApi;


class MarkOrderRequest extends AbstractOrderRequest  {

	protected $_apiProperties=["Type", "Period", "TransactionComment", "Comments", "Documentation", "Options", "Mark", "Documents"];
	protected $_apiObjects=["Mark", "Documents"];
	protected $_substituted = true;
	protected $Type;
	protected $Period;
	protected $TransactionComment;
	protected $Comments;
	protected $Documentation;
	protected $Options;
	protected $Mark;
	protected $Documents;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new MarkOrderRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param MarkOrderRequestDb|null $db
	* @return MarkOrderRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setMark (?\ascio\v3\AbstractMark $Mark = null) : self {
		$this->set("Mark", $Mark);
		return $this;
	}
	public function getMark () : ?\ascio\v3\AbstractMark {
		return $this->get("Mark", "\\ascio\\v3\\AbstractMark");
	}
	public function createMark () : \ascio\v3\AbstractMark {
		return $this->create ("Mark", "\\ascio\\v3\\AbstractMark");
	}
	public function setDocuments (?\ascio\v3\ArrayOfMarkOrderDocument $Documents = null) : self {
		$this->set("Documents", $Documents);
		return $this;
	}
	public function getDocuments () : ?\ascio\v3\ArrayOfMarkOrderDocument {
		return $this->get("Documents", "\\ascio\\v3\\ArrayOfMarkOrderDocument");
	}
	public function createDocuments () : \ascio\v3\ArrayOfMarkOrderDocument {
		return $this->create ("Documents", "\\ascio\\v3\\ArrayOfMarkOrderDocument");
	}
}