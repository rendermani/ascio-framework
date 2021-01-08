<?php

// XSLT-WSDL-Client. Generated PHP class of PremiumDomainInfo

namespace ascio\service\v3;
use ascio\db\v3\PremiumDomainInfoDb;
use ascio\api\v3\PremiumDomainInfoApi;
use ascio\base\v3\Base;


class PremiumDomainInfo extends Base  {

	protected $_apiProperties=["DomainName", "DomainHandle", "Status", "Created", "Expires", "Currency", "RegistrationPrice", "RegistrationPeriod", "RenewalPrice", "RenewPeriod", "ExplicitRenewalPrice", "ExplicitRenewPeriod", "TransferPrice", "TransferPeriod", "RestorePrice", "RestorePeriod", "RenewsAtStandardPrice"];
	protected $_apiObjects=[];
	protected $DomainName;
	protected $DomainHandle;
	protected $Status;
	protected $Created;
	protected $Expires;
	protected $Currency;
	protected $RegistrationPrice;
	protected $RegistrationPeriod;
	protected $RenewalPrice;
	protected $RenewPeriod;
	protected $ExplicitRenewalPrice;
	protected $ExplicitRenewPeriod;
	protected $TransferPrice;
	protected $TransferPeriod;
	protected $RestorePrice;
	protected $RestorePeriod;
	protected $RenewsAtStandardPrice;

	public function setDomainName (?string $DomainName = null) : self {
		$this->set("DomainName", $DomainName);
		return $this;
	}
	public function getDomainName () : ?string {
		return $this->get("DomainName", "string");
	}
	public function setDomainHandle (?string $DomainHandle = null) : self {
		$this->set("DomainHandle", $DomainHandle);
		return $this;
	}
	public function getDomainHandle () : ?string {
		return $this->get("DomainHandle", "string");
	}
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setCreated (?\DateTime $Created = null) : self {
		$this->set("Created", $Created);
		return $this;
	}
	public function getCreated () : ?\DateTime {
		return $this->get("Created", "\\DateTime");
	}
	public function setExpires (?\DateTime $Expires = null) : self {
		$this->set("Expires", $Expires);
		return $this;
	}
	public function getExpires () : ?\DateTime {
		return $this->get("Expires", "\\DateTime");
	}
	public function setCurrency (?string $Currency = null) : self {
		$this->set("Currency", $Currency);
		return $this;
	}
	public function getCurrency () : ?string {
		return $this->get("Currency", "string");
	}
	public function setRegistrationPrice (?\decimal $RegistrationPrice = null) : self {
		$this->set("RegistrationPrice", $RegistrationPrice);
		return $this;
	}
	public function getRegistrationPrice () : ?\decimal {
		return $this->get("RegistrationPrice", "\\decimal");
	}
	public function setRegistrationPeriod (?int $RegistrationPeriod = null) : self {
		$this->set("RegistrationPeriod", $RegistrationPeriod);
		return $this;
	}
	public function getRegistrationPeriod () : ?int {
		return $this->get("RegistrationPeriod", "int");
	}
	public function setRenewalPrice (?\decimal $RenewalPrice = null) : self {
		$this->set("RenewalPrice", $RenewalPrice);
		return $this;
	}
	public function getRenewalPrice () : ?\decimal {
		return $this->get("RenewalPrice", "\\decimal");
	}
	public function setRenewPeriod (?int $RenewPeriod = null) : self {
		$this->set("RenewPeriod", $RenewPeriod);
		return $this;
	}
	public function getRenewPeriod () : ?int {
		return $this->get("RenewPeriod", "int");
	}
	public function setExplicitRenewalPrice (?\decimal $ExplicitRenewalPrice = null) : self {
		$this->set("ExplicitRenewalPrice", $ExplicitRenewalPrice);
		return $this;
	}
	public function getExplicitRenewalPrice () : ?\decimal {
		return $this->get("ExplicitRenewalPrice", "\\decimal");
	}
	public function setExplicitRenewPeriod (?int $ExplicitRenewPeriod = null) : self {
		$this->set("ExplicitRenewPeriod", $ExplicitRenewPeriod);
		return $this;
	}
	public function getExplicitRenewPeriod () : ?int {
		return $this->get("ExplicitRenewPeriod", "int");
	}
	public function setTransferPrice (?\decimal $TransferPrice = null) : self {
		$this->set("TransferPrice", $TransferPrice);
		return $this;
	}
	public function getTransferPrice () : ?\decimal {
		return $this->get("TransferPrice", "\\decimal");
	}
	public function setTransferPeriod (?int $TransferPeriod = null) : self {
		$this->set("TransferPeriod", $TransferPeriod);
		return $this;
	}
	public function getTransferPeriod () : ?int {
		return $this->get("TransferPeriod", "int");
	}
	public function setRestorePrice (?\decimal $RestorePrice = null) : self {
		$this->set("RestorePrice", $RestorePrice);
		return $this;
	}
	public function getRestorePrice () : ?\decimal {
		return $this->get("RestorePrice", "\\decimal");
	}
	public function setRestorePeriod (?int $RestorePeriod = null) : self {
		$this->set("RestorePeriod", $RestorePeriod);
		return $this;
	}
	public function getRestorePeriod () : ?int {
		return $this->get("RestorePeriod", "int");
	}
	public function setRenewsAtStandardPrice (?bool $RenewsAtStandardPrice = null) : self {
		$this->set("RenewsAtStandardPrice", $RenewsAtStandardPrice);
		return $this;
	}
	public function getRenewsAtStandardPrice () : ?bool {
		return $this->get("RenewsAtStandardPrice", "bool");
	}
}