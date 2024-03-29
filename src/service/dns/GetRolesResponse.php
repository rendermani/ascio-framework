<?php

// XSLT-WSDL-Client. Generated PHP class of GetRolesResponse

namespace ascio\service\dns;
use ascio\db\dns\GetRolesResponseDb;
use ascio\api\dns\GetRolesResponseApi;
use ascio\base\dns\ResponseRootElement;


class GetRolesResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetRolesResult", "roles"];
	protected $_apiObjects=["GetRolesResult", "roles"];
	protected $GetRolesResult;
	protected $roles;

	public function setGetRolesResult (?\ascio\dns\Response $GetRolesResult = null) : self {
		$this->set("GetRolesResult", $GetRolesResult);
		return $this;
	}
	public function getGetRolesResult () : ?\ascio\dns\Response {
		return $this->get("GetRolesResult", "\\ascio\\dns\\Response");
	}
	public function createGetRolesResult () : \ascio\dns\Response {
		return $this->create ("GetRolesResult", "\\ascio\\dns\\Response");
	}
	public function setRoles (?\ascio\dns\ArrayOfRoleItem $roles = null) : self {
		$this->set("roles", $roles);
		return $this;
	}
	public function getRoles () : ?\ascio\dns\ArrayOfRoleItem {
		return $this->get("roles", "\\ascio\\dns\\ArrayOfRoleItem");
	}
	public function createRoles () : \ascio\dns\ArrayOfRoleItem {
		return $this->create ("roles", "\\ascio\\dns\\ArrayOfRoleItem");
	}
}