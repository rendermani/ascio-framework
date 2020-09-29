<?php

// XSLT-WSDL-Client. Generated DB-Model class of DomainInfo. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;
use ascio\v3\DomainInfo;
use ascio\v3\GetDomainRequest;

class DomainInfoApi extends ApiModel {

	public $idProperty="DomainHandle";
	public $parent;
	protected $properties=["DomainName", "DomainHandle", "RegPeriod", "RenewPeriod", "Status", "AuthInfo", "Created", "Expires", "EncodingType", "DomainPurpose", "Comment", "TransferLock", "DeleteLock", "UpdateLock", "QueueType", "Owner", "Admin", "Tech", "Billing", "Reseller", "NameServers", "Trademark", "DnsSecKeys", "PrivacyProxy", "DomainType", "DiscloseSocialData", "LocalPresence"];
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
	function get($domainHandle=null) : DomainInfo {
		$domainInfo = $this->parent(); 
		$request = new GetDomainRequest();
		$request->setHandle($domainHandle);
		$result = $this->getClient()->getDomain($request);
		$domainInfo->set($result->getDomainInfo());
		return $domainInfo;
	}
}