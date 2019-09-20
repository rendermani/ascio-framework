<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\api\v2;


class DomainApi extends ApiModel {

	public const IdProperty="DomainHandle";
	public $parent;
	public $client;
	protected $properties=["DomainName", "DomainHandle", "RegPeriod", "RenewPeriod", "Status", "AuthInfo", "CreDate", "ExpDate", "EncodingType", "DomainPurpose", "Comment", "TransferLock", "DeleteLock", "UpdateLock", "QueueType", "Registrant", "AdminContact", "TechContact", "BillingContact", "ResellerContact", "NameServers", "Trademark", "DnsSecKeys", "PrivacyProxy", "DomainType", "DiscloseSocialData"];
	protected $objects=["Registrant", "AdminContact", "TechContact", "BillingContact", "ResellerContact", "NameServers", "Trademark", "DnsSecKeys", "PrivacyProxy"];

	function create() {
		throw new Exception("Not implemented yet.");
	}
	function update() {
		throw new Exception("Not implemented yet.");
	}
	function delete() {
		throw new Exception("Not implemented yet.");
	}
	function get() {
		throw new Exception("Not implemented yet.");
	}
}