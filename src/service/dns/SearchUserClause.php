<?php

// XSLT-WSDL-Client. Generated PHP class of SearchUserClause

namespace ascio\service\dns;
use ascio\base\dns\Base;
use ascio\db\dns\SearchUserClauseDb;
use ascio\api\dns\SearchUserClauseApi;


abstract class SearchUserClause extends Base  {

	protected $_apiProperties=["Operator", "SearchUserField", "Value"];
	protected $_apiObjects=[];
	protected $Operator;
	protected $SearchUserField;
	protected $Value;

	public function setOperator (?string $Operator = null) : self {
		$this->set("Operator", $Operator);
		return $this;
	}
	public function getOperator () : ?string {
		return $this->get("Operator", "string");
	}
	public function setSearchUserField (?string $SearchUserField = null) : self {
		$this->set("SearchUserField", $SearchUserField);
		return $this;
	}
	public function getSearchUserField () : ?string {
		return $this->get("SearchUserField", "string");
	}
	public function setValue (?string $Value = null) : self {
		$this->set("Value", $Value);
		return $this;
	}
	public function getValue () : ?string {
		return $this->get("Value", "string");
	}
}