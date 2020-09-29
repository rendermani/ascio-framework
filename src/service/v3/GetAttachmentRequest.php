<?php

// XSLT-WSDL-Client. Generated PHP class of GetAttachmentRequest

namespace ascio\service\v3;
use ascio\db\v3\GetAttachmentRequestDb;
use ascio\api\v3\GetAttachmentRequestApi;
use ascio\base\v3\Base;


class GetAttachmentRequest extends Base  {

	protected $_apiProperties=["AttachmentId", "OrderId"];
	protected $_apiObjects=[];
	protected $AttachmentId;
	protected $OrderId;

	public function setAttachmentId (?int $AttachmentId = null) : self {
		$this->set("AttachmentId", $AttachmentId);
		return $this;
	}
	public function getAttachmentId () : ?int {
		return $this->get("AttachmentId", "int");
	}
	public function setOrderId (?string $OrderId = null) : self {
		$this->set("OrderId", $OrderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("OrderId", "string");
	}
}