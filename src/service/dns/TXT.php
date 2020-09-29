<?php

// XSLT-WSDL-Client. Generated PHP class of TXT

namespace ascio\service\dns;
use ascio\db\dns\TXTDb;
use ascio\api\dns\TXTApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class TXT extends Record  {

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