<?php

// XSLT-WSDL-Client. Generated PHP class of Clause

namespace ascio\service\v2;
use ascio\base\v2\Base;
use ascio\db\v2\ClauseDb;
use ascio\api\v2\ClauseApi;


class Clause extends Base  {

	protected $_apiProperties=["Attribute", "Operator", "Value"];
	protected $_apiObjects=[];
	protected $Attribute;
	protected $Operator;
	protected $Value;

	public function setAttribute (?string $Attribute = null) : \ascio\v2\Clause {
		$this->set("Attribute", $Attribute);
		return $this;
	}
	public function getAttribute () : ?string {
		return $this->get("Attribute", "string");
	}
	public function setOperator (?string $Operator = null) : \ascio\v2\Clause {
		$this->set("Operator", $Operator);
		return $this;
	}
	public function getOperator () : ?string {
		return $this->get("Operator", "string");
	}
	public function setValue (?string $Value = null) : \ascio\v2\Clause {
		$this->set("Value", $Value);
		return $this;
	}
	public function getValue () : ?string {
		return $this->get("Value", "string");
	}
}