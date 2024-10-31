<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetOrdersRequest. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class GetOrdersRequestDb extends DbModel {
	protected $table="v3_GetOrdersRequest";
	public function getOrderStatusTypes(){
		return $this->getRelationObject("v3","ArrayOfOrderStatusType","OrderStatusTypes");
	}
	public function getOrderTypes(){
		return $this->getRelationObject("v3","ArrayOfOrderType","OrderTypes");
	}
	public function getObjectTypes(){
		return $this->getRelationObject("v3","ArrayOfObjectType","ObjectTypes");
	}
	public function getPageInfo(){
		return $this->getRelationObject("v3","PagingInfo","PageInfo");
	}

}