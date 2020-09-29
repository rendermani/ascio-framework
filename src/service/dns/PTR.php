<?php

// XSLT-WSDL-Client. Generated PHP class of PTR

namespace ascio\service\dns;
use ascio\db\dns\PTRDb;
use ascio\api\dns\PTRApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class PTR extends Record  {

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