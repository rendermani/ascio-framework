<?php

// XSLT-WSDL-Client. Generated PHP class of GetSslCertificateResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetSslCertificateResponseDb;
use ascio\api\v3\GetSslCertificateResponseApi;
use ascio\api\v3\AbstractResponseApi;


class GetSslCertificateResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "SslCertificateInfo"];
	protected $_apiObjects=["Errors", "SslCertificateInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $SslCertificateInfo;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetSslCertificateResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetSslCertificateResponseDb|null $db
	* @return GetSslCertificateResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setSslCertificateInfo (?\ascio\v3\SslCertificateInfo $SslCertificateInfo = null) : \ascio\v3\GetSslCertificateResponse {
		$this->set("SslCertificateInfo", $SslCertificateInfo);
		return $this;
	}
	public function getSslCertificateInfo () : ?\ascio\v3\SslCertificateInfo {
		return $this->get("SslCertificateInfo", "\\ascio\\v3\\SslCertificateInfo");
	}
	public function createSslCertificateInfo () : \ascio\v3\SslCertificateInfo {
		return $this->create ("SslCertificateInfo", "\\ascio\\v3\\SslCertificateInfo");
	}
}