<?php

// XSLT-WSDL-Client. Generated PHP class of SearchZoneClause

namespace ascio\service\dns;
use ascio\db\dns\SearchZoneClauseDb;
use ascio\api\dns\SearchZoneClauseApi;
use ascio\base\dns\Base;


class SearchZoneClause extends Base  {

	protected $_apiProperties=["Operator", "SearchZoneField", "Value"];
	protected $_apiObjects=[];
	protected $Operator;
	protected $SearchZoneField;
	protected $Value;

	public function setOperator (?string $Operator = null) : self {
		$this->set("Operator", $Operator);
		return $this;
	}
	public function getOperator () : ?string {
		return $this->get("Operator", "string");
	}
	public function setSearchZoneField (?string $SearchZoneField = null) : self {
		$this->set("SearchZoneField", $SearchZoneField);
		return $this;
	}
	public function getSearchZoneField () : ?string {
		return $this->get("SearchZoneField", "string");
	}
	public function setValue (?string $Value = null) : self {
		$this->set("Value", $Value);
		return $this;
	}
	public function getValue () : ?string {
		return $this->get("Value", "string");
	}
}