<?php

// XSLT-WSDL-Client. Generated PHP class of GetAccountTransactionsRequest

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\GetAccountTransactionsRequestDb;
use ascio\api\v3\GetAccountTransactionsRequestApi;


class GetAccountTransactionsRequest extends Base  {

	protected $_apiProperties=["AccountTransactionType", "InvoiceNo", "CreditNo", "FromDate", "ToDate", "Note", "PageInfo"];
	protected $_apiObjects=["PageInfo"];
	protected $AccountTransactionType;
	protected $InvoiceNo;
	protected $CreditNo;
	protected $FromDate;
	protected $ToDate;
	protected $Note;
	protected $PageInfo;

	public function setAccountTransactionType (?string $AccountTransactionType = null) : self {
		$this->set("AccountTransactionType", $AccountTransactionType);
		return $this;
	}
	public function getAccountTransactionType () : ?string {
		return $this->get("AccountTransactionType", "string");
	}
	public function setInvoiceNo (?int $InvoiceNo = null) : self {
		$this->set("InvoiceNo", $InvoiceNo);
		return $this;
	}
	public function getInvoiceNo () : ?int {
		return $this->get("InvoiceNo", "int");
	}
	public function setCreditNo (?int $CreditNo = null) : self {
		$this->set("CreditNo", $CreditNo);
		return $this;
	}
	public function getCreditNo () : ?int {
		return $this->get("CreditNo", "int");
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
	public function setNote (?string $Note = null) : self {
		$this->set("Note", $Note);
		return $this;
	}
	public function getNote () : ?string {
		return $this->get("Note", "string");
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
}