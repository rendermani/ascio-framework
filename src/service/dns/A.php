<?php

// XSLT-WSDL-Client. Generated PHP class of A

namespace ascio\service\dns;
use ascio\db\dns\ADb;
use ascio\api\dns\AApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class A extends Record  {

	protected $_apiProperties=["Id", "Serial", "Source", "TTL", "Target", "UpdatedDate"];
	protected $_apiObjects=[];
	protected $_substituted = true;
	protected $Id;
	protected $Serial;
	protected $Source;
	protected $TTL;
	protected $Target;
	protected $UpdatedDate;

}