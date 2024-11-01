<?php

// XSLT-WSDL-Client. Generated DB-Model class of ErrorCode. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class ErrorCodeDb extends DbModel {
	protected $table="v3_ErrorCode";
	protected $_customColumnTypes = [
		"Message" => [
			"type" => "text",
			"parameters" => [
				"nullable" => true,
				"length" => 2048
			]
		]
	];
}