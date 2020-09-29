<?php

// XSLT-WSDL-Client. Generated PHP class of Service

namespace ascio\service\v3;
use ascio\db\v3\ServiceDb;
use ascio\api\v3\ServiceApi;
use ascio\base\v3\ServiceBase;


class Service extends ServiceBase  {
	protected $classmap = [
		"AbstractOrderRequest" => "ascio\\v3\\AbstractOrderRequest",
		"MarkOrderRequest" => "ascio\\v3\\MarkOrderRequest",
		"AbstractMark" => "ascio\\v3\\AbstractMark",
		"Registrant" => "ascio\\v3\\Registrant",
		"RegistrantInfo" => "ascio\\v3\\RegistrantInfo",
		"Contact" => "ascio\\v3\\Contact",
		"ContactInfo" => "ascio\\v3\\ContactInfo",
		"Extensions" => "ascio\\v3\\Extensions",
		"AutoInstallSslOrderRequest" => "ascio\\v3\\AutoInstallSslOrderRequest",
		"AutoInstallSsl" => "ascio\\v3\\AutoInstallSsl",
		"SslCertificateOrderRequest" => "ascio\\v3\\SslCertificateOrderRequest",
		"SslCertificate" => "ascio\\v3\\SslCertificate",
		"TreatyOrStatuteMark" => "ascio\\v3\\TreatyOrStatuteMark",
		"Trademark" => "ascio\\v3\\Trademark",
		"CourtValidatedMark" => "ascio\\v3\\CourtValidatedMark",
		"SecurityHeaderDetails" => "ascio\\v3\\SecurityHeaderDetails",
		"ArrayOfMarkOrderDocument" => "ascio\\v3\\ArrayOfMarkOrderDocument",
		"MarkOrderDocument" => "ascio\\v3\\MarkOrderDocument",
		"Attachment" => "ascio\\v3\\Attachment",
		"NameWatchOrderRequest" => "ascio\\v3\\NameWatchOrderRequest",
		"NameWatch" => "ascio\\v3\\NameWatch",
		"DefensiveOrderRequest" => "ascio\\v3\\DefensiveOrderRequest",
		"Defensive" => "ascio\\v3\\Defensive",
		"DomainOrderRequest" => "ascio\\v3\\DomainOrderRequest",
		"CreateOrderResponse" => "ascio\\v3\\CreateOrderResponse",
		"AbstractResponse" => "ascio\\v3\\AbstractResponse",
		"OrderInfo" => "ascio\\v3\\OrderInfo",
		"ValidateOrderResponse" => "ascio\\v3\\ValidateOrderResponse",
		"ArrayOfOrderHistory" => "ascio\\v3\\ArrayOfOrderHistory",
		"OrderHistory" => "ascio\\v3\\OrderHistory",
		"GetOrderRequest" => "ascio\\v3\\GetOrderRequest",
		"GetOrderResponse" => "ascio\\v3\\GetOrderResponse",
		"GetOrdersRequest" => "ascio\\v3\\GetOrdersRequest",
		"ArrayOfOrderStatusType" => "ascio\\v3\\ArrayOfOrderStatusType",
		"ArrayOfOrderType" => "ascio\\v3\\ArrayOfOrderType",
		"ArrayOfObjectType" => "ascio\\v3\\ArrayOfObjectType",
		"PagingInfo" => "ascio\\v3\\PagingInfo",
		"GetOrdersResponse" => "ascio\\v3\\GetOrdersResponse",
		"ArrayOfOrderInfo" => "ascio\\v3\\ArrayOfOrderInfo",
		"GetDomainsRequest" => "ascio\\v3\\GetDomainsRequest",
		"GetDomainsResponse" => "ascio\\v3\\GetDomainsResponse",
		"ArrayOfDomainInfo" => "ascio\\v3\\ArrayOfDomainInfo",
		"GetDomainRequest" => "ascio\\v3\\GetDomainRequest",
		"GetDomainResponse" => "ascio\\v3\\GetDomainResponse",
		"DomainInfo" => "ascio\\v3\\DomainInfo",
		"Domain" => "ascio\\v3\\Domain",
		"NameServers" => "ascio\\v3\\NameServers",
		"NameServer" => "ascio\\v3\\NameServer",
		"DomainTradeMark" => "ascio\\v3\\DomainTradeMark",
		"DnsSecKeys" => "ascio\\v3\\DnsSecKeys",
		"DnsSecKey" => "ascio\\v3\\DnsSecKey",
		"PrivacyProxy" => "ascio\\v3\\PrivacyProxy",
		"AvailabilityInfoRequest" => "ascio\\v3\\AvailabilityInfoRequest",
		"AvailabilityInfoResponse" => "ascio\\v3\\AvailabilityInfoResponse",
		"ArrayOfPrices" => "ascio\\v3\\ArrayOfPrices",
		"Price" => "ascio\\v3\\Price",
		"Product" => "ascio\\v3\\Product",
		"GetPricesRequest" => "ascio\\v3\\GetPricesRequest",
		"GetPricesResponse" => "ascio\\v3\\GetPricesResponse",
		"GetPriceHistoryRequest" => "ascio\\v3\\GetPriceHistoryRequest",
		"GetPriceHistoryResponse" => "ascio\\v3\\GetPriceHistoryResponse",
		"GetAccountBalanceRequest" => "ascio\\v3\\GetAccountBalanceRequest",
		"GetAccountBalanceResponse" => "ascio\\v3\\GetAccountBalanceResponse",
		"GetAccountTransactionsRequest" => "ascio\\v3\\GetAccountTransactionsRequest",
		"ArrayOfAccountTransactions" => "ascio\\v3\\ArrayOfAccountTransactions",
		"AccountTransaction" => "ascio\\v3\\AccountTransaction",
		"GetAccountTransactionsResponse" => "ascio\\v3\\GetAccountTransactionsResponse",
		"ArrayOfSalesLineState" => "ascio\\v3\\ArrayOfSalesLineState",
		"GetSalesLinesRequest" => "ascio\\v3\\GetSalesLinesRequest",
		"ArrayOfSalesLines" => "ascio\\v3\\ArrayOfSalesLines",
		"SalesLine" => "ascio\\v3\\SalesLine",
		"GetSalesLinesResponse" => "ascio\\v3\\GetSalesLinesResponse",
		"GetSubUsersRequest" => "ascio\\v3\\GetSubUsersRequest",
		"ArrayOfUsers" => "ascio\\v3\\ArrayOfUsers",
		"UserInfo" => "ascio\\v3\\UserInfo",
		"User" => "ascio\\v3\\User",
		"GetSubUsersResponse" => "ascio\\v3\\GetSubUsersResponse",
		"GetSubUserRequest" => "ascio\\v3\\GetSubUserRequest",
		"GetSubUserResponse" => "ascio\\v3\\GetSubUserResponse",
		"DeleteSubUserRequest" => "ascio\\v3\\DeleteSubUserRequest",
		"DeleteSubUserResponse" => "ascio\\v3\\DeleteSubUserResponse",
		"CreateSubUserRequest" => "ascio\\v3\\CreateSubUserRequest",
		"CreateSubUserResponse" => "ascio\\v3\\CreateSubUserResponse",
		"UpdateSubUserRequest" => "ascio\\v3\\UpdateSubUserRequest",
		"UpdateSubUserResponse" => "ascio\\v3\\UpdateSubUserResponse",
		"GetInvoiceRequest" => "ascio\\v3\\GetInvoiceRequest",
		"ArrayOfSalesLineGroups" => "ascio\\v3\\ArrayOfSalesLineGroups",
		"SalesLineGroup" => "ascio\\v3\\SalesLineGroup",
		"GetInvoiceResponse" => "ascio\\v3\\GetInvoiceResponse",
		"GetCreditNoteRequest" => "ascio\\v3\\GetCreditNoteRequest",
		"GetCreditNoteResponse" => "ascio\\v3\\GetCreditNoteResponse",
		"GetRegistrantRequest" => "ascio\\v3\\GetRegistrantRequest",
		"GetRegistrantResponse" => "ascio\\v3\\GetRegistrantResponse",
		"GetContactRequest" => "ascio\\v3\\GetContactRequest",
		"GetContactResponse" => "ascio\\v3\\GetContactResponse",
		"CreateContactRequest" => "ascio\\v3\\CreateContactRequest",
		"CreateContactResponse" => "ascio\\v3\\CreateContactResponse",
		"CreateRegistrantRequest" => "ascio\\v3\\CreateRegistrantRequest",
		"CreateRegistrantResponse" => "ascio\\v3\\CreateRegistrantResponse",
		"CreateNameServerRequest" => "ascio\\v3\\CreateNameServerRequest",
		"CreateNameServerResponse" => "ascio\\v3\\CreateNameServerResponse",
		"CreateDnsSecKeyRequest" => "ascio\\v3\\CreateDnsSecKeyRequest",
		"CreateDnsSecKeyResponse" => "ascio\\v3\\CreateDnsSecKeyResponse",
		"GetNameServerRequest" => "ascio\\v3\\GetNameServerRequest",
		"GetNameServerResponse" => "ascio\\v3\\GetNameServerResponse",
		"GetDnsSecKeyRequest" => "ascio\\v3\\GetDnsSecKeyRequest",
		"GetDnsSecKeyResponse" => "ascio\\v3\\GetDnsSecKeyResponse",
		"GetRegistrantsRequest" => "ascio\\v3\\GetRegistrantsRequest",
		"ArrayOfRegistrantInfo" => "ascio\\v3\\ArrayOfRegistrantInfo",
		"GetRegistrantsResponse" => "ascio\\v3\\GetRegistrantsResponse",
		"GetContactsRequest" => "ascio\\v3\\GetContactsRequest",
		"ArrayOfContactInfo" => "ascio\\v3\\ArrayOfContactInfo",
		"GetContactsResponse" => "ascio\\v3\\GetContactsResponse",
		"GetNameServersRequest" => "ascio\\v3\\GetNameServersRequest",
		"ArrayOfNameServers" => "ascio\\v3\\ArrayOfNameServers",
		"GetNameServersResponse" => "ascio\\v3\\GetNameServersResponse",
		"GetDnsSecKeysRequest" => "ascio\\v3\\GetDnsSecKeysRequest",
		"ArrayOfDnsSecKeys" => "ascio\\v3\\ArrayOfDnsSecKeys",
		"GetDnsSecKeysResponse" => "ascio\\v3\\GetDnsSecKeysResponse",
		"GetSslCertificatesRequest" => "ascio\\v3\\GetSslCertificatesRequest",
		"GetSslCertificatesResponse" => "ascio\\v3\\GetSslCertificatesResponse",
		"ArrayOfSslCertificateInfo" => "ascio\\v3\\ArrayOfSslCertificateInfo",
		"GetMarksRequest" => "ascio\\v3\\GetMarksRequest",
		"GetMarksResponse" => "ascio\\v3\\GetMarksResponse",
		"ArrayOfMarkInfo" => "ascio\\v3\\ArrayOfMarkInfo",
		"GetMarkRequest" => "ascio\\v3\\GetMarkRequest",
		"GetMarkResponse" => "ascio\\v3\\GetMarkResponse",
		"MarkInfo" => "ascio\\v3\\MarkInfo",
		"GetDefensiveRequest" => "ascio\\v3\\GetDefensiveRequest",
		"GetDefensiveResponse" => "ascio\\v3\\GetDefensiveResponse",
		"DefensiveInfo" => "ascio\\v3\\DefensiveInfo",
		"GetNameWatchRequest" => "ascio\\v3\\GetNameWatchRequest",
		"GetNameWatchResponse" => "ascio\\v3\\GetNameWatchResponse",
		"NameWatchInfo" => "ascio\\v3\\NameWatchInfo",
		"GetSslCertificateRequest" => "ascio\\v3\\GetSslCertificateRequest",
		"GetSslCertificateResponse" => "ascio\\v3\\GetSslCertificateResponse",
		"GetSslApproversRequest" => "ascio\\v3\\GetSslApproversRequest",
		"GetSslApproversResponse" => "ascio\\v3\\GetSslApproversResponse",
		"SslCertificateInfo" => "ascio\\v3\\SslCertificateInfo",
		"GetAutoInstallSslRequest" => "ascio\\v3\\GetAutoInstallSslRequest",
		"GetAutoInstallSslResponse" => "ascio\\v3\\GetAutoInstallSslResponse",
		"AutoInstallSslInfo" => "ascio\\v3\\AutoInstallSslInfo",
		"GetMessagesRequest" => "ascio\\v3\\GetMessagesRequest",
		"GetMessagesResponse" => "ascio\\v3\\GetMessagesResponse",
		"ArrayOfMessage" => "ascio\\v3\\ArrayOfMessage",
		"Message" => "ascio\\v3\\Message",
		"ArrayOfAttachment" => "ascio\\v3\\ArrayOfAttachment",
		"PollQueueRequest" => "ascio\\v3\\PollQueueRequest",
		"GetAttachmentRequest" => "ascio\\v3\\GetAttachmentRequest",
		"GetAttachmentResponse" => "ascio\\v3\\GetAttachmentResponse",
		"PollQueueResponse" => "ascio\\v3\\PollQueueResponse",
		"QueueMessage" => "ascio\\v3\\QueueMessage",
		"ArrayOfErrorCode" => "ascio\\v3\\ArrayOfErrorCode",
		"ErrorCode" => "ascio\\v3\\ErrorCode",
		"AckQueueMessageRequest" => "ascio\\v3\\AckQueueMessageRequest",
		"AckQueueMessageResponse" => "ascio\\v3\\AckQueueMessageResponse",
		"GetQueueMessageRequest" => "ascio\\v3\\GetQueueMessageRequest",
		"GetQueueMessageResponse" => "ascio\\v3\\GetQueueMessageResponse",
		"UploadDocumentationRequest" => "ascio\\v3\\UploadDocumentationRequest",
		"UploadDocumentationResponse" => "ascio\\v3\\UploadDocumentationResponse",
		"UploadMessageRequest" => "ascio\\v3\\UploadMessageRequest",
		"UploadMessageResponse" => "ascio\\v3\\UploadMessageResponse",
		"ArrayOfstring" => "ascio\\v3\\ArrayOfstring",
		"ArrayOfint" => "ascio\\v3\\ArrayOfint",
		"CreateOrder" => "ascio\\v3\\CreateOrder",
		"ValidateOrder" => "ascio\\v3\\ValidateOrder",
		"GetOrder" => "ascio\\v3\\GetOrder",
		"GetOrders" => "ascio\\v3\\GetOrders",
		"GetDomains" => "ascio\\v3\\GetDomains",
		"GetSslCertificates" => "ascio\\v3\\GetSslCertificates",
		"GetDomain" => "ascio\\v3\\GetDomain",
		"AvailabilityInfo" => "ascio\\v3\\AvailabilityInfo",
		"GetPrices" => "ascio\\v3\\GetPrices",
		"GetPriceHistory" => "ascio\\v3\\GetPriceHistory",
		"GetAccountBalance" => "ascio\\v3\\GetAccountBalance",
		"GetAccountTransactions" => "ascio\\v3\\GetAccountTransactions",
		"GetSalesLines" => "ascio\\v3\\GetSalesLines",
		"GetSubUsers" => "ascio\\v3\\GetSubUsers",
		"GetSubUser" => "ascio\\v3\\GetSubUser",
		"CreateSubUser" => "ascio\\v3\\CreateSubUser",
		"UpdateSubUser" => "ascio\\v3\\UpdateSubUser",
		"DeleteSubUser" => "ascio\\v3\\DeleteSubUser",
		"GetInvoice" => "ascio\\v3\\GetInvoice",
		"GetCreditNote" => "ascio\\v3\\GetCreditNote",
		"GetRegistrant" => "ascio\\v3\\GetRegistrant",
		"GetContact" => "ascio\\v3\\GetContact",
		"CreateContact" => "ascio\\v3\\CreateContact",
		"CreateRegistrant" => "ascio\\v3\\CreateRegistrant",
		"CreateNameServer" => "ascio\\v3\\CreateNameServer",
		"CreateDnsSecKey" => "ascio\\v3\\CreateDnsSecKey",
		"GetNameServer" => "ascio\\v3\\GetNameServer",
		"GetDnsSecKey" => "ascio\\v3\\GetDnsSecKey",
		"GetRegistrants" => "ascio\\v3\\GetRegistrants",
		"GetContacts" => "ascio\\v3\\GetContacts",
		"GetNameServers" => "ascio\\v3\\GetNameServers",
		"GetDnsSecKeys" => "ascio\\v3\\GetDnsSecKeys",
		"GetMarks" => "ascio\\v3\\GetMarks",
		"GetMark" => "ascio\\v3\\GetMark",
		"GetDefensive" => "ascio\\v3\\GetDefensive",
		"GetNameWatch" => "ascio\\v3\\GetNameWatch",
		"GetSslCertificate" => "ascio\\v3\\GetSslCertificate",
		"GetSslApprovers" => "ascio\\v3\\GetSslApprovers",
		"GetAutoInstallSsl" => "ascio\\v3\\GetAutoInstallSsl",
		"GetMessages" => "ascio\\v3\\GetMessages",
		"GetAttachment" => "ascio\\v3\\GetAttachment",
		"PollQueue" => "ascio\\v3\\PollQueue",
		"AckQueueMessage" => "ascio\\v3\\AckQueueMessage",
		"GetQueueMessage" => "ascio\\v3\\GetQueueMessage",
		"UploadDocumentation" => "ascio\\v3\\UploadDocumentation",
		"UploadMessage" => "ascio\\v3\\UploadMessage",
		"anyType" => "ascio\\v3\\anyType",
		"anyURI" => "ascio\\v3\\anyURI",
		"base64Binary" => "ascio\\v3\\base64Binary",
		"boolean" => "ascio\\v3\\boolean",
		"byte" => "ascio\\v3\\byte",
		"dateTime" => "ascio\\v3\\dateTime",
		"decimal" => "ascio\\v3\\decimal",
		"double" => "ascio\\v3\\double",
		"float" => "ascio\\v3\\float",
		"int" => "ascio\\v3\\int",
		"long" => "ascio\\v3\\long",
		"QName" => "ascio\\v3\\QName",
		"short" => "ascio\\v3\\short",
		"string" => "ascio\\v3\\string",
		"unsignedByte" => "ascio\\v3\\unsignedByte",
		"unsignedInt" => "ascio\\v3\\unsignedInt",
		"unsignedLong" => "ascio\\v3\\unsignedLong",
		"unsignedShort" => "ascio\\v3\\unsignedShort",
		"ValidationType" => "ascio\\v3\\ValidationType",
		"CreateOrder" => "ascio\\v3\\CreateOrder",
		"ValidateOrder" => "ascio\\v3\\ValidateOrder",
		"GetOrder" => "ascio\\v3\\GetOrder",
		"GetOrders" => "ascio\\v3\\GetOrders",
		"GetDomains" => "ascio\\v3\\GetDomains",
		"GetSslCertificates" => "ascio\\v3\\GetSslCertificates",
		"GetDomain" => "ascio\\v3\\GetDomain",
		"AvailabilityInfo" => "ascio\\v3\\AvailabilityInfo",
		"GetPrices" => "ascio\\v3\\GetPrices",
		"GetPriceHistory" => "ascio\\v3\\GetPriceHistory",
		"GetAccountBalance" => "ascio\\v3\\GetAccountBalance",
		"GetAccountTransactions" => "ascio\\v3\\GetAccountTransactions",
		"GetSalesLines" => "ascio\\v3\\GetSalesLines",
		"GetSubUsers" => "ascio\\v3\\GetSubUsers",
		"GetSubUser" => "ascio\\v3\\GetSubUser",
		"CreateSubUser" => "ascio\\v3\\CreateSubUser",
		"UpdateSubUser" => "ascio\\v3\\UpdateSubUser",
		"DeleteSubUser" => "ascio\\v3\\DeleteSubUser",
		"GetInvoice" => "ascio\\v3\\GetInvoice",
		"GetCreditNote" => "ascio\\v3\\GetCreditNote",
		"GetRegistrant" => "ascio\\v3\\GetRegistrant",
		"GetContact" => "ascio\\v3\\GetContact",
		"CreateContact" => "ascio\\v3\\CreateContact",
		"CreateRegistrant" => "ascio\\v3\\CreateRegistrant",
		"CreateNameServer" => "ascio\\v3\\CreateNameServer",
		"CreateDnsSecKey" => "ascio\\v3\\CreateDnsSecKey",
		"GetNameServer" => "ascio\\v3\\GetNameServer",
		"GetDnsSecKey" => "ascio\\v3\\GetDnsSecKey",
		"GetRegistrants" => "ascio\\v3\\GetRegistrants",
		"GetContacts" => "ascio\\v3\\GetContacts",
		"GetNameServers" => "ascio\\v3\\GetNameServers",
		"GetDnsSecKeys" => "ascio\\v3\\GetDnsSecKeys",
		"GetMarks" => "ascio\\v3\\GetMarks",
		"GetMark" => "ascio\\v3\\GetMark",
		"GetDefensive" => "ascio\\v3\\GetDefensive",
		"GetNameWatch" => "ascio\\v3\\GetNameWatch",
		"GetSslCertificate" => "ascio\\v3\\GetSslCertificate",
		"GetSslApprovers" => "ascio\\v3\\GetSslApprovers",
		"GetAutoInstallSsl" => "ascio\\v3\\GetAutoInstallSsl",
		"GetMessages" => "ascio\\v3\\GetMessages",
		"GetAttachment" => "ascio\\v3\\GetAttachment",
		"PollQueue" => "ascio\\v3\\PollQueue",
		"AckQueueMessage" => "ascio\\v3\\AckQueueMessage",
		"GetQueueMessage" => "ascio\\v3\\GetQueueMessage",
		"UploadDocumentation" => "ascio\\v3\\UploadDocumentation",
		"UploadMessage" => "ascio\\v3\\UploadMessage",
		"KeyValue" => "ascio\\v3\\KeyValue",
		"char" => "ascio\\v3\\char",
		"duration" => "ascio\\v3\\duration",
		"guid" => "ascio\\v3\\guid",
		"OrderType" => "ascio\\v3\\OrderType",
		"MarkServiceType" => "ascio\\v3\\MarkServiceType",
		"NotificationFrequencyType" => "ascio\\v3\\NotificationFrequencyType",
		"WebServerType" => "ascio\\v3\\WebServerType",
		"SslDomainValidationType" => "ascio\\v3\\SslDomainValidationType",
		"MarkOrderDocType" => "ascio\\v3\\MarkOrderDocType",
		"OrderStatusType" => "ascio\\v3\\OrderStatusType",
		"ObjectType" => "ascio\\v3\\ObjectType",
		"SearchOrderSortType" => "ascio\\v3\\SearchOrderSortType",
		"DomainSortType" => "ascio\\v3\\DomainSortType",
		"DomainType" => "ascio\\v3\\DomainType",
		"ProxyType" => "ascio\\v3\\ProxyType",
		"PrivacyProxyType" => "ascio\\v3\\PrivacyProxyType",
		"AccountTransactionType" => "ascio\\v3\\AccountTransactionType",
		"SalesLineState" => "ascio\\v3\\SalesLineState",
		"InvoiceState" => "ascio\\v3\\InvoiceState",
		"SalesLineSortType" => "ascio\\v3\\SalesLineSortType",
		"RegistrantSortType" => "ascio\\v3\\RegistrantSortType",
		"ContactSortType" => "ascio\\v3\\ContactSortType",
		"NameServerSortType" => "ascio\\v3\\NameServerSortType",
		"DnsSecKeySortType" => "ascio\\v3\\DnsSecKeySortType",
		"SslCertificateSortType" => "ascio\\v3\\SslCertificateSortType",
		"MarkSortType" => "ascio\\v3\\MarkSortType",
		"MessageType" => "ascio\\v3\\MessageType",
	];


