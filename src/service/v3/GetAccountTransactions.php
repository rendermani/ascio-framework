<?php

// XSLT-WSDL-Client. Generated PHP class of GetAccountTransactions

namespace ascio\service\v3;
use ascio\db\v3\GetAccountTransactionsDb;
use ascio\api\v3\GetAccountTransactionsApi;
use ascio\base\v3\RequestRootElement;


class GetAccountTransactions extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetAccountTransactionsRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetAccountTransactionsRequest {
		return $this->get("request", "\\ascio\\v3\\GetAccountTransactionsRequest");
	}
	public function createRequest () : \ascio\v3\GetAccountTransactionsRequest {
		return $this->create ("request", "\\ascio\\v3\\GetAccountTransactionsRequest");
	}
}