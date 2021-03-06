<?php

// XSLT-WSDL-Client. Generated PHP class of GetOrdersRequest

namespace ascio\service\v3;
use ascio\db\v3\GetOrdersRequestDb;
use ascio\api\v3\GetOrdersRequestApi;
use ascio\base\v3\DbBase;


class GetOrdersRequest extends DbBase  {

	protected $_apiProperties=["TransactionComment", "Comments", "FromDate", "ToDate", "OrderStatusTypes", "OrderTypes", "ObjectTypes", "OrderSort", "PageInfo", "ObjectNames", "ObjectHandles", "OrderIds"];
	protected $_apiObjects=["OrderStatusTypes", "OrderTypes", "ObjectTypes", "PageInfo", "ObjectNames", "ObjectHandles", "OrderIds"];
	protected $TransactionComment;
	protected $Comments;
	protected $FromDate;
	protected $ToDate;
	protected $OrderStatusTypes;
	protected $OrderTypes;
	protected $ObjectTypes;
	protected $OrderSort;
	protected $PageInfo;
	protected $ObjectNames;
	protected $ObjectHandles;
	protected $OrderIds;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetOrdersRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetOrdersRequestDb|null $db
	* @return GetOrdersRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setTransactionComment (?string $TransactionComment = null) : self {
		$this->set("TransactionComment", $TransactionComment);
		return $this;
	}
	public function getTransactionComment () : ?string {
		return $this->get("TransactionComment", "string");
	}
	public function setComments (?string $Comments = null) : self {
		$this->set("Comments", $Comments);
		return $this;
	}
	public function getComments () : ?string {
		return $this->get("Comments", "string");
	}
	public function setFromDate (?\DateTime $FromDate = null) : self {
		$this->set("FromDate", $FromDate);
		return $this;
	}
	public function getFromDate () : ?\DateTime {
		return $this->get("FromDate", "\\DateTime");
	}
	public function setToDate (?\DateTime $ToDate = null) : self {
		$this->set("ToDate", $ToDate);
		return $this;
	}
	public function getToDate () : ?\DateTime {
		return $this->get("ToDate", "\\DateTime");
	}
	public function setOrderStatusTypes (?\ascio\v3\ArrayOfOrderStatusType $OrderStatusTypes = null) : self {
		$this->set("OrderStatusTypes", $OrderStatusTypes);
		return $this;
	}
	public function getOrderStatusTypes () : ?\ascio\v3\ArrayOfOrderStatusType {
		return $this->get("OrderStatusTypes", "\\ascio\\v3\\ArrayOfOrderStatusType");
	}
	public function createOrderStatusTypes () : \ascio\v3\ArrayOfOrderStatusType {
		return $this->create ("OrderStatusTypes", "\\ascio\\v3\\ArrayOfOrderStatusType");
	}
	public function setOrderTypes (?\ascio\v3\ArrayOfOrderType $OrderTypes = null) : self {
		$this->set("OrderTypes", $OrderTypes);
		return $this;
	}
	public function getOrderTypes () : ?\ascio\v3\ArrayOfOrderType {
		return $this->get("OrderTypes", "\\ascio\\v3\\ArrayOfOrderType");
	}
	public function createOrderTypes () : \ascio\v3\ArrayOfOrderType {
		return $this->create ("OrderTypes", "\\ascio\\v3\\ArrayOfOrderType");
	}
	public function setObjectTypes (?\ascio\v3\ArrayOfObjectType $ObjectTypes = null) : self {
		$this->set("ObjectTypes", $ObjectTypes);
		return $this;
	}
	public function getObjectTypes () : ?\ascio\v3\ArrayOfObjectType {
		return $this->get("ObjectTypes", "\\ascio\\v3\\ArrayOfObjectType");
	}
	public function createObjectTypes () : \ascio\v3\ArrayOfObjectType {
		return $this->create ("ObjectTypes", "\\ascio\\v3\\ArrayOfObjectType");
	}
	public function setOrderSort (?string $OrderSort = null) : self {
		$this->set("OrderSort", $OrderSort);
		return $this;
	}
	public function getOrderSort () : ?string {
		return $this->get("OrderSort", "string");
	}
	public function setPageInfo (?\ascio\v3\PagingInfo $PageInfo = null) : self {
		$this->set("PageInfo", $PageInfo);
		return $this;
	}
	public function getPageInfo () : ?\ascio\v3\PagingInfo {
		return $this->get("PageInfo", "\\ascio\\v3\\PagingInfo");
	}
	public function createPageInfo () : \ascio\v3\PagingInfo {
		return $this->create ("PageInfo", "\\ascio\\v3\\PagingInfo");
	}
	public function setObjectNames (?\ascio\v3\ArrayOfstring $ObjectNames = null) : self {
		$this->set("ObjectNames", $ObjectNames);
		return $this;
	}
	public function getObjectNames () : ?\ascio\v3\ArrayOfstring {
		return $this->get("ObjectNames", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createObjectNames () : \ascio\v3\ArrayOfstring {
		return $this->create ("ObjectNames", "\\ascio\\v3\\ArrayOfstring");
	}
	public function setObjectHandles (?\ascio\v3\ArrayOfstring $ObjectHandles = null) : self {
		$this->set("ObjectHandles", $ObjectHandles);
		return $this;
	}
	public function getObjectHandles () : ?\ascio\v3\ArrayOfstring {
		return $this->get("ObjectHandles", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createObjectHandles () : \ascio\v3\ArrayOfstring {
		return $this->create ("ObjectHandles", "\\ascio\\v3\\ArrayOfstring");
	}
	public function setOrderIds (?\ascio\v3\ArrayOfstring $OrderIds = null) : self {
		$this->set("OrderIds", $OrderIds);
		return $this;
	}
	public function getOrderIds () : ?\ascio\v3\ArrayOfstring {
		return $this->get("OrderIds", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createOrderIds () : \ascio\v3\ArrayOfstring {
		return $this->create ("OrderIds", "\\ascio\\v3\\ArrayOfstring");
	}
}