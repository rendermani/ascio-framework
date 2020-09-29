<?php

// XSLT-WSDL-Client. Generated PHP class of CNAME

namespace ascio\service\dns;
use ascio\db\dns\CNAMEDb;
use ascio\api\dns\CNAMEApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class CNAME extends Record  {

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