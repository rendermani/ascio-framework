<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfAccountTransactions

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfAccountTransactionsDb;
use ascio\api\v3\ArrayOfAccountTransactionsApi;
use ascio\base\v3\ArrayBase;


class ArrayOfAccountTransactions extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["AccountTransaction"];
	protected $_apiObjects=["AccountTransaction"];
	protected $AccountTransaction;

	public function setAccountTransaction (?Iterable $AccountTransaction = null) : self {
		$this->set("AccountTransaction", $AccountTransaction);
		return $this;
	}
	public function getAccountTransaction () : ?Iterable {
		return $this->get("AccountTransaction", "\\ascio\\v3\\AccountTransaction");
	}
	public function createAccountTransaction () : \ascio\v3\AccountTransaction {
		return $this->create ("AccountTransaction", "\\ascio\\v3\\AccountTransaction");
	}
	public function addAccountTransaction ($item = null) : \ascio\v3\AccountTransaction {
		return $this->addItem("AccountTransaction","\\ascio\\v3\\AccountTransaction",func_get_args());
	}
}