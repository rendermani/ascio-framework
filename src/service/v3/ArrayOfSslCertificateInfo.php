<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfSslCertificateInfo

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfSslCertificateInfoDb;
use ascio\api\v3\ArrayOfSslCertificateInfoApi;
use ascio\base\v3\ArrayBase;


class ArrayOfSslCertificateInfo extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["SslCertificateInfo"];
	protected $_apiObjects=["SslCertificateInfo"];
	protected $SslCertificateInfo;

	public function setSslCertificateInfo (?Iterable $SslCertificateInfo = null) : self {
		$this->set("SslCertificateInfo", $SslCertificateInfo);
		return $this;
	}
	public function getSslCertificateInfo () : ?Iterable {
		return $this->get("SslCertificateInfo", "\\ascio\\v3\\SslCertificateInfo");
	}
	public function createSslCertificateInfo () : \ascio\v3\SslCertificateInfo {
		return $this->create ("SslCertificateInfo", "\\ascio\\v3\\SslCertificateInfo");
	}
	public function addSslCertificateInfo ($item = null) : \ascio\v3\SslCertificateInfo {
		return $this->addItem("SslCertificateInfo","\\ascio\\v3\\SslCertificateInfo",func_get_args());
	}
}