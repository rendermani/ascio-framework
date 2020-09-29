<?php

// XSLT-WSDL-Client. Generated PHP class of SearchUser

namespace ascio\service\dns;
use ascio\db\dns\SearchUserDb;
use ascio\api\dns\SearchUserApi;
use ascio\base\dns\RequestRootElement;


class SearchUser extends RequestRootElement  {

	protected $_apiProperties=["searchUserClauses"];
	protected $_apiObjects=["searchUserClauses"];
	protected $searchUserClauses;

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