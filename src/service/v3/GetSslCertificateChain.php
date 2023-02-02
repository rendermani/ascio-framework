<?php

// XSLT-WSDL-Client. Generated PHP class of GetSslCertificateChain

namespace ascio\service\v3;
use ascio\db\v3\GetSslCertificateChainDb;
use ascio\api\v3\GetSslCertificateChainApi;
use ascio\base\v3\RequestRootElement;


class GetSslCertificateChain extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetSslCertificateChainRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetSslCertificateChainRequest {
		return $this->get("request", "\\ascio\\v3\\GetSslCertificateChainRequest");
	}
	public function createRequest () : \ascio\v3\GetSslCertificateChainRequest {
		return $this->create ("request", "\\ascio\\v3\\GetSslCertificateChainRequest");
	}
}