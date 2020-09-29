<?php

// XSLT-WSDL-Client. Generated PHP class of MailForward

namespace ascio\service\dns;
use ascio\db\dns\MailForwardDb;
use ascio\api\dns\MailForwardApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class MailForward extends Record  {

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