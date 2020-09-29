<?php

// XSLT-WSDL-Client. Generated PHP class of SearchContactResponse

namespace ascio\service\v2;
use ascio\db\v2\SearchContactResponseDb;
use ascio\api\v2\SearchContactResponseApi;
use ascio\base\v2\ResponseRootElement;


class SearchContactResponse extends ResponseRootElement  {

	protected $_apiProperties=["SearchContactResult", "contacts"];
	protected $_apiObjects=["SearchContactResult", "contacts"];
	protected $SearchContactResult;
	protected $contacts;

	public function setSearchContactResult (?\ascio\v2\Response $SearchContactResult = null) : self {
		$this->set("SearchContactResult", $SearchContactResult);
		return $this;
	}
	public function getSearchContactResult () : ?\ascio\v2\Response {
		return $this->get("SearchContactResult", "\\ascio\\v2\\Response");
	}
	public function createSearchContactResult () : \ascio\v2\Response {
		return $this->create ("SearchContactResult", "\\ascio\\v2\\Response");
	}
	public function setContacts (?\ascio\v2\ArrayOfContact $contacts = null) : self {
		$this->set("contacts", $contacts);
		return $this;
	}
	public function getContacts () : ?\ascio\v2\ArrayOfContact {
		return $this->get("contacts", "\\ascio\\v2\\ArrayOfContact");
	}
	public function createContacts () : \ascio\v2\ArrayOfContact {
		return $this->create ("contacts", "\\ascio\\v2\\ArrayOfContact");
	}
}