<?php

// XSLT-WSDL-Client. Generated PHP class of OrderHistory

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\OrderHistoryDb;
use ascio\api\v3\OrderHistoryApi;


class OrderHistory extends Base  {

	protected $_apiProperties=["State", "Date"];
	protected $_apiObjects=[];
	protected $State;
	protected $Date;

	public function setState (?string $State = null) : self {
		$this->set("State", $State);
		return $this;
	}
	public function getState () : ?string {
		return $this->get("State", "string");
	}
	public function setDate (?\DateTime $Date = null) : self {
		$this->set("Date", $Date);
		return $this;
	}
	public function getDate () : ?\DateTime {
		return $this->get("Date", "\\DateTime");
	}
}