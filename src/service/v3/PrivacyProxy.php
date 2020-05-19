<?php

// XSLT-WSDL-Client. Generated PHP class of PrivacyProxy

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\PrivacyProxyDb;
use ascio\api\v3\PrivacyProxyApi;


class PrivacyProxy extends Base  {

	protected $_apiProperties=["Type", "PrivacyAdmin", "PrivacyTech", "PrivacyBilling", "Extensions"];
	protected $_apiObjects=["Extensions"];
	protected $Type;
	protected $PrivacyAdmin;
	protected $PrivacyTech;
	protected $PrivacyBilling;
	protected $Extensions;

	public function setType (?string $Type = null) : self {
		$this->set("Type", $Type);
		return $this;
	}
	public function getType () : ?string {
		return $this->get("Type", "string");
	}
	public function setPrivacyAdmin (?bool $PrivacyAdmin = null) : self {
		$this->set("PrivacyAdmin", $PrivacyAdmin);
		return $this;
	}
	public function getPrivacyAdmin () : ?bool {
		return $this->get("PrivacyAdmin", "bool");
	}
	public function setPrivacyTech (?bool $PrivacyTech = null) : self {
		$this->set("PrivacyTech", $PrivacyTech);
		return $this;
	}
	public function getPrivacyTech () : ?bool {
		return $this->get("PrivacyTech", "bool");
	}
	public function setPrivacyBilling (?bool $PrivacyBilling = null) : self {
		$this->set("PrivacyBilling", $PrivacyBilling);
		return $this;
	}
	public function getPrivacyBilling () : ?bool {
		return $this->get("PrivacyBilling", "bool");
	}
	public function setExtensions (?\ascio\v3\Extensions $Extensions = null) : self {
		$this->set("Extensions", $Extensions);
		return $this;
	}
	public function getExtensions () : ?\ascio\v3\Extensions {
		return $this->get("Extensions", "\\ascio\\v3\\Extensions");
	}
	public function createExtensions () : \ascio\v3\Extensions {
		return $this->create ("Extensions", "\\ascio\\v3\\Extensions");
	}
}