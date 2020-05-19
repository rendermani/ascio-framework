<?php

// XSLT-WSDL-Client. Generated PHP class of GetInvoiceRequest

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\GetInvoiceRequestDb;
use ascio\api\v3\GetInvoiceRequestApi;


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