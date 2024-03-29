<?php

// XSLT-WSDL-Client. Generated PHP class of GetAutoInstallSslRequest

namespace ascio\service\v3;
use ascio\db\v3\GetAutoInstallSslRequestDb;
use ascio\api\v3\GetAutoInstallSslRequestApi;
use ascio\base\v3\DbBase;


class GetAutoInstallSslRequest extends DbBase  {

	protected $_apiProperties=["Handle"];
	protected $_apiObjects=[];
	protected $Handle;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetAutoInstallSslRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetAutoInstallSslRequestDb|null $db
	* @return GetAutoInstallSslRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
}