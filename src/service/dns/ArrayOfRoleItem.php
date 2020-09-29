<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfRoleItem

namespace ascio\service\dns;
use ascio\db\dns\ArrayOfRoleItemDb;
use ascio\api\dns\ArrayOfRoleItemApi;
use ascio\base\dns\ArrayBase;


class ArrayOfRoleItem extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["RoleItem"];
	protected $_apiObjects=["RoleItem"];
	protected $RoleItem;

	public function setRoleItem (?Iterable $RoleItem = null) : self {
		$this->set("RoleItem", $RoleItem);
		return $this;
	}
	public function getRoleItem () : ?Iterable {
		return $this->get("RoleItem", "\\ascio\\dns\\RoleItem");
	}
	public function createRoleItem () : \ascio\dns\RoleItem {
		return $this->create ("RoleItem", "\\ascio\\dns\\RoleItem");
	}
	public function addRoleItem ($item = null) : \ascio\dns\RoleItem {
		return $this->addItem("RoleItem","\\ascio\\dns\\RoleItem",func_get_args());
	}
}