<?php

// XSLT-WSDL-Client. Generated PHP class of GetSslCertificateRequest

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\GetSslCertificateRequestDb;
use ascio\api\v3\GetSslCertificateRequestApi;


class GetSslCertificateRequest extends DbBase  {

	protected $_apiProperties=["Handle"];
	protected $_apiObjects=[];
	protected $Handle;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetSslCertificateRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetSslCertificateRequestDb|null $db
	* @return GetSslCertificateRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setHandle (?string $Handle = null) : \ascio\v3\GetSslCertificateRequest {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
}