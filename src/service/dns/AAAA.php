<?php

// XSLT-WSDL-Client. Generated PHP class of AAAA

namespace ascio\service\dns;
use ascio\db\dns\AAAADb;
use ascio\api\dns\AAAAApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class AAAA extends Record  {

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