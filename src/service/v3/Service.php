<?php

// XSLT-WSDL-Client. Generated PHP class of Service

namespace ascio\service\v3;
use ascio\base\v3\ServiceBase;
use ascio\db\v3\ServiceDb;
use ascio\api\v3\ServiceApi;


abstract class Service extends ServiceBase  {
	protected $classmap = [
		"AbstractOrderRequest" => "ascio\\v3\\AbstractOrderRequest",
		"MarkOrderRequest" => "ascio\\v3\\MarkOrderRequest",
		"AbstractMark" => "ascio\\v3\\AbstractMark",
		"Registrant" => "ascio\\v3\\Registrant",
		"Contact" => "ascio\\v3\\Contact",
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
		"CreateOrderResponse" => "ascio\\v3\\CreateOrderResponse",
		"AbstractResponse" => "ascio\\v3\\AbstractResponse",
		"OrderInfo" => "ascio\\v3\\OrderInfo",
		"ValidateOrderResponse" => "ascio\\v3\\ValidateOrderResponse",
		"GetOrderRequest" => "ascio\\v3\\GetOrderRequest",
		"GetOrderResponse" => "ascio\\v3\\GetOrderResponse",
		"GetOrdersRequest" => "ascio\\v3\\GetOrdersRequest",
		"ArrayOfOrderStatusType" => "ascio\\v3\\ArrayOfOrderStatusType",
		"ArrayOfOrderType" => "ascio\\v3\\ArrayOfOrderType",
		"ArrayOfObjectType" => "ascio\\v3\\ArrayOfObjectType",
		"PagingInfo" => "ascio\\v3\\PagingInfo",
		"GetOrdersResponse" => "ascio\\v3\\GetOrdersResponse",
		"ArrayOfOrderInfo" => "ascio\\v3\\ArrayOfOrderInfo",
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
		"GetMark" => "ascio\\v3\\GetMark",
		"GetDefensive" => "ascio\\v3\\GetDefensive",
		"GetNameWatch" => "ascio\\v3\\GetNameWatch",
		"GetSslCertificate" => "ascio\\v3\\GetSslCertificate",
		"GetAutoInstallSsl" => "ascio\\v3\\GetAutoInstallSsl",
		"GetMessages" => "ascio\\v3\\GetMessages",
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
		"GetMark" => "ascio\\v3\\GetMark",
		"GetDefensive" => "ascio\\v3\\GetDefensive",
		"GetNameWatch" => "ascio\\v3\\GetNameWatch",
		"GetSslCertificate" => "ascio\\v3\\GetSslCertificate",
		"GetAutoInstallSsl" => "ascio\\v3\\GetAutoInstallSsl",
		"GetMessages" => "ascio\\v3\\GetMessages",
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
		"MessageType" => "ascio\\v3\\MessageType",
	];


	/**
	* Getters and setters for API-Properties
	*/
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
	public function getMark(GetMarkRequest $request) : GetMarkResponse {
		return $this->call("GetMark", ["request" => $request]);
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
	public function getMessages(GetMessagesRequest $request) : GetMessagesResponse {
		return $this->call("GetMessages", ["request" => $request]);
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