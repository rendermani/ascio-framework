<?php

// XSLT-WSDL-Client. Generated DB-Model class of SslCertificate. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class SslCertificateDb extends DbModel {
	protected $table="v3_SslCertificate";
	public function getOwner(){
		return $this->getRelationObject("v3","Registrant","Owner");
	}
	public function getAdmin(){
		return $this->getRelationObject("v3","Contact","Admin");
	}
	public function getTech(){
		return $this->getRelationObject("v3","Contact","Tech");
	}
	public function getSanNames(){
		return $this->getRelationObject("v3","ArrayOfstring","SanNames");
	}
	protected $_customColumnTypes = [
		"CSR" => [
			"type" => "text",
			"parameters" => [
				"nullable" => true
			]
		]
	];

}