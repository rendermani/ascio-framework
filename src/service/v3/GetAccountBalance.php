<?php

// XSLT-WSDL-Client. Generated PHP class of GetAccountBalance

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\GetAccountBalanceDb;
use ascio\api\v3\GetAccountBalanceApi;


class GetAccountBalance extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return GetAccountBalanceApi
	*/
	public function api($api = null) {
		if(!$api) {
			return $this->_api;
		}
		$this->_api = $api;
		return $api;
	}
	public function setRequest (?\ascio\v3\GetAccountBalanceRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetAccountBalanceRequest {
		return $this->get("request", "\\ascio\\v3\\GetAccountBalanceRequest");
	}
	public function createRequest () : \ascio\v3\GetAccountBalanceRequest {
		return $this->create ("request", "\\ascio\\v3\\GetAccountBalanceRequest");
	}
}