<?php

// XSLT-WSDL-Client. Generated PHP class of SslCertificateOrderRequest

namespace ascio\service\v3;
use ascio\v3\AbstractOrderRequest;
use ascio\db\v3\SslCertificateOrderRequestDb;
use ascio\api\v3\SslCertificateOrderRequestApi;
use ascio\api\v3\AbstractOrderRequestApi;


class SslCertificateOrderRequest extends AbstractOrderRequest  {

	protected $_apiProperties=["Type", "Period", "TransactionComment", "Comments", "Documentation", "Options", "SslCertificate"];
	protected $_apiObjects=["SslCertificate"];
	protected $_substituted = true;
	protected $Type;
	protected $Period;
	protected $TransactionComment;
	protected $Comments;
	protected $Documentation;
	protected $Options;
	protected $SslCertificate;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new SslCertificateOrderRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param SslCertificateOrderRequestDb|null $db
	* @return SslCertificateOrderRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setSslCertificate (?\ascio\v3\SslCertificate $SslCertificate = null) : self {
		$this->set("SslCertificate", $SslCertificate);
		return $this;
	}
	public function getSslCertificate () : ?\ascio\v3\SslCertificate {
		return $this->get("SslCertificate", "\\ascio\\v3\\SslCertificate");
	}
	public function createSslCertificate () : \ascio\v3\SslCertificate {
		return $this->create ("SslCertificate", "\\ascio\\v3\\SslCertificate");
	}
}