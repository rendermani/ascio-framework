<?php

// XSLT-WSDL-Client. Generated PHP class of GetInvoice

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\GetInvoiceDb;
use ascio\api\v3\GetInvoiceApi;


class GetInvoice extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetInvoiceRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetInvoiceRequest {
		return $this->get("request", "\\ascio\\v3\\GetInvoiceRequest");
	}
	public function createRequest () : \ascio\v3\GetInvoiceRequest {
		return $this->create ("request", "\\ascio\\v3\\GetInvoiceRequest");
	}
}