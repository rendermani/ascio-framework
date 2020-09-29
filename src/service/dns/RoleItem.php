<?php

// XSLT-WSDL-Client. Generated PHP class of RoleItem

namespace ascio\service\dns;
use ascio\db\dns\RoleItemDb;
use ascio\api\dns\RoleItemApi;
use ascio\base\dns\Base;


class RoleItem extends Base  {

	protected $_apiProperties=["Rights", "Role"];
	protected $_apiObjects=["Rights"];
	protected $Rights;
	protected $Role;

	public function setRights (?\ascio\dns\ArrayOfstring $Rights = null) : self {
		$this->set("Rights", $Rights);
		return $this;
	}
	public function getRights () : ?\ascio\dns\ArrayOfstring {
		return $this->get("Rights", "\\ascio\\dns\\ArrayOfstring");
	}
	public function createRights () : \ascio\dns\ArrayOfstring {
		return $this->create ("Rights", "\\ascio\\dns\\ArrayOfstring");
	}
	public function setRole (?string $Role = null) : self {
		$this->set("Role", $Role);
		return $this;
	}
	public function getRole () : ?string {
		return $this->get("Role", "string");
	}
}