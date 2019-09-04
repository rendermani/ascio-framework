<?php

// XSLT-WSDL-Client. Generated PHP class of AutoInstallSslOrderRequest

namespace ascio\service\v3;
use ascio\v3\AbstractOrderRequest;
use ascio\db\v3\AutoInstallSslOrderRequestDb;
use ascio\api\v3\AutoInstallSslOrderRequestApi;
use ascio\api\v3\AbstractOrderRequestApi;


abstract class AutoInstallSslOrderRequest extends AbstractOrderRequest  {

	protected $_apiProperties=["Type", "Period", "TransactionComment", "Comments", "Documentation", "Options", "AutoInstallSsl"];
	protected $_apiObjects=["AutoInstallSsl"];
	protected $_substituted = true;
	protected $Type;
	protected $Period;
	protected $TransactionComment;
	protected $Comments;
	protected $Documentation;
	protected $Options;
	protected $AutoInstallSsl;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new AutoInstallSslOrderRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param AutoInstallSslOrderRequestDb|null $db
	* @return AutoInstallSslOrderRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setAutoInstallSsl (?\ascio\v3\AutoInstallSsl $AutoInstallSsl = null) : self {
		$this->set("AutoInstallSsl", $AutoInstallSsl);
		return $this;
	}
	public function getAutoInstallSsl () : ?\ascio\v3\AutoInstallSsl {
		return $this->get("AutoInstallSsl", "\\ascio\\v3\\AutoInstallSsl");
	}
	public function createAutoInstallSsl () : \ascio\v3\AutoInstallSsl {
		return $this->create ("AutoInstallSsl", "\\ascio\\v3\\AutoInstallSsl");
	}
}