	public function createOrder(AbstractOrderRequest $request) : CreateOrderResponse {
		return $this->call("CreateOrder", ["request" => $request]);
	}
	public function validateOrder(AbstractOrderRequest $request) : ValidateOrderResponse {
		return $this->call("ValidateOrder", ["request" => $request]);
	}
	public function getOrder(GetOrderRequest $request) : GetOrderResponse {
		return $this->call("GetOrder", ["request" => $request]);
	}
	public function getOrders(GetOrdersRequest $request) : GetOrdersResponse {
		return $this->call("GetOrders", ["request" => $request]);
	}
	public function getDomains(GetDomainsRequest $request) : GetDomainsResponse {
		return $this->call("GetDomains", ["request" => $request]);
	}
	public function getSslCertificates(GetSslCertificatesRequest $request) : GetSslCertificatesResponse {
		return $this->call("GetSslCertificates", ["request" => $request]);
	}
	public function availabilityInfo(AvailabilityInfoRequest $request) : AvailabilityInfoResponse {
		return $this->call("AvailabilityInfo", ["request" => $request]);
	}
	public function getPrices(GetPricesRequest $request) : GetPricesResponse {
		return $this->call("GetPrices", ["request" => $request]);
	}
	public function getPriceHistory(GetPriceHistoryRequest $request) : GetPriceHistoryResponse {
		return $this->call("GetPriceHistory", ["request" => $request]);
	}
	public function getAccountBalance(GetAccountBalanceRequest $request) : GetAccountBalanceResponse {
		return $this->call("GetAccountBalance", ["request" => $request]);
	}
	public function getAccountTransactions(GetAccountTransactionsRequest $request) : GetAccountTransactionsResponse {
		return $this->call("GetAccountTransactions", ["request" => $request]);
	}
	public function getSalesLines(GetSalesLinesRequest $request) : GetSalesLinesResponse {
		return $this->call("GetSalesLines", ["request" => $request]);
	}
	public function getSubUsers(GetSubUsersRequest $request) : GetSubUsersResponse {
		return $this->call("GetSubUsers", ["request" => $request]);
	}
	public function getSubUser(GetSubUserRequest $request) : GetSubUserResponse {
		return $this->call("GetSubUser", ["request" => $request]);
	}
	public function createSubUser(CreateSubUserRequest $request) : CreateSubUserResponse {
		return $this->call("CreateSubUser", ["request" => $request]);
	}
	public function updateSubUser(UpdateSubUserRequest $request) : UpdateSubUserResponse {
		return $this->call("UpdateSubUser", ["request" => $request]);
	}
	public function deleteSubUser(DeleteSubUserRequest $request) : DeleteSubUserResponse {
		return $this->call("DeleteSubUser", ["request" => $request]);
	}
	public function getInvoice(GetInvoiceRequest $request) : GetInvoiceResponse {
		return $this->call("GetInvoice", ["request" => $request]);
	}
	public function getCreditNote(GetCreditNoteRequest $request) : GetCreditNoteResponse {
		return $this->call("GetCreditNote", ["request" => $request]);
	}
	public function getRegistrant(GetRegistrantRequest $request) : GetRegistrantResponse {
		return $this->call("GetRegistrant", ["request" => $request]);
	}
	public function getContact(GetContactRequest $request) : GetContactResponse {
		return $this->call("GetContact", ["request" => $request]);
	}
	public function createContact(CreateContactRequest $request) : CreateContactResponse {
		return $this->call("CreateContact", ["request" => $request]);
	}
	public function createRegistrant(CreateRegistrantRequest $request) : CreateRegistrantResponse {
		return $this->call("CreateRegistrant", ["request" => $request]);
	}
	public function createNameServer(CreateNameServerRequest $request) : CreateNameServerResponse {
		return $this->call("CreateNameServer", ["request" => $request]);
	}
	public function createDnsSecKey(CreateDnsSecKeyRequest $request) : CreateDnsSecKeyResponse {
		return $this->call("CreateDnsSecKey", ["request" => $request]);
	}
	public function getNameServer(GetNameServerRequest $request) : GetNameServerResponse {
		return $this->call("GetNameServer", ["request" => $request]);
	}
	public function getDnsSecKey(GetDnsSecKeyRequest $request) : GetDnsSecKeyResponse {
		return $this->call("GetDnsSecKey", ["request" => $request]);
	}
	public function getRegistrants(GetRegistrantsRequest $request) : GetRegistrantsResponse {
		return $this->call("GetRegistrants", ["request" => $request]);
	}
	public function getContacts(GetContactsRequest $request) : GetContactsResponse {
		return $this->call("GetContacts", ["request" => $request]);
	}
	public function getNameServers(GetNameServersRequest $request) : GetNameServersResponse {
		return $this->call("GetNameServers", ["request" => $request]);
	}
	public function getDnsSecKeys(GetDnsSecKeysRequest $request) : GetDnsSecKeysResponse {
		return $this->call("GetDnsSecKeys", ["request" => $request]);
	}
	public function getMarks(GetMarksRequest $request) : GetMarksResponse {
		return $this->call("GetMarks", ["request" => $request]);
	}
	public function getMark(GetMarkRequest $request) : GetMarkResponse {
		return $this->call("GetMark", ["request" => $request]);
	}
	public function getDomain(GetDomainRequest $request) : GetDomainResponse {
		return $this->call("GetDomain", ["request" => $request]);
	}
	public function getDefensive(GetDefensiveRequest $request) : GetDefensiveResponse {
		return $this->call("GetDefensive", ["request" => $request]);
	}
	public function getNameWatch(GetNameWatchRequest $request) : GetNameWatchResponse {
		return $this->call("GetNameWatch", ["request" => $request]);
	}
	public function getSslCertificate(GetSslCertificateRequest $request) : GetSslCertificateResponse {
		return $this->call("GetSslCertificate", ["request" => $request]);
	}
	public function getAutoInstallSsl(GetAutoInstallSslRequest $request) : GetAutoInstallSslResponse {
		return $this->call("GetAutoInstallSsl", ["request" => $request]);
	}
	public function getSslApprovers(GetSslApproversRequest $request) : GetSslApproversResponse {
		return $this->call("GetSslApprovers", ["request" => $request]);
	}
	public function getMessages(GetMessagesRequest $request) : GetMessagesResponse {
		return $this->call("GetMessages", ["request" => $request]);
	}
	public function getAttachment(GetAttachmentRequest $request) : GetAttachmentResponse {
		return $this->call("GetAttachment", ["request" => $request]);
	}
	public function pollQueue(PollQueueRequest $request) : PollQueueResponse {
		return $this->call("PollQueue", ["request" => $request]);
	}
	public function ackQueueMessage(AckQueueMessageRequest $request) : AckQueueMessageResponse {
		return $this->call("AckQueueMessage", ["request" => $request]);
	}
	public function getQueueMessage(GetQueueMessageRequest $request) : GetQueueMessageResponse {
		return $this->call("GetQueueMessage", ["request" => $request]);
	}
	public function uploadDocumentation(UploadDocumentationRequest $request) : UploadDocumentationResponse {
		return $this->call("UploadDocumentation", ["request" => $request]);
	}
	public function uploadMessage(UploadMessageRequest $request) : UploadMessageResponse {
		return $this->call("UploadMessage", ["request" => $request]);
	}
}