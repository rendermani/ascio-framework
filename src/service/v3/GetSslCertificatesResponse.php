<?php

// XSLT-WSDL-Client. Generated PHP class of GetSslCertificatesResponse

namespace ascio\service\v3;
use ascio\db\v3\GetSslCertificatesResponseDb;
use ascio\api\v3\GetSslCertificatesResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetSslCertificatesResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "SslCertificateInfos"];
	protected $_apiObjects=["Errors", "SslCertificateInfos"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $SslCertificateInfos;

	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setSslCertificateInfos (?\ascio\v3\ArrayOfSslCertificateInfo $SslCertificateInfos = null) : self {
		$this->set("SslCertificateInfos", $SslCertificateInfos);
		return $this;
	}
	public function getSslCertificateInfos () : ?\ascio\v3\ArrayOfSslCertificateInfo {
		return $this->get("SslCertificateInfos", "\\ascio\\v3\\ArrayOfSslCertificateInfo");
	}
	public function createSslCertificateInfos () : \ascio\v3\ArrayOfSslCertificateInfo {
		return $this->create ("SslCertificateInfos", "\\ascio\\v3\\ArrayOfSslCertificateInfo");
	}
}