<?php

// XSLT-WSDL-Client. Generated PHP class of GetSslCertificates

namespace ascio\service\v3;
use ascio\db\v3\GetSslCertificatesDb;
use ascio\api\v3\GetSslCertificatesApi;
use ascio\base\v3\RequestRootElement;


class GetSslCertificates extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetSslCertificatesRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetSslCertificatesRequest {
		return $this->get("request", "\\ascio\\v3\\GetSslCertificatesRequest");
	}
	public function createRequest () : \ascio\v3\GetSslCertificatesRequest {
		return $this->create ("request", "\\ascio\\v3\\GetSslCertificatesRequest");
	}
}