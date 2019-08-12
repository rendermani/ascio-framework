<?php

// XSLT-WSDL-Client. Generated PHP class of GetRolesResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\GetRolesResponseDb;
use ascio\api\dns\GetRolesResponseApi;


class GetRolesResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetRolesResult", "roles"];
	protected $_apiObjects=["GetRolesResult", "roles"];
	protected $GetRolesResult;
	protected $roles;

	public function setGetRolesResult (?\ascio\dns\Response $GetRolesResult = null) : \ascio\dns\GetRolesResponse {
		$this->set("GetRolesResult", $GetRolesResult);
		return $this;
	}
	public function getGetRolesResult () : ?\ascio\dns\Response {
		return $this->get("GetRolesResult", "\\ascio\\dns\\Response");
	}
	public function createGetRolesResult () : \ascio\dns\Response {
		return $this->create ("GetRolesResult", "\\ascio\\dns\\Response");
	}
	public function setRoles (?\ascio\dns\ArrayOfRoleItem $roles = null) : \ascio\dns\GetRolesResponse {
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