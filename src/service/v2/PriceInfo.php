<?php

// XSLT-WSDL-Client. Generated PHP class of PriceInfo

namespace ascio\service\v2;
use ascio\base\v2\Base;
use ascio\db\v2\PriceInfoDb;
use ascio\api\v2\PriceInfoApi;


abstract class PriceInfo extends Base  {

	protected $_apiProperties=["DomainName", "DomainType", "Currency", "Prices", "RenewalType"];
	protected $_apiObjects=["Prices"];
	protected $DomainName;
	protected $DomainType;
	protected $Currency;
	protected $Prices;
	protected $RenewalType;

	/**
	* Getters and setters for API-Properties
	*/
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
	public function setPrices (?\ascio\v2\ArrayOfPrices $Prices = null) : self {
		$this->set("Prices", $Prices);
		return $this;
	}
	public function getPrices () : ?\ascio\v2\ArrayOfPrices {
		return $this->get("Prices", "\\ascio\\v2\\ArrayOfPrices");
	}
	public function createPrices () : \ascio\v2\ArrayOfPrices {
		return $this->create ("Prices", "\\ascio\\v2\\ArrayOfPrices");
	}
	public function setRenewalType (?string $RenewalType = null) : self {
		$this->set("RenewalType", $RenewalType);
		return $this;
	}
	public function getRenewalType () : ?string {
		return $this->get("RenewalType", "string");
	}
}