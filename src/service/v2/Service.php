<?php

// XSLT-WSDL-Client. Generated PHP class of Service

namespace ascio\service\v2;
use ascio\base\v2\ServiceBase;
use ascio\db\v2\ServiceDb;
use ascio\api\v2\ServiceApi;


abstract class Service extends ServiceBase  {
	protected $classmap = [
		"Session" => "ascio\\v2\\Session",
		"Response" => "ascio\\v2\\Response",
		"Order" => "ascio\\v2\\Order",
		"Domain" => "ascio\\v2\\Domain",
		"Registrant" => "ascio\\v2\\Registrant",
		"Contact" => "ascio\\v2\\Contact",
		"NameServers" => "ascio\\v2\\NameServers",
		"NameServer" => "ascio\\v2\\NameServer",
		"TradeMark" => "ascio\\v2\\TradeMark",
		"DnsSecKeys" => "ascio\\v2\\DnsSecKeys",
		"DnsSecKey" => "ascio\\v2\\DnsSecKey",
		"PrivacyProxy" => "ascio\\v2\\PrivacyProxy",
		"Extensions" => "ascio\\v2\\Extensions",
		"SearchOrderRequest" => "ascio\\v2\\SearchOrderRequest",
		"ArrayOfOrderType" => "ascio\\v2\\ArrayOfOrderType",
		"ArrayOfOrderStatusType" => "ascio\\v2\\ArrayOfOrderStatusType",
		"PagingInfo" => "ascio\\v2\\PagingInfo",
		"ArrayOfOrder" => "ascio\\v2\\ArrayOfOrder",
		"ArrayOfMessage" => "ascio\\v2\\ArrayOfMessage",
		"Message" => "ascio\\v2\\Message",
		"ArrayOfAttachment" => "ascio\\v2\\ArrayOfAttachment",
		"Attachment" => "ascio\\v2\\Attachment",
		"SearchCriteria" => "ascio\\v2\\SearchCriteria",
		"ArrayOfClause" => "ascio\\v2\\ArrayOfClause",
		"Clause" => "ascio\\v2\\Clause",
		"ArrayOfDomain" => "ascio\\v2\\ArrayOfDomain",
		"ArrayOfString" => "ascio\\v2\\ArrayOfString",
		"ArrayOfAvailabilityCheckResult" => "ascio\\v2\\ArrayOfAvailabilityCheckResult",
		"AvailabilityCheckResult" => "ascio\\v2\\AvailabilityCheckResult",
		"PriceInfo" => "ascio\\v2\\PriceInfo",
		"ArrayOfPrices" => "ascio\\v2\\ArrayOfPrices",
		"Price" => "ascio\\v2\\Price",
		"ArrayOfRegistrant" => "ascio\\v2\\ArrayOfRegistrant",
		"RegistrantVerificationInfo" => "ascio\\v2\\RegistrantVerificationInfo",
		"RegistrantVerificationDetails" => "ascio\\v2\\RegistrantVerificationDetails",
		"ArrayOfContact" => "ascio\\v2\\ArrayOfContact",
		"ArrayOfNameServer" => "ascio\\v2\\ArrayOfNameServer",
		"QueueItem" => "ascio\\v2\\QueueItem",
		"ArrayOfCallbackStatus" => "ascio\\v2\\ArrayOfCallbackStatus",
		"CallbackStatus" => "ascio\\v2\\CallbackStatus",
		"ArrayOfDnsSecKey" => "ascio\\v2\\ArrayOfDnsSecKey",
		"ApprovalDocumentation" => "ascio\\v2\\ApprovalDocumentation",
		"LogIn" => "ascio\\v2\\LogIn",
		"LogInResponse" => "ascio\\v2\\LogInResponse",
		"LogOut" => "ascio\\v2\\LogOut",
		"LogOutResponse" => "ascio\\v2\\LogOutResponse",
		"GetOrder" => "ascio\\v2\\GetOrder",
		"GetOrderResponse" => "ascio\\v2\\GetOrderResponse",
		"CreateOrder" => "ascio\\v2\\CreateOrder",
		"CreateOrderResponse" => "ascio\\v2\\CreateOrderResponse",
		"SearchOrder" => "ascio\\v2\\SearchOrder",
		"SearchOrderResponse" => "ascio\\v2\\SearchOrderResponse",
		"GetMessages" => "ascio\\v2\\GetMessages",
		"GetMessagesResponse" => "ascio\\v2\\GetMessagesResponse",
		"ValidateOrder" => "ascio\\v2\\ValidateOrder",
		"ValidateOrderResponse" => "ascio\\v2\\ValidateOrderResponse",
		"UploadDocumentation" => "ascio\\v2\\UploadDocumentation",
		"UploadDocumentationResponse" => "ascio\\v2\\UploadDocumentationResponse",
		"CreateSupportOrder" => "ascio\\v2\\CreateSupportOrder",
		"CreateSupportOrderResponse" => "ascio\\v2\\CreateSupportOrderResponse",
		"UploadMessage" => "ascio\\v2\\UploadMessage",
		"UploadMessageResponse" => "ascio\\v2\\UploadMessageResponse",
		"GetDomain" => "ascio\\v2\\GetDomain",
		"GetDomainResponse" => "ascio\\v2\\GetDomainResponse",
		"SearchDomain" => "ascio\\v2\\SearchDomain",
		"SearchDomainResponse" => "ascio\\v2\\SearchDomainResponse",
		"Whois" => "ascio\\v2\\Whois",
		"WhoisResponse" => "ascio\\v2\\WhoisResponse",
		"AvailabilityCheck" => "ascio\\v2\\AvailabilityCheck",
		"AvailabilityCheckResponse" => "ascio\\v2\\AvailabilityCheckResponse",
		"AvailabilityInfo" => "ascio\\v2\\AvailabilityInfo",
		"AvailabilityInfoResponse" => "ascio\\v2\\AvailabilityInfoResponse",
		"AvailabilityInfoInfo" => "ascio\\v2\\AvailabilityInfoInfo",
		"GetRegistrant" => "ascio\\v2\\GetRegistrant",
		"GetRegistrantResponse" => "ascio\\v2\\GetRegistrantResponse",
		"CreateRegistrant" => "ascio\\v2\\CreateRegistrant",
		"CreateRegistrantResponse" => "ascio\\v2\\CreateRegistrantResponse",
		"DeleteRegistrant" => "ascio\\v2\\DeleteRegistrant",
		"DeleteRegistrantResponse" => "ascio\\v2\\DeleteRegistrantResponse",
		"SearchRegistrant" => "ascio\\v2\\SearchRegistrant",
		"SearchRegistrantResponse" => "ascio\\v2\\SearchRegistrantResponse",
		"GetContact" => "ascio\\v2\\GetContact",
		"GetRegistrantVerificationInfo" => "ascio\\v2\\GetRegistrantVerificationInfo",
		"GetRegistrantVerificationInfoResponse" => "ascio\\v2\\GetRegistrantVerificationInfoResponse",
		"DoRegistrantVerification" => "ascio\\v2\\DoRegistrantVerification",
		"DoRegistrantVerificationResponse" => "ascio\\v2\\DoRegistrantVerificationResponse",
		"GetRegistrantVerificationStatus" => "ascio\\v2\\GetRegistrantVerificationStatus",
		"GetRegistrantVerificationStatusResponse" => "ascio\\v2\\GetRegistrantVerificationStatusResponse",
		"UploadRegistrantVerificationMessage" => "ascio\\v2\\UploadRegistrantVerificationMessage",
		"UploadRegistrantVerificationMessageResponse" => "ascio\\v2\\UploadRegistrantVerificationMessageResponse",
		"GetContactResponse" => "ascio\\v2\\GetContactResponse",
		"CreateContact" => "ascio\\v2\\CreateContact",
		"CreateContactResponse" => "ascio\\v2\\CreateContactResponse",
		"UpdateContact" => "ascio\\v2\\UpdateContact",
		"UpdateContactResponse" => "ascio\\v2\\UpdateContactResponse",
		"DeleteContact" => "ascio\\v2\\DeleteContact",
		"DeleteContactResponse" => "ascio\\v2\\DeleteContactResponse",
		"SearchContact" => "ascio\\v2\\SearchContact",
		"SearchContactResponse" => "ascio\\v2\\SearchContactResponse",
		"GetNameServer" => "ascio\\v2\\GetNameServer",
		"GetNameServerResponse" => "ascio\\v2\\GetNameServerResponse",
		"CreateNameServer" => "ascio\\v2\\CreateNameServer",
		"CreateNameServerResponse" => "ascio\\v2\\CreateNameServerResponse",
		"DeleteNameServer" => "ascio\\v2\\DeleteNameServer",
		"DeleteNameServerResponse" => "ascio\\v2\\DeleteNameServerResponse",
		"SearchNameServer" => "ascio\\v2\\SearchNameServer",
		"SearchNameServerResponse" => "ascio\\v2\\SearchNameServerResponse",
		"PollMessage" => "ascio\\v2\\PollMessage",
		"PollMessageResponse" => "ascio\\v2\\PollMessageResponse",
		"AckMessage" => "ascio\\v2\\AckMessage",
		"AckMessageResponse" => "ascio\\v2\\AckMessageResponse",
		"GetMessageQueue" => "ascio\\v2\\GetMessageQueue",
		"GetMessageQueueResponse" => "ascio\\v2\\GetMessageQueueResponse",
		"GetDnsSecKey" => "ascio\\v2\\GetDnsSecKey",
		"GetDnsSecKeyResponse" => "ascio\\v2\\GetDnsSecKeyResponse",
		"CreateDnsSecKey" => "ascio\\v2\\CreateDnsSecKey",
		"CreateDnsSecKeyResponse" => "ascio\\v2\\CreateDnsSecKeyResponse",
		"SearchDnsSecKey" => "ascio\\v2\\SearchDnsSecKey",
		"SearchDnsSecKeyResponse" => "ascio\\v2\\SearchDnsSecKeyResponse",
		"CreateDocumentation" => "ascio\\v2\\CreateDocumentation",
		"CreateDocumentationResponse" => "ascio\\v2\\CreateDocumentationResponse",
		"CreateApprovalDocumentation" => "ascio\\v2\\CreateApprovalDocumentation",
		"CreateApprovalDocumentationResponse" => "ascio\\v2\\CreateApprovalDocumentationResponse",
		"LogIn" => "ascio\\v2\\LogIn",
		"LogInResponse" => "ascio\\v2\\LogInResponse",
		"LogOut" => "ascio\\v2\\LogOut",
		"LogOutResponse" => "ascio\\v2\\LogOutResponse",
		"GetOrder" => "ascio\\v2\\GetOrder",
		"GetOrderResponse" => "ascio\\v2\\GetOrderResponse",
		"Extension" => "ascio\\v2\\Extension",
		"CreateOrder" => "ascio\\v2\\CreateOrder",
		"CreateOrderResponse" => "ascio\\v2\\CreateOrderResponse",
		"SearchOrder" => "ascio\\v2\\SearchOrder",
		"SearchOrderResponse" => "ascio\\v2\\SearchOrderResponse",
		"GetMessages" => "ascio\\v2\\GetMessages",
		"GetMessagesResponse" => "ascio\\v2\\GetMessagesResponse",
		"ValidateOrder" => "ascio\\v2\\ValidateOrder",
		"ValidateOrderResponse" => "ascio\\v2\\ValidateOrderResponse",
		"UploadDocumentation" => "ascio\\v2\\UploadDocumentation",
		"UploadDocumentationResponse" => "ascio\\v2\\UploadDocumentationResponse",
		"CreateSupportOrder" => "ascio\\v2\\CreateSupportOrder",
		"CreateSupportOrderResponse" => "ascio\\v2\\CreateSupportOrderResponse",
		"UploadMessage" => "ascio\\v2\\UploadMessage",
		"UploadMessageResponse" => "ascio\\v2\\UploadMessageResponse",
		"GetDomain" => "ascio\\v2\\GetDomain",
		"GetDomainResponse" => "ascio\\v2\\GetDomainResponse",
		"SearchDomain" => "ascio\\v2\\SearchDomain",
		"SearchDomainResponse" => "ascio\\v2\\SearchDomainResponse",
		"Whois" => "ascio\\v2\\Whois",
		"WhoisResponse" => "ascio\\v2\\WhoisResponse",
		"AvailabilityCheck" => "ascio\\v2\\AvailabilityCheck",
		"AvailabilityCheckResponse" => "ascio\\v2\\AvailabilityCheckResponse",
		"AvailabilityInfo" => "ascio\\v2\\AvailabilityInfo",
		"AvailabilityInfoResponse" => "ascio\\v2\\AvailabilityInfoResponse",
		"GetRegistrant" => "ascio\\v2\\GetRegistrant",
		"GetRegistrantResponse" => "ascio\\v2\\GetRegistrantResponse",
		"CreateRegistrant" => "ascio\\v2\\CreateRegistrant",
		"CreateRegistrantResponse" => "ascio\\v2\\CreateRegistrantResponse",
		"DeleteRegistrant" => "ascio\\v2\\DeleteRegistrant",
		"DeleteRegistrantResponse" => "ascio\\v2\\DeleteRegistrantResponse",
		"SearchRegistrant" => "ascio\\v2\\SearchRegistrant",
		"SearchRegistrantResponse" => "ascio\\v2\\SearchRegistrantResponse",
		"GetContact" => "ascio\\v2\\GetContact",
		"GetRegistrantVerificationInfo" => "ascio\\v2\\GetRegistrantVerificationInfo",
		"GetRegistrantVerificationInfoResponse" => "ascio\\v2\\GetRegistrantVerificationInfoResponse",
		"DoRegistrantVerification" => "ascio\\v2\\DoRegistrantVerification",
		"DoRegistrantVerificationResponse" => "ascio\\v2\\DoRegistrantVerificationResponse",
		"GetRegistrantVerificationStatus" => "ascio\\v2\\GetRegistrantVerificationStatus",
		"GetRegistrantVerificationStatusResponse" => "ascio\\v2\\GetRegistrantVerificationStatusResponse",
		"UploadRegistrantVerificationMessage" => "ascio\\v2\\UploadRegistrantVerificationMessage",
		"UploadRegistrantVerificationMessageResponse" => "ascio\\v2\\UploadRegistrantVerificationMessageResponse",
		"GetContactResponse" => "ascio\\v2\\GetContactResponse",
		"CreateContact" => "ascio\\v2\\CreateContact",
		"CreateContactResponse" => "ascio\\v2\\CreateContactResponse",
		"UpdateContact" => "ascio\\v2\\UpdateContact",
		"UpdateContactResponse" => "ascio\\v2\\UpdateContactResponse",
		"DeleteContact" => "ascio\\v2\\DeleteContact",
		"DeleteContactResponse" => "ascio\\v2\\DeleteContactResponse",
		"SearchContact" => "ascio\\v2\\SearchContact",
		"SearchContactResponse" => "ascio\\v2\\SearchContactResponse",
		"GetNameServer" => "ascio\\v2\\GetNameServer",
		"GetNameServerResponse" => "ascio\\v2\\GetNameServerResponse",
		"CreateNameServer" => "ascio\\v2\\CreateNameServer",
		"CreateNameServerResponse" => "ascio\\v2\\CreateNameServerResponse",
		"DeleteNameServer" => "ascio\\v2\\DeleteNameServer",
		"DeleteNameServerResponse" => "ascio\\v2\\DeleteNameServerResponse",
		"SearchNameServer" => "ascio\\v2\\SearchNameServer",
		"SearchNameServerResponse" => "ascio\\v2\\SearchNameServerResponse",
		"PollMessage" => "ascio\\v2\\PollMessage",
		"PollMessageResponse" => "ascio\\v2\\PollMessageResponse",
		"AckMessage" => "ascio\\v2\\AckMessage",
		"AckMessageResponse" => "ascio\\v2\\AckMessageResponse",
		"GetMessageQueue" => "ascio\\v2\\GetMessageQueue",
		"GetMessageQueueResponse" => "ascio\\v2\\GetMessageQueueResponse",
		"GetDnsSecKey" => "ascio\\v2\\GetDnsSecKey",
		"GetDnsSecKeyResponse" => "ascio\\v2\\GetDnsSecKeyResponse",
		"CreateDnsSecKey" => "ascio\\v2\\CreateDnsSecKey",
		"CreateDnsSecKeyResponse" => "ascio\\v2\\CreateDnsSecKeyResponse",
		"SearchDnsSecKey" => "ascio\\v2\\SearchDnsSecKey",
		"SearchDnsSecKeyResponse" => "ascio\\v2\\SearchDnsSecKeyResponse",
		"CreateDocumentation" => "ascio\\v2\\CreateDocumentation",
		"CreateDocumentationResponse" => "ascio\\v2\\CreateDocumentationResponse",
		"CreateApprovalDocumentation" => "ascio\\v2\\CreateApprovalDocumentation",
		"CreateApprovalDocumentationResponse" => "ascio\\v2\\CreateApprovalDocumentationResponse",
		"OrderType" => "ascio\\v2\\OrderType",
		"OrderStatusType" => "ascio\\v2\\OrderStatusType",
		"PrivacyProxyType" => "ascio\\v2\\PrivacyProxyType",
		"SearchOrderSortType" => "ascio\\v2\\SearchOrderSortType",
		"MessageType" => "ascio\\v2\\MessageType",
		"SearchOperatorType" => "ascio\\v2\\SearchOperatorType",
		"SearchModeType" => "ascio\\v2\\SearchModeType",
		"QualityType" => "ascio\\v2\\QualityType",
		"RegistrantVerificationStatus" => "ascio\\v2\\RegistrantVerificationStatus",
		"ApprovalDocumentationType" => "ascio\\v2\\ApprovalDocumentationType",
	];


