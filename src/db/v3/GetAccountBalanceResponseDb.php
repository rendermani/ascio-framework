<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetAccountBalanceResponse. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class GetAccountBalanceResponseDb extends DbModel {
	protected $table="v3_GetAccountBalanceResponse";
	public function getVat(){
		return $this->getRelationObject("v3","double","Vat");
	}
	public function getUnInvoicedOrders(){
		return $this->getRelationObject("v3","double","UnInvoicedOrders");
	}
	public function getUnInvoicedOpenOrders(){
		return $this->getRelationObject("v3","double","UnInvoicedOpenOrders");
	}
	public function getUnInvoicedCompletedOrders(){
		return $this->getRelationObject("v3","double","UnInvoicedCompletedOrders");
	}
	public function getUnInvoicedCompletedOrdersLast24h(){
		return $this->getRelationObject("v3","double","UnInvoicedCompletedOrdersLast24h");
	}
	public function getAccountBalance(){
		return $this->getRelationObject("v3","double","AccountBalance");
	}
	public function getCurrentBalance(){
		return $this->getRelationObject("v3","double","CurrentBalance");
	}
	public function getReminderThreshold(){
		return $this->getRelationObject("v3","double","ReminderThreshold");
	}
	public function getBlockingThreshold(){
		return $this->getRelationObject("v3","double","BlockingThreshold");
	}
	public function getReminderEmailAddress(){
		return $this->getRelationObject("v3","ArrayOfstring","ReminderEmailAddress");
	}
	public function getInvoiceEmailAddress(){
		return $this->getRelationObject("v3","ArrayOfstring","InvoiceEmailAddress");
	}

}