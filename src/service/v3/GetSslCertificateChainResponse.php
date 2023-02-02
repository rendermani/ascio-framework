<?php

// XSLT-WSDL-Client. Generated PHP class of GetSslCertificateChainResponse

namespace ascio\service\v3;
use ascio\db\v3\GetSslCertificateChainResponseDb;
use ascio\api\v3\GetSslCertificateChainResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetSslCertificateChainResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "Attachment"];
	protected $_apiObjects=["Errors", "Attachment"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $Attachment;

	public function setAttachment (?\ascio\v3\Attachment $Attachment = null) : self {
		$this->set("Attachment", $Attachment);
		return $this;
	}
	public function getAttachment () : ?\ascio\v3\Attachment {
		return $this->get("Attachment", "\\ascio\\v3\\Attachment");
	}
	public function createAttachment () : \ascio\v3\Attachment {
		return $this->create ("Attachment", "\\ascio\\v3\\Attachment");
	}
}