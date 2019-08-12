<?php

// XSLT-WSDL-Client. Generated PHP class of Response

namespace ascio\service\dns;
use ascio\base\dns\Base;
use ascio\db\dns\ResponseDb;
use ascio\api\dns\ResponseApi;


class Response extends Base  {

	protected $_apiProperties=["StatusCode", "StatusMessage", "TechnicalGuid", "TrackingReference", "Values"];
	protected $_apiObjects=["Values"];
	protected $StatusCode;
	protected $StatusMessage;
	protected $TechnicalGuid;
	protected $TrackingReference;
	protected $Values;

	public function setStatusCode (?int $StatusCode = null) : \ascio\dns\Response {
		$this->set("StatusCode", $StatusCode);
		return $this;
	}
	public function getStatusCode () : ?int {
		return $this->get("StatusCode", "int");
	}
	public function setStatusMessage (?string $StatusMessage = null) : \ascio\dns\Response {
		$this->set("StatusMessage", $StatusMessage);
		return $this;
	}
	public function getStatusMessage () : ?string {
		return $this->get("StatusMessage", "string");
	}
	public function setTechnicalGuid (?string $TechnicalGuid = null) : \ascio\dns\Response {
		$this->set("TechnicalGuid", $TechnicalGuid);
		return $this;
	}
	public function getTechnicalGuid () : ?string {
		return $this->get("TechnicalGuid", "string");
	}
	public function setTrackingReference (?string $TrackingReference = null) : \ascio\dns\Response {
		$this->set("TrackingReference", $TrackingReference);
		return $this;
	}
	public function getTrackingReference () : ?string {
		return $this->get("TrackingReference", "string");
	}
	public function setValues (?\ascio\dns\ArrayOfstring $Values = null) : \ascio\dns\Response {
		$this->set("Values", $Values);
		return $this;
	}
	public function getValues () : ?\ascio\dns\ArrayOfstring {
		return $this->get("Values", "\\ascio\\dns\\ArrayOfstring");
	}
	public function createValues () : \ascio\dns\ArrayOfstring {
		return $this->create ("Values", "\\ascio\\dns\\ArrayOfstring");
	}
}