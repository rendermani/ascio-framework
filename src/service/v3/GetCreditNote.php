<?php

// XSLT-WSDL-Client. Generated PHP class of GetCreditNote

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\GetCreditNoteDb;
use ascio\api\v3\GetCreditNoteApi;


class GetCreditNote extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetCreditNoteRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetCreditNoteRequest {
		return $this->get("request", "\\ascio\\v3\\GetCreditNoteRequest");
	}
	public function createRequest () : \ascio\v3\GetCreditNoteRequest {
		return $this->create ("request", "\\ascio\\v3\\GetCreditNoteRequest");
	}
}