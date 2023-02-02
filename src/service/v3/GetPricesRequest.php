<?php

// XSLT-WSDL-Client. Generated PHP class of GetPricesRequest

namespace ascio\service\v3;
use ascio\db\v3\GetPricesRequestDb;
use ascio\api\v3\GetPricesRequestApi;
use ascio\base\v3\Base;


class GetPricesRequest extends Base  {

	protected $_apiProperties=["Date", "ObjectTypes", "OrderTypes", "Tlds", "TldCountryCode", "Periods", "ProductOptions", "DefaultPeriodsOnly", "PageInfo", "TldsInPortfolioOnly"];
	protected $_apiObjects=["ObjectTypes", "OrderTypes", "Tlds", "Periods", "ProductOptions", "PageInfo"];
	protected $Date;
	protected $ObjectTypes;
	protected $OrderTypes;
	protected $Tlds;
	protected $TldCountryCode;
	protected $Periods;
	protected $ProductOptions;
	protected $DefaultPeriodsOnly;
	protected $PageInfo;
	protected $TldsInPortfolioOnly;

	public function setDate (?\DateTime $Date = null) : self {
		$this->set("Date", $Date);
		return $this;
	}
	public function getDate () : ?\DateTime {
		return $this->get("Date", "\\DateTime");
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
	public function setTlds (?\ascio\v3\ArrayOfstring $Tlds = null) : self {
		$this->set("Tlds", $Tlds);
		return $this;
	}
	public function getTlds () : ?\ascio\v3\ArrayOfstring {
		return $this->get("Tlds", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createTlds () : \ascio\v3\ArrayOfstring {
		return $this->create ("Tlds", "\\ascio\\v3\\ArrayOfstring");
	}
	public function setTldCountryCode (?string $TldCountryCode = null) : self {
		$this->set("TldCountryCode", $TldCountryCode);
		return $this;
	}
	public function getTldCountryCode () : ?string {
		return $this->get("TldCountryCode", "string");
	}
	public function setPeriods (?\ascio\v3\ArrayOfint $Periods = null) : self {
		$this->set("Periods", $Periods);
		return $this;
	}
	public function getPeriods () : ?\ascio\v3\ArrayOfint {
		return $this->get("Periods", "\\ascio\\v3\\ArrayOfint");
	}
	public function createPeriods () : \ascio\v3\ArrayOfint {
		return $this->create ("Periods", "\\ascio\\v3\\ArrayOfint");
	}
	public function setProductOptions (?\ascio\v3\ArrayOfstring $ProductOptions = null) : self {
		$this->set("ProductOptions", $ProductOptions);
		return $this;
	}
	public function getProductOptions () : ?\ascio\v3\ArrayOfstring {
		return $this->get("ProductOptions", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createProductOptions () : \ascio\v3\ArrayOfstring {
		return $this->create ("ProductOptions", "\\ascio\\v3\\ArrayOfstring");
	}
	public function setDefaultPeriodsOnly (?bool $DefaultPeriodsOnly = null) : self {
		$this->set("DefaultPeriodsOnly", $DefaultPeriodsOnly);
		return $this;
	}
	public function getDefaultPeriodsOnly () : ?bool {
		return $this->get("DefaultPeriodsOnly", "bool");
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
	public function setTldsInPortfolioOnly (?bool $TldsInPortfolioOnly = null) : self {
		$this->set("TldsInPortfolioOnly", $TldsInPortfolioOnly);
		return $this;
	}
	public function getTldsInPortfolioOnly () : ?bool {
		return $this->get("TldsInPortfolioOnly", "bool");
	}
}