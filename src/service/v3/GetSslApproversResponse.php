<?php

// XSLT-WSDL-Client. Generated PHP class of GetSslApproversResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetSslApproversResponseDb;
use ascio\api\v3\GetSslApproversResponseApi;
use ascio\api\v3\AbstractResponseApi;


class GetSslApproversResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "ApproverEmails"];
	protected $_apiObjects=["Errors", "ApproverEmails"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $ApproverEmails;

	public function setApproverEmails (?\ascio\v3\ArrayOfstring $ApproverEmails = null) : self {
		$this->set("ApproverEmails", $ApproverEmails);
		return $this;
	}
	public function getApproverEmails () : ?\ascio\v3\ArrayOfstring {
		return $this->get("ApproverEmails", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createApproverEmails () : \ascio\v3\ArrayOfstring {
		return $this->create ("ApproverEmails", "\\ascio\\v3\\ArrayOfstring");
	}
}