<?php

// XSLT-WSDL-Client. Generated PHP class of GetCreditNoteRequest

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\GetCreditNoteRequestDb;
use ascio\api\v3\GetCreditNoteRequestApi;


class GetCreditNoteRequest extends Base  {

	protected $_apiProperties=["CreditNo"];
	protected $_apiObjects=[];
	protected $CreditNo;

	public function setCreditNo (?int $CreditNo = null) : self {
		$this->set("CreditNo", $CreditNo);
		return $this;
	}
	public function getCreditNo () : ?int {
		return $this->get("CreditNo", "int");
	}
}