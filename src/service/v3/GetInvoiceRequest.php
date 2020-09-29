<?php

// XSLT-WSDL-Client. Generated PHP class of GetInvoiceRequest

namespace ascio\service\v3;
use ascio\db\v3\GetInvoiceRequestDb;
use ascio\api\v3\GetInvoiceRequestApi;
use ascio\base\v3\Base;


class GetInvoiceRequest extends Base  {

	protected $_apiProperties=["InvoiceNo"];
	protected $_apiObjects=[];
	protected $InvoiceNo;

	public function setInvoiceNo (?int $InvoiceNo = null) : self {
		$this->set("InvoiceNo", $InvoiceNo);
		return $this;
	}
	public function getInvoiceNo () : ?int {
		return $this->get("InvoiceNo", "int");
	}
}