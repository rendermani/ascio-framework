<?php

// XSLT-WSDL-Client. Generated PHP class of AbstractResponse

namespace ascio\service\v3;
use ascio\db\v3\AbstractResponseDb;
use ascio\api\v3\AbstractResponseApi;
use ascio\base\v3\DbBase;


class AbstractResponse extends DbBase  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors"];
	protected $_apiObjects=["Errors"];
	protected $_substitutions = [
		["name" => "CreateOrderResponse","type" => "\\ascio\\v3\\CreateOrderResponse"], 
		["name" => "ValidateOrderResponse","type" => "\\ascio\\v3\\ValidateOrderResponse"], 
		["name" => "GetOrderResponse","type" => "\\ascio\\v3\\GetOrderResponse"], 
		["name" => "GetOrdersResponse","type" => "\\ascio\\v3\\GetOrdersResponse"], 
		["name" => "GetDomainsResponse","type" => "\\ascio\\v3\\GetDomainsResponse"], 
		["name" => "GetPremiumDomainsResponse","type" => "\\ascio\\v3\\GetPremiumDomainsResponse"], 
		["name" => "GetDomainResponse","type" => "\\ascio\\v3\\GetDomainResponse"], 
		["name" => "AvailabilityInfoResponse","type" => "\\ascio\\v3\\AvailabilityInfoResponse"], 
		["name" => "GetPricesResponse","type" => "\\ascio\\v3\\GetPricesResponse"], 
		["name" => "GetPriceHistoryResponse","type" => "\\ascio\\v3\\GetPriceHistoryResponse"], 
		["name" => "GetAccountBalanceResponse","type" => "\\ascio\\v3\\GetAccountBalanceResponse"], 
		["name" => "GetAccountTransactionsResponse","type" => "\\ascio\\v3\\GetAccountTransactionsResponse"], 
		["name" => "GetSalesLinesResponse","type" => "\\ascio\\v3\\GetSalesLinesResponse"], 
		["name" => "GetSubUsersResponse","type" => "\\ascio\\v3\\GetSubUsersResponse"], 
		["name" => "GetSubUserResponse","type" => "\\ascio\\v3\\GetSubUserResponse"], 
		["name" => "DeleteSubUserResponse","type" => "\\ascio\\v3\\DeleteSubUserResponse"], 
		["name" => "CreateSubUserResponse","type" => "\\ascio\\v3\\CreateSubUserResponse"], 
		["name" => "UpdateSubUserResponse","type" => "\\ascio\\v3\\UpdateSubUserResponse"], 
		["name" => "GetInvoiceResponse","type" => "\\ascio\\v3\\GetInvoiceResponse"], 
		["name" => "GetCreditNoteResponse","type" => "\\ascio\\v3\\GetCreditNoteResponse"], 
		["name" => "GetRegistrantResponse","type" => "\\ascio\\v3\\GetRegistrantResponse"], 
		["name" => "GetContactResponse","type" => "\\ascio\\v3\\GetContactResponse"], 
		["name" => "CreateContactResponse","type" => "\\ascio\\v3\\CreateContactResponse"], 
		["name" => "CreateRegistrantResponse","type" => "\\ascio\\v3\\CreateRegistrantResponse"], 
		["name" => "CreateNameServerResponse","type" => "\\ascio\\v3\\CreateNameServerResponse"], 
		["name" => "CreateDnsSecKeyResponse","type" => "\\ascio\\v3\\CreateDnsSecKeyResponse"], 
		["name" => "GetNameServerResponse","type" => "\\ascio\\v3\\GetNameServerResponse"], 
		["name" => "GetDnsSecKeyResponse","type" => "\\ascio\\v3\\GetDnsSecKeyResponse"], 
		["name" => "GetRegistrantsResponse","type" => "\\ascio\\v3\\GetRegistrantsResponse"], 
		["name" => "GetContactsResponse","type" => "\\ascio\\v3\\GetContactsResponse"], 
		["name" => "GetNameServersResponse","type" => "\\ascio\\v3\\GetNameServersResponse"], 
		["name" => "GetDnsSecKeysResponse","type" => "\\ascio\\v3\\GetDnsSecKeysResponse"], 
		["name" => "GetSslCertificatesResponse","type" => "\\ascio\\v3\\GetSslCertificatesResponse"], 
		["name" => "GetMarksResponse","type" => "\\ascio\\v3\\GetMarksResponse"], 
		["name" => "GetMarkResponse","type" => "\\ascio\\v3\\GetMarkResponse"], 
		["name" => "GetDefensiveResponse","type" => "\\ascio\\v3\\GetDefensiveResponse"], 
		["name" => "GetNameWatchResponse","type" => "\\ascio\\v3\\GetNameWatchResponse"], 
		["name" => "GetSslCertificateResponse","type" => "\\ascio\\v3\\GetSslCertificateResponse"], 
		["name" => "GetSslApproversResponse","type" => "\\ascio\\v3\\GetSslApproversResponse"], 
		["name" => "GetAutoInstallSslResponse","type" => "\\ascio\\v3\\GetAutoInstallSslResponse"], 
		["name" => "GetMessagesResponse","type" => "\\ascio\\v3\\GetMessagesResponse"], 
		["name" => "GetAttachmentResponse","type" => "\\ascio\\v3\\GetAttachmentResponse"], 
		["name" => "PollQueueResponse","type" => "\\ascio\\v3\\PollQueueResponse"], 
		["name" => "AckQueueMessageResponse","type" => "\\ascio\\v3\\AckQueueMessageResponse"], 
		["name" => "GetQueueMessageResponse","type" => "\\ascio\\v3\\GetQueueMessageResponse"], 
		["name" => "UploadDocumentationResponse","type" => "\\ascio\\v3\\UploadDocumentationResponse"], 
		["name" => "UploadMessageResponse","type" => "\\ascio\\v3\\UploadMessageResponse"] 
	];

	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new AbstractResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param AbstractResponseDb|null $db
	* @return AbstractResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setResultCode (?int $ResultCode = null) : self {
		$this->set("ResultCode", $ResultCode);
		return $this;
	}
	public function getResultCode () : ?int {
		return $this->get("ResultCode", "int");
	}
	public function setResultMessage (?string $ResultMessage = null) : self {
		$this->set("ResultMessage", $ResultMessage);
		return $this;
	}
	public function getResultMessage () : ?string {
		return $this->get("ResultMessage", "string");
	}
	public function setErrors (?\ascio\v3\ArrayOfstring $Errors = null) : self {
		$this->set("Errors", $Errors);
		return $this;
	}
	public function getErrors () : ?\ascio\v3\ArrayOfstring {
		return $this->get("Errors", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createErrors () : \ascio\v3\ArrayOfstring {
		return $this->create ("Errors", "\\ascio\\v3\\ArrayOfstring");
	}
}