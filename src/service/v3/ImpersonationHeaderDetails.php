<?php

// XSLT-WSDL-Client. Generated PHP class of ImpersonationHeaderDetails

namespace ascio\service\v3;
use ascio\db\v3\ImpersonationHeaderDetailsDb;
use ascio\api\v3\ImpersonationHeaderDetailsApi;
use ascio\base\v3\Base;


class ImpersonationHeaderDetails extends Base  {

	protected $_apiProperties=["TransactionAccount"];
	protected $_apiObjects=[];
	protected $TransactionAccount;

	public function setTransactionAccount (?string $TransactionAccount = null) : self {
		$this->set("TransactionAccount", $TransactionAccount);
		return $this;
	}
	public function getTransactionAccount () : ?string {
		return $this->get("TransactionAccount", "string");
	}
}