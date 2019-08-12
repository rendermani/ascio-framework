<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\api\v2;
use ascio\base\v2\ApiModel;
use ascio\lib\AscioException;
use ascio\v2\Domain;

class DomainApi extends ApiModel {

	public $idProperty="DomainHandle";
	public $parent;
	protected $properties=["DomainName", "DomainHandle", "RegPeriod", "RenewPeriod", "Status", "AuthInfo", "CreDate", "ExpDate", "EncodingType", "DomainPurpose", "Comment", "TransferLock", "DeleteLock", "UpdateLock", "QueueType", "Registrant", "AdminContact", "TechContact", "BillingContact", "ResellerContact", "NameServers", "Trademark", "DnsSecKeys", "PrivacyProxy", "DomainType", "DiscloseSocialData"];
	protected $objects=["Registrant", "AdminContact", "TechContact", "BillingContact", "ResellerContact", "NameServers", "Trademark", "DnsSecKeys", "PrivacyProxy"];

	function create($data=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function update($data=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function delete($id=null)  {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	/**
	 * @return Domain
	 */
	function get($handle=null)  {
		$handle = $handle ? $handle : $this->parent()->getDomainHandle();
		if(!$handle) {
			throw new AscioException("No Handle provided for Domain: ". $this->parent()->getDomainName());
		}
		$result = $this->getClient()->getDomain($handle);
		$this->parent()->set($result->getDomain());
		return $this->parent(); 
	}
}