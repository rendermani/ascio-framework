<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfSalesLineGroups

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfSalesLineGroupsDb;
use ascio\api\v3\ArrayOfSalesLineGroupsApi;
use ascio\base\v3\ArrayBase;


class ArrayOfSalesLineGroups extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["SalesLineGroup"];
	protected $_apiObjects=["SalesLineGroup"];
	protected $SalesLineGroup;

	public function setSalesLineGroup (?Iterable $SalesLineGroup = null) : self {
		$this->set("SalesLineGroup", $SalesLineGroup);
		return $this;
	}
	public function getSalesLineGroup () : ?Iterable {
		return $this->get("SalesLineGroup", "\\ascio\\v3\\SalesLineGroup");
	}
	public function createSalesLineGroup () : \ascio\v3\SalesLineGroup {
		return $this->create ("SalesLineGroup", "\\ascio\\v3\\SalesLineGroup");
	}
	public function addSalesLineGroup ($item = null) : \ascio\v3\SalesLineGroup {
		return $this->addItem("SalesLineGroup","\\ascio\\v3\\SalesLineGroup",func_get_args());
	}
}