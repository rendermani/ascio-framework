<?php

// XSLT-WSDL-Client. Generated PHP class of NS

namespace ascio\service\dns;
use ascio\db\dns\NSDb;
use ascio\api\dns\NSApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class NS extends Record  {

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