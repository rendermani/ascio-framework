<?php

// XSLT-WSDL-Client. Generated PHP class of GetNameWatchList

namespace ascio\service\v3;
use ascio\db\v3\GetNameWatchListDb;
use ascio\api\v3\GetNameWatchListApi;
use ascio\base\v3\RequestRootElement;


class GetNameWatchList extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetNameWatchListRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetNameWatchListRequest {
		return $this->get("request", "\\ascio\\v3\\GetNameWatchListRequest");
	}
	public function createRequest () : \ascio\v3\GetNameWatchListRequest {
		return $this->create ("request", "\\ascio\\v3\\GetNameWatchListRequest");
	}
}