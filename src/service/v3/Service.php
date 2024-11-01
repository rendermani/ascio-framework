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
		"CustomerReference" => "ascio\\v3\\CustomerReference",
		"CustomerReferenceInfo" => "ascio\\v3\\CustomerReferenceInfo",
		"CustomerReferenceResult" => "ascio\\v3\\CustomerReferenceResult",
		"ArrayOfCustomerReferenceResult" => "ascio\\v3\\ArrayOfCustomerReferenceResult",
		"Extensions" => "ascio\\v3\\Extensions",
		"AutoInstallSslOrderRequest" => "ascio\\v3\\AutoInstallSslOrderRequest",
		"AutoInstallSsl" => "ascio\\v3\\AutoInstallSsl",
		"SslCertificateOrderRequest" => "ascio\\v3\\SslCertificateOrderRequest",
		"SslCertificate" => "ascio\\v3\\SslCertificate",
		"TreatyOrStatuteMark" => "ascio\\v3\\TreatyOrStatuteMark",
		"Trademark" => "ascio\\v3\\Trademark",
		"CourtValidatedMark" => "ascio\\v3\\CourtValidatedMark",
		"SecurityHeaderDetails" => "ascio\\v3\\SecurityHeaderDetails",
		"ImpersonationHeaderDetails" => "ascio\\v3\\ImpersonationHeaderDetails",
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
		"CancelOrderRequest" => "ascio\\v3\\CancelOrderRequest",
		"CancelOrderResponse" => "ascio\\v3\\CancelOrderResponse",
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
		"GetDefensivesRequest" => "ascio\\v3\\GetDefensivesRequest",
		"GetDefensivesResponse" => "ascio\\v3\\GetDefensivesResponse",
		"ArrayOfDefensiveInfo" => "ascio\\v3\\ArrayOfDefensiveInfo",
		"GetPremiumDomainsRequest" => "ascio\\v3\\GetPremiumDomainsRequest",
		"GetPremiumDomainsResponse" => "ascio\\v3\\GetPremiumDomainsResponse",
		"ArrayOfPremiumDomainInfo" => "ascio\\v3\\ArrayOfPremiumDomainInfo",
		"PremiumDomainInfo" => "ascio\\v3\\PremiumDomainInfo",
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
		"GetRegistrantVerificationRequest" => "ascio\\v3\\GetRegistrantVerificationRequest",
		"GetRegistrantVerificationResponse" => "ascio\\v3\\GetRegistrantVerificationResponse",
		"RegistrantVerificationInfo" => "ascio\\v3\\RegistrantVerificationInfo",
		"RegistrantVerificationDetails" => "ascio\\v3\\RegistrantVerificationDetails",
		"StartRegistrantVerificationRequest" => "ascio\\v3\\StartRegistrantVerificationRequest",
		"StartRegistrantVerificationResponse" => "ascio\\v3\\StartRegistrantVerificationResponse",
		"AvailabilityInfoRequest" => "ascio\\v3\\AvailabilityInfoRequest",
		"AvailabilityInfoResponse" => "ascio\\v3\\AvailabilityInfoResponse",
		"ArrayOfPrices" => "ascio\\v3\\ArrayOfPrices",
		"PriceInfo" => "ascio\\v3\\PriceInfo",
		"ArrayOfFuturePrices" => "ascio\\v3\\ArrayOfFuturePrices",
		"FuturePriceInfo" => "ascio\\v3\\FuturePriceInfo",
		"Product" => "ascio\\v3\\Product",
		"GetPricesRequest" => "ascio\\v3\\GetPricesRequest",
		"GetPricesResponse" => "ascio\\v3\\GetPricesResponse",
		"GetFuturePricesResponse" => "ascio\\v3\\GetFuturePricesResponse",
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
		"DeleteHandleRequest" => "ascio\\v3\\DeleteHandleRequest",
		"ObjectInfo" => "ascio\\v3\\ObjectInfo",
		"ArrayOfObjectInfo" => "ascio\\v3\\ArrayOfObjectInfo",
		"DeleteHandleResponse" => "ascio\\v3\\DeleteHandleResponse",
		"GetCustomerReferenceRequest" => "ascio\\v3\\GetCustomerReferenceRequest",
		"GetCustomerReferenceResponse" => "ascio\\v3\\GetCustomerReferenceResponse",
		"CreateContactRequest" => "ascio\\v3\\CreateContactRequest",
		"CreateContactResponse" => "ascio\\v3\\CreateContactResponse",
		"CreateCustomerReferenceRequest" => "ascio\\v3\\CreateCustomerReferenceRequest",
		"CreateCustomerReferenceResponse" => "ascio\\v3\\CreateCustomerReferenceResponse",
		"UpdateCustomerReferenceRequest" => "ascio\\v3\\UpdateCustomerReferenceRequest",
		"UpdateCustomerReferenceResponse" => "ascio\\v3\\UpdateCustomerReferenceResponse",
		"DeleteCustomerReferenceRequest" => "ascio\\v3\\DeleteCustomerReferenceRequest",
		"DeleteCustomerReferenceResponse" => "ascio\\v3\\DeleteCustomerReferenceResponse",
		"SetCustomerReferencesRequest" => "ascio\\v3\\SetCustomerReferencesRequest",
		"SetCustomerReferencesResponse" => "ascio\\v3\\SetCustomerReferencesResponse",
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
		"GetCustomerReferencesRequest" => "ascio\\v3\\GetCustomerReferencesRequest",
		"ArrayOfCustomerReferenceInfo" => "ascio\\v3\\ArrayOfCustomerReferenceInfo",
		"GetCustomerReferencesResponse" => "ascio\\v3\\GetCustomerReferencesResponse",
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
		"GetNameWatchListRequest" => "ascio\\v3\\GetNameWatchListRequest",
		"GetNameWatchListResponse" => "ascio\\v3\\GetNameWatchListResponse",
		"ArrayOfNameWatchInfo" => "ascio\\v3\\ArrayOfNameWatchInfo",
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
		"ResendMessageRequest" => "ascio\\v3\\ResendMessageRequest",
		"ResendMessageResponse" => "ascio\\v3\\ResendMessageResponse",
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
		"CreateApprovalDocumentationRequest" => "ascio\\v3\\CreateApprovalDocumentationRequest",
		"AbstractApproval" => "ascio\\v3\\AbstractApproval",
		"IrtpApproval" => "ascio\\v3\\IrtpApproval",
		"FoaApproval" => "ascio\\v3\\FoaApproval",
		"CreateApprovalDocumentationResponse" => "ascio\\v3\\CreateApprovalDocumentationResponse",
		"UploadMessageRequest" => "ascio\\v3\\UploadMessageRequest",
		"UploadMessageResponse" => "ascio\\v3\\UploadMessageResponse",
		"GetSslCertificateChainRequest" => "ascio\\v3\\GetSslCertificateChainRequest",
		"GetSslCertificateChainResponse" => "ascio\\v3\\GetSslCertificateChainResponse",
		"ArrayOfstring" => "ascio\\v3\\ArrayOfstring",
		"ArrayOfint" => "ascio\\v3\\ArrayOfint",
		"CreateOrder" => "ascio\\v3\\CreateOrder",
		"ValidateOrder" => "ascio\\v3\\ValidateOrder",
		"GetOrder" => "ascio\\v3\\GetOrder",
		"CancelOrder" => "ascio\\v3\\CancelOrder",
		"GetOrders" => "ascio\\v3\\GetOrders",
		"GetDomains" => "ascio\\v3\\GetDomains",
		"GetDefensives" => "ascio\\v3\\GetDefensives",
		"GetPremiumDomains" => "ascio\\v3\\GetPremiumDomains",
		"GetSslCertificates" => "ascio\\v3\\GetSslCertificates",
		"GetDomain" => "ascio\\v3\\GetDomain",
		"AvailabilityInfo" => "ascio\\v3\\AvailabilityInfo",
		"GetRegistrantVerificationInfo" => "ascio\\v3\\GetRegistrantVerificationInfo",
		"StartRegistrantVerification" => "ascio\\v3\\StartRegistrantVerification",
		"GetPrices" => "ascio\\v3\\GetPrices",
		"GetFuturePrices" => "ascio\\v3\\GetFuturePrices",
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
		"DeleteContact" => "ascio\\v3\\DeleteContact",
		"DeleteContactResponse" => "ascio\\v3\\DeleteContactResponse",
		"DeleteRegistrant" => "ascio\\v3\\DeleteRegistrant",
		"DeleteRegistrantResponse" => "ascio\\v3\\DeleteRegistrantResponse",
		"DeleteNameServer" => "ascio\\v3\\DeleteNameServer",
		"DeleteNameServerResponse" => "ascio\\v3\\DeleteNameServerResponse",
		"DeleteDnsSecKey" => "ascio\\v3\\DeleteDnsSecKey",
		"DeleteDnsSecKeyResponse" => "ascio\\v3\\DeleteDnsSecKeyResponse",
		"GetCustomerReference" => "ascio\\v3\\GetCustomerReference",
		"CreateContact" => "ascio\\v3\\CreateContact",
		"CreateCustomerReference" => "ascio\\v3\\CreateCustomerReference",
		"UpdateCustomerReference" => "ascio\\v3\\UpdateCustomerReference",
		"DeleteCustomerReference" => "ascio\\v3\\DeleteCustomerReference",
		"SetCustomerReferences" => "ascio\\v3\\SetCustomerReferences",
		"CreateRegistrant" => "ascio\\v3\\CreateRegistrant",
		"CreateNameServer" => "ascio\\v3\\CreateNameServer",
		"CreateDnsSecKey" => "ascio\\v3\\CreateDnsSecKey",
		"GetNameServer" => "ascio\\v3\\GetNameServer",
		"GetDnsSecKey" => "ascio\\v3\\GetDnsSecKey",
		"GetRegistrants" => "ascio\\v3\\GetRegistrants",
		"GetContacts" => "ascio\\v3\\GetContacts",
		"GetCustomerReferences" => "ascio\\v3\\GetCustomerReferences",
		"GetNameServers" => "ascio\\v3\\GetNameServers",
		"GetDnsSecKeys" => "ascio\\v3\\GetDnsSecKeys",
		"GetMarks" => "ascio\\v3\\GetMarks",
		"GetNameWatchList" => "ascio\\v3\\GetNameWatchList",
		"GetMark" => "ascio\\v3\\GetMark",
		"GetDefensive" => "ascio\\v3\\GetDefensive",
		"GetNameWatch" => "ascio\\v3\\GetNameWatch",
		"GetSslCertificate" => "ascio\\v3\\GetSslCertificate",
		"GetSslApprovers" => "ascio\\v3\\GetSslApprovers",
		"GetAutoInstallSsl" => "ascio\\v3\\GetAutoInstallSsl",
		"GetMessages" => "ascio\\v3\\GetMessages",
		"ResendMessage" => "ascio\\v3\\ResendMessage",
		"GetAttachment" => "ascio\\v3\\GetAttachment",
		"PollQueue" => "ascio\\v3\\PollQueue",
		"AckQueueMessage" => "ascio\\v3\\AckQueueMessage",
		"GetQueueMessage" => "ascio\\v3\\GetQueueMessage",
		"UploadDocumentation" => "ascio\\v3\\UploadDocumentation",
		"CreateApprovalDocumentation" => "ascio\\v3\\CreateApprovalDocumentation",
		"UploadMessage" => "ascio\\v3\\UploadMessage",
		"GetSslCertificateChain" => "ascio\\v3\\GetSslCertificateChain",
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
		"CancelOrder" => "ascio\\v3\\CancelOrder",
		"GetOrders" => "ascio\\v3\\GetOrders",
		"GetDomains" => "ascio\\v3\\GetDomains",
		"GetDefensives" => "ascio\\v3\\GetDefensives",
		"GetPremiumDomains" => "ascio\\v3\\GetPremiumDomains",
		"GetSslCertificates" => "ascio\\v3\\GetSslCertificates",
		"GetDomain" => "ascio\\v3\\GetDomain",
		"AvailabilityInfo" => "ascio\\v3\\AvailabilityInfo",
		"GetRegistrantVerificationInfo" => "ascio\\v3\\GetRegistrantVerificationInfo",
		"StartRegistrantVerification" => "ascio\\v3\\StartRegistrantVerification",
		"GetPrices" => "ascio\\v3\\GetPrices",
		"GetFuturePrices" => "ascio\\v3\\GetFuturePrices",
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
		"DeleteContact" => "ascio\\v3\\DeleteContact",
		"DeleteContactResponse" => "ascio\\v3\\DeleteContactResponse",
		"DeleteRegistrant" => "ascio\\v3\\DeleteRegistrant",
		"DeleteRegistrantResponse" => "ascio\\v3\\DeleteRegistrantResponse",
		"DeleteNameServer" => "ascio\\v3\\DeleteNameServer",
		"DeleteNameServerResponse" => "ascio\\v3\\DeleteNameServerResponse",
		"DeleteDnsSecKey" => "ascio\\v3\\DeleteDnsSecKey",
		"DeleteDnsSecKeyResponse" => "ascio\\v3\\DeleteDnsSecKeyResponse",
		"GetCustomerReference" => "ascio\\v3\\GetCustomerReference",
		"CreateContact" => "ascio\\v3\\CreateContact",
		"CreateCustomerReference" => "ascio\\v3\\CreateCustomerReference",
		"UpdateCustomerReference" => "ascio\\v3\\UpdateCustomerReference",
		"DeleteCustomerReference" => "ascio\\v3\\DeleteCustomerReference",
		"SetCustomerReferences" => "ascio\\v3\\SetCustomerReferences",
		"CreateRegistrant" => "ascio\\v3\\CreateRegistrant",
		"CreateNameServer" => "ascio\\v3\\CreateNameServer",
		"CreateDnsSecKey" => "ascio\\v3\\CreateDnsSecKey",
		"GetNameServer" => "ascio\\v3\\GetNameServer",
		"GetDnsSecKey" => "ascio\\v3\\GetDnsSecKey",
		"GetRegistrants" => "ascio\\v3\\GetRegistrants",
		"GetContacts" => "ascio\\v3\\GetContacts",
		"GetCustomerReferences" => "ascio\\v3\\GetCustomerReferences",
		"GetNameServers" => "ascio\\v3\\GetNameServers",
		"GetDnsSecKeys" => "ascio\\v3\\GetDnsSecKeys",
		"GetMarks" => "ascio\\v3\\GetMarks",
		"GetNameWatchList" => "ascio\\v3\\GetNameWatchList",
		"GetMark" => "ascio\\v3\\GetMark",
		"GetDefensive" => "ascio\\v3\\GetDefensive",
		"GetNameWatch" => "ascio\\v3\\GetNameWatch",
		"GetSslCertificate" => "ascio\\v3\\GetSslCertificate",
		"GetSslApprovers" => "ascio\\v3\\GetSslApprovers",
		"GetAutoInstallSsl" => "ascio\\v3\\GetAutoInstallSsl",
		"GetMessages" => "ascio\\v3\\GetMessages",
		"ResendMessage" => "ascio\\v3\\ResendMessage",
		"GetAttachment" => "ascio\\v3\\GetAttachment",
		"PollQueue" => "ascio\\v3\\PollQueue",
		"AckQueueMessage" => "ascio\\v3\\AckQueueMessage",
		"GetQueueMessage" => "ascio\\v3\\GetQueueMessage",
		"UploadDocumentation" => "ascio\\v3\\UploadDocumentation",
		"CreateApprovalDocumentation" => "ascio\\v3\\CreateApprovalDocumentation",
		"UploadMessage" => "ascio\\v3\\UploadMessage",
		"GetSslCertificateChain" => "ascio\\v3\\GetSslCertificateChain",
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
		"DefensiveSortType" => "ascio\\v3\\DefensiveSortType",
		"PrivacyProxyType" => "ascio\\v3\\PrivacyProxyType",
		"RegistrantVerificationStatus" => "ascio\\v3\\RegistrantVerificationStatus",
		"AccountTransactionType" => "ascio\\v3\\AccountTransactionType",
		"SalesLineState" => "ascio\\v3\\SalesLineState",
		"InvoiceState" => "ascio\\v3\\InvoiceState",
		"SalesLineSortType" => "ascio\\v3\\SalesLineSortType",
		"RegistrantSortType" => "ascio\\v3\\RegistrantSortType",
		"ContactSortType" => "ascio\\v3\\ContactSortType",
		"CustomerReferenceSortType" => "ascio\\v3\\CustomerReferenceSortType",
		"NameServerSortType" => "ascio\\v3\\NameServerSortType",
		"DnsSecKeySortType" => "ascio\\v3\\DnsSecKeySortType",
		"SslCertificateSortType" => "ascio\\v3\\SslCertificateSortType",
		"MarkSortType" => "ascio\\v3\\MarkSortType",
		"NameWatchSortType" => "ascio\\v3\\NameWatchSortType",
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
	public function cancelOrder(CancelOrderRequest $request) : CancelOrderResponse {
		return $this->call("CancelOrder", ["request" => $request]);
	}
	public function getOrders(GetOrdersRequest $request) : GetOrdersResponse {
		return $this->call("GetOrders", ["request" => $request]);
	}
	public function getDomains(GetDomainsRequest $request) : GetDomainsResponse {
		return $this->call("GetDomains", ["request" => $request]);
	}
	public function getDefensives(GetDefensivesRequest $request) : GetDefensivesResponse {
		return $this->call("GetDefensives", ["request" => $request]);
	}
	public function getPremiumDomains(GetPremiumDomainsRequest $request) : GetPremiumDomainsResponse {
		return $this->call("GetPremiumDomains", ["request" => $request]);
	}
	public function getSslCertificates(GetSslCertificatesRequest $request) : GetSslCertificatesResponse {
		return $this->call("GetSslCertificates", ["request" => $request]);
	}
	public function availabilityInfo(AvailabilityInfoRequest $request) : AvailabilityInfoResponse {
		return $this->call("AvailabilityInfo", ["request" => $request]);
	}
	public function getRegistrantVerificationInfo(GetRegistrantVerificationRequest $request) : GetRegistrantVerificationResponse {
		return $this->call("GetRegistrantVerificationInfo", ["request" => $request]);
	}
	public function startRegistrantVerification(StartRegistrantVerificationRequest $request) : StartRegistrantVerificationResponse {
		return $this->call("StartRegistrantVerification", ["request" => $request]);
	}
	public function getPrices(GetPricesRequest $request) : GetPricesResponse {
		return $this->call("GetPrices", ["request" => $request]);
	}
	public function getFuturePrices(GetPricesRequest $request) : GetFuturePricesResponse {
		return $this->call("GetFuturePrices", ["request" => $request]);
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
	public function deleteContact(DeleteHandleRequest $request) : DeleteContactResponse {
		return $this->call("DeleteContact", ["request" => $request]);
	}
	public function deleteRegistrant(DeleteHandleRequest $request) : DeleteRegistrantResponse {
		return $this->call("DeleteRegistrant", ["request" => $request]);
	}
	public function deleteNameServer(DeleteHandleRequest $request) : DeleteNameServerResponse {
		return $this->call("DeleteNameServer", ["request" => $request]);
	}
	public function deleteDnsSecKey(DeleteHandleRequest $request) : DeleteDnsSecKeyResponse {
		return $this->call("DeleteDnsSecKey", ["request" => $request]);
	}
	public function getCustomerReference(GetCustomerReferenceRequest $request) : GetCustomerReferenceResponse {
		return $this->call("GetCustomerReference", ["request" => $request]);
	}
	public function createContact(CreateContactRequest $request) : CreateContactResponse {
		return $this->call("CreateContact", ["request" => $request]);
	}
	public function createCustomerReference(CreateCustomerReferenceRequest $request) : CreateCustomerReferenceResponse {
		return $this->call("CreateCustomerReference", ["request" => $request]);
	}
	public function updateCustomerReference(UpdateCustomerReferenceRequest $request) : UpdateCustomerReferenceResponse {
		return $this->call("UpdateCustomerReference", ["request" => $request]);
	}
	public function deleteCustomerReference(DeleteCustomerReferenceRequest $request) : DeleteCustomerReferenceResponse {
		return $this->call("DeleteCustomerReference", ["request" => $request]);
	}
	public function setCustomerReferences(SetCustomerReferencesRequest $request) : SetCustomerReferencesResponse {
		return $this->call("SetCustomerReferences", ["request" => $request]);
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
	public function getCustomerReferences(GetCustomerReferencesRequest $request) : GetCustomerReferencesResponse {
		return $this->call("GetCustomerReferences", ["request" => $request]);
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
	public function getNameWatchList(GetNameWatchListRequest $request) : GetNameWatchListResponse {
		return $this->call("GetNameWatchList", ["request" => $request]);
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
	public function resendMessage(ResendMessageRequest $request) : ResendMessageResponse {
		return $this->call("ResendMessage", ["request" => $request]);
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
	public function createApprovalDocumentation(CreateApprovalDocumentationRequest $request) : CreateApprovalDocumentationResponse {
		return $this->call("CreateApprovalDocumentation", ["request" => $request]);
	}
	public function uploadMessage(UploadMessageRequest $request) : UploadMessageResponse {
		return $this->call("UploadMessage", ["request" => $request]);
	}
	public function getSslCertificateChain(GetSslCertificateChainRequest $request) : GetSslCertificateChainResponse {
		return $this->call("GetSslCertificateChain", ["request" => $request]);
	}
}