	/**
	* Getters and setters for API-Properties
	*/
	public function logIn(Session $session) : LogInResponse {
		return $this->call("LogIn", ["session" => $session]);
	}
	public function logOut() : LogOutResponse {
		return $this->call("LogOut"[]);
	}
	public function getOrder(string $orderId) : GetOrderResponse {
		return $this->call("GetOrder", ["orderId" => $orderId]);
	}
	public function createOrder(Order $order) : CreateOrderResponse {
		return $this->call("CreateOrder", ["order" => $order]);
	}
	public function searchOrder(SearchOrderRequest $orderRequest) : SearchOrderResponse {
		return $this->call("SearchOrder", ["orderRequest" => $orderRequest]);
	}
	public function getMessages(string $orderId) : GetMessagesResponse {
		return $this->call("GetMessages", ["orderId" => $orderId]);
	}
	public function validateOrder(Order $order) : ValidateOrderResponse {
		return $this->call("ValidateOrder", ["order" => $order]);
	}
	public function uploadDocumentation(string $orderId, string $fileName, base64Binary $content) : UploadDocumentationResponse {
		return $this->call("UploadDocumentation", ["orderId" => $orderId, "fileName" => $fileName, "content" => $content]);
	}
	public function createSupportOrder(string $subject, string $body, ArrayOfAttachment $attachments) : CreateSupportOrderResponse {
		return $this->call("CreateSupportOrder", ["subject" => $subject, "body" => $body, "attachments" => $attachments]);
	}
	public function uploadMessage(string $orderId, Message $message) : UploadMessageResponse {
		return $this->call("UploadMessage", ["orderId" => $orderId, "message" => $message]);
	}
	public function getDomain(string $domainHandle) : GetDomainResponse {
		return $this->call("GetDomain", ["domainHandle" => $domainHandle]);
	}
	public function searchDomain(SearchCriteria $criteria) : SearchDomainResponse {
		return $this->call("SearchDomain", ["criteria" => $criteria]);
	}
	public function whois(string $domainName) : WhoisResponse {
		return $this->call("Whois", ["domainName" => $domainName]);
	}
	public function availabilityCheck(ArrayOfString $domains, ArrayOfString $tlds, string $quality) : AvailabilityCheckResponse {
		return $this->call("AvailabilityCheck", ["domains" => $domains, "tlds" => $tlds, "quality" => $quality]);
	}
	public function availabilityInfo(string $domainName, string $quality) : AvailabilityInfoResponse {
		return $this->call("AvailabilityInfo", ["domainName" => $domainName, "quality" => $quality]);
	}
	public function getRegistrant(string $registrantHandle) : GetRegistrantResponse {
		return $this->call("GetRegistrant", ["registrantHandle" => $registrantHandle]);
	}
	public function createRegistrant(Registrant $registrant) : CreateRegistrantResponse {
		return $this->call("CreateRegistrant", ["registrant" => $registrant]);
	}
	public function deleteRegistrant(string $registrantHandle) : DeleteRegistrantResponse {
		return $this->call("DeleteRegistrant", ["registrantHandle" => $registrantHandle]);
	}
	public function searchRegistrant(SearchCriteria $criteria) : SearchRegistrantResponse {
		return $this->call("SearchRegistrant", ["criteria" => $criteria]);
	}
	public function getRegistrantVerificationInfo(string $value) : GetRegistrantVerificationInfoResponse {
		return $this->call("GetRegistrantVerificationInfo", ["value" => $value]);
	}
	public function doRegistrantVerification(string $value) : DoRegistrantVerificationResponse {
		return $this->call("DoRegistrantVerification", ["value" => $value]);
	}
	public function getRegistrantVerificationStatus(string $value) : GetRegistrantVerificationStatusResponse {
		return $this->call("GetRegistrantVerificationStatus", ["value" => $value]);
	}
	public function uploadRegistrantVerificationMessage(string $value, RegistrantVerificationDetails $details) : UploadRegistrantVerificationMessageResponse {
		return $this->call("UploadRegistrantVerificationMessage", ["value" => $value, "details" => $details]);
	}
	public function getContact(string $contactHandle) : GetContactResponse {
		return $this->call("GetContact", ["contactHandle" => $contactHandle]);
	}
	public function createContact(Contact $contact) : CreateContactResponse {
		return $this->call("CreateContact", ["contact" => $contact]);
	}
	public function updateContact(Contact $contact) : UpdateContactResponse {
		return $this->call("UpdateContact", ["contact" => $contact]);
	}
	public function deleteContact(string $contactHandle) : DeleteContactResponse {
		return $this->call("DeleteContact", ["contactHandle" => $contactHandle]);
	}
	public function searchContact(SearchCriteria $criteria) : SearchContactResponse {
		return $this->call("SearchContact", ["criteria" => $criteria]);
	}
	public function getNameServer(string $nameServerHandle) : GetNameServerResponse {
		return $this->call("GetNameServer", ["nameServerHandle" => $nameServerHandle]);
	}
	public function createNameServer(NameServer $nameServer) : CreateNameServerResponse {
		return $this->call("CreateNameServer", ["nameServer" => $nameServer]);
	}
	public function deleteNameServer(string $nameServerHandle) : DeleteNameServerResponse {
		return $this->call("DeleteNameServer", ["nameServerHandle" => $nameServerHandle]);
	}
	public function searchNameServer(SearchCriteria $criteria) : SearchNameServerResponse {
		return $this->call("SearchNameServer", ["criteria" => $criteria]);
	}
	public function pollMessage(string $msgType) : PollMessageResponse {
		return $this->call("PollMessage", ["msgType" => $msgType]);
	}
	public function ackMessage(int $msgId) : AckMessageResponse {
		return $this->call("AckMessage", ["msgId" => $msgId]);
	}
	public function getMessageQueue(int $msgId) : GetMessageQueueResponse {
		return $this->call("GetMessageQueue", ["msgId" => $msgId]);
	}
	public function getDnsSecKey(string $dnsSecKeyHandle) : GetDnsSecKeyResponse {
		return $this->call("GetDnsSecKey", ["dnsSecKeyHandle" => $dnsSecKeyHandle]);
	}
	public function createDnsSecKey(DnsSecKey $dnsSecKey) : CreateDnsSecKeyResponse {
		return $this->call("CreateDnsSecKey", ["dnsSecKey" => $dnsSecKey]);
	}
	public function searchDnsSecKey(SearchCriteria $criteria) : SearchDnsSecKeyResponse {
		return $this->call("SearchDnsSecKey", ["criteria" => $criteria]);
	}
	public function createDocumentation(ArrayOfAttachment $attachments) : CreateDocumentationResponse {
		return $this->call("CreateDocumentation", ["attachments" => $attachments]);
	}
	public function createApprovalDocumentation(ApprovalDocumentation $approvalDocumentation) : CreateApprovalDocumentationResponse {
		return $this->call("CreateApprovalDocumentation", ["approvalDocumentation" => $approvalDocumentation]);
	}
}