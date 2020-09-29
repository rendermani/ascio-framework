<?php

// XSLT-WSDL-Client. Generated PHP class of WebForward

namespace ascio\service\dns;
use ascio\db\dns\WebForwardDb;
use ascio\api\dns\WebForwardApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class WebForward extends Record  {

	protected $_apiProperties=["Id", "Serial", "Source", "TTL", "Target", "UpdatedDate", "RedirectionType"];
	protected $_apiObjects=[];
	protected $_substituted = true;
	protected $Id;
	protected $Serial;
	protected $Source;
	protected $TTL;
	protected $Target;
	protected $UpdatedDate;
	protected $RedirectionType;

	public function setRedirectionType (?string $RedirectionType = null) : self {
		$this->set("RedirectionType", $RedirectionType);
		return $this;
	}
	public function getRedirectionType () : ?string {
		return $this->get("RedirectionType", "string");
	}
}