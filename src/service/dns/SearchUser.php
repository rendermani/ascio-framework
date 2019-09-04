<?php

// XSLT-WSDL-Client. Generated PHP class of SearchUser

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\SearchUserDb;
use ascio\api\dns\SearchUserApi;


abstract class SearchUser extends RequestRootElement  {

	protected $_apiProperties=["searchUserClauses"];
	protected $_apiObjects=["searchUserClauses"];
	protected $searchUserClauses;

	/**
	* Getters and setters for API-Properties
	*/
	public function setSearchUserClauses (?\ascio\dns\ArrayOfSearchUserClause $searchUserClauses = null) : self {
		$this->set("searchUserClauses", $searchUserClauses);
		return $this;
	}
	public function getSearchUserClauses () : ?\ascio\dns\ArrayOfSearchUserClause {
		return $this->get("searchUserClauses", "\\ascio\\dns\\ArrayOfSearchUserClause");
	}
	public function createSearchUserClauses () : \ascio\dns\ArrayOfSearchUserClause {
		return $this->create ("searchUserClauses", "\\ascio\\dns\\ArrayOfSearchUserClause");
	}
}