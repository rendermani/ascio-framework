<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;


class DomainApi extends ApiModel {

	public $idProperty="Handle";
	public $parent;
	protected $properties=["Name", "Handle", "RenewPeriod", "Status", "AuthInfo", "Created", "Expires", "EncodingType", "DomainPurpose", "Comment", "TransferLock", "DeleteLock", "UpdateLock", "QueueType", "Owner", "Admin", "Tech", "Billing", "Reseller", "NameServers", "Trademark", "DnsSecKeys", "PrivacyProxy", "DomainType", "DiscloseSocialData", "LocalPresence"];
	protected $objects=["Owner", "Admin", "Tech", "Billing", "Reseller", "NameServers", "Trademark", "DnsSecKeys", "PrivacyProxy"];

	function create($data=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function update($data=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function delete($id=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function get($id=null) : DomainInfo {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
}