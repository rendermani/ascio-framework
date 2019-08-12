<?php

// XSLT-WSDL-Client. Generated PHP class of GetAutoInstallSslResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetAutoInstallSslResponseDb;
use ascio\api\v3\GetAutoInstallSslResponseApi;
use ascio\api\v3\AbstractResponseApi;


class GetAutoInstallSslResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "AutoInstallSslInfo"];
	protected $_apiObjects=["Errors", "AutoInstallSslInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $AutoInstallSslInfo;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetAutoInstallSslResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetAutoInstallSslResponseDb|null $db
	* @return GetAutoInstallSslResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setAutoInstallSslInfo (?\ascio\v3\AutoInstallSslInfo $AutoInstallSslInfo = null) : \ascio\v3\GetAutoInstallSslResponse {
		$this->set("AutoInstallSslInfo", $AutoInstallSslInfo);
		return $this;
	}
	public function getAutoInstallSslInfo () : ?\ascio\v3\AutoInstallSslInfo {
		return $this->get("AutoInstallSslInfo", "\\ascio\\v3\\AutoInstallSslInfo");
	}
	public function createAutoInstallSslInfo () : \ascio\v3\AutoInstallSslInfo {
		return $this->create ("AutoInstallSslInfo", "\\ascio\\v3\\AutoInstallSslInfo");
	}
}