<?php

// XSLT-WSDL-Client. Generated PHP class of AvailabilityInfoResponse

namespace ascio\service\v3;
use ascio\db\v3\AvailabilityInfoResponseDb;
use ascio\api\v3\AvailabilityInfoResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class AvailabilityInfoResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "DomainName", "DomainType", "Currency", "RenewalType", "Prices"];
	protected $_apiObjects=["Errors", "Prices"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $DomainName;
	protected $DomainType;
	protected $Currency;
	protected $RenewalType;
	protected $Prices;

	public function setDomainName (?string $DomainName = null) : self {
		$this->set("DomainName", $DomainName);
		return $this;
	}
	public function getDomainName () : ?string {
		return $this->get("DomainName", "string");
	}
	public function setDomainType (?string $DomainType = null) : self {
		$this->set("DomainType", $DomainType);
		return $this;
	}
	public function getDomainType () : ?string {
		return $this->get("DomainType", "string");
	}
	public function setCurrency (?string $Currency = null) : self {
		$this->set("Currency", $Currency);
		return $this;
	}
	public function getCurrency () : ?string {
		return $this->get("Currency", "string");
	}
	public function setRenewalType (?string $RenewalType = null) : self {
		$this->set("RenewalType", $RenewalType);
		return $this;
	}
	public function getRenewalType () : ?string {
		return $this->get("RenewalType", "string");
	}
	public function setPrices (?\ascio\v3\ArrayOfPrices $Prices = null) : self {
		$this->set("Prices", $Prices);
		return $this;
	}
	public function getPrices () : ?\ascio\v3\ArrayOfPrices {
		return $this->get("Prices", "\\ascio\\v3\\ArrayOfPrices");
	}
	public function createPrices () : \ascio\v3\ArrayOfPrices {
		return $this->create ("Prices", "\\ascio\\v3\\ArrayOfPrices");
	}
}