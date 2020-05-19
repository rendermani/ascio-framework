<?php

// XSLT-WSDL-Client. Generated DB-Model class of DomainInfo. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;


class DomainInfoApi extends ApiModel {

	public $idProperty="DomainHandle";
	public $parent;
	protected $properties=["DomainName", "DomainHandle", "RegPeriod", "RenewPeriod", "Status", "AuthInfo", "CreDate", "ExpDate", "EncodingType", "DomainPurpose", "Comment", "TransferLock", "DeleteLock", "UpdateLock", "QueueType", "Owner", "Admin", "Tech", "Billing", "Reseller", "NameServers", "Trademark", "DnsSecKeys", "PrivacyProxy", "DomainType", "DiscloseSocialData", "LocalPresence"];
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
	function get($id=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
}