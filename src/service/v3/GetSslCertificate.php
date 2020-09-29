<?php

// XSLT-WSDL-Client. Generated PHP class of GetSslCertificate

namespace ascio\service\v3;
use ascio\db\v3\GetSslCertificateDb;
use ascio\api\v3\GetSslCertificateApi;
use ascio\base\v3\DbBase;


class GetSslCertificate extends DbBase  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetSslCertificateDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetSslCertificateDb|null $db
	* @return GetSslCertificateDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRequest (?\ascio\v3\GetSslCertificateRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetSslCertificateRequest {
		return $this->get("request", "\\ascio\\v3\\GetSslCertificateRequest");
	}
	public function createRequest () : \ascio\v3\GetSslCertificateRequest {
		return $this->create ("request", "\\ascio\\v3\\GetSslCertificateRequest");
	}
}