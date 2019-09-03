<?php

// XSLT-WSDL-Client. Generated PHP class of PagingInfo

namespace ascio\service\v2;
use ascio\base\v2\Base;
use ascio\db\v2\PagingInfoDb;
use ascio\api\v2\PagingInfoApi;


abstract class PagingInfo extends Base  {

	protected $_apiProperties=["PageIndex", "PageSize"];
	protected $_apiObjects=[];
	protected $PageIndex;
	protected $PageSize;

	public function setPageIndex (?int $PageIndex = null) : self {
		$this->set("PageIndex", $PageIndex);
		return $this;
	}
	public function getPageIndex () : ?int {
		return $this->get("PageIndex", "int");
	}
	public function setPageSize (?int $PageSize = null) : self {
		$this->set("PageSize", $PageSize);
		return $this;
	}
	public function getPageSize () : ?int {
		return $this->get("PageSize", "int");
	}
}