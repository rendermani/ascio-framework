<?php

// XSLT-WSDL-Client. Generated DB-Model class of Order. Can be copied and overwriten with own functions.

namespace ascio\db\v2;
use ascio\base\v2\DbModel;
use ascio\lib\OrderStatus;
use ascio\v2\Order;
use ascio\lib\AscioException;
use ascio\v3\OrderType;

class OrderDb extends DbModel {
	protected $table="v2_Order";
	private $blockingTypes = [
		OrderStatus::Submitting,
		OrderStatus::Running,
		OrderStatus::Blocking,
		OrderStatus::WaitingForUser,
		OrderStatus::BlockedByOtherOrder,
		OrderStatus::Processing
    ];
	public function getDomain(){
		return $this->getRelationObject("v2","Domain","Domain");
	}
	public function syncToDb() {
		parent::setAttribute("_part_of_order", true);
		parent::setAttribute("_order", true);
		parent::syncToDb();		
	}
	public function getByOrderId($orderId=null) {
		if(!$orderId) $orderId = $this->parent()->getOrderId();
		assert($orderId !== null ,"OrderId exists");
		$result = $this->where(["OrderId" => $orderId])->firstOrFail();
		$this->parent()->set($result);		
		$this->parent()->changes()->setOriginal();
	}
	/**
	 *  when submitting an order, see if the order should queue
	 */
	public function shouldQueue() {
		$domain = $this->parent()->getDomain();
		$domain->db()
		->join($this->table, 'v2_Order.Domain', '=', 'v2_Domain._id')
		->where('DomainName',$domain->getDomainName())
		->where($this->table.'._status',array_merge($this->blockingTypes,[OrderStatus::Queued]))
		->exists();
	} 
	/**
	 *  when processing the queue the order should not be blocked
	 */
	public function isBlocked() {
		$domain = $this->parent()->getDomain();
		$domain->db()
		->join('v2_Order', 'v2_Order.Domain', '=', 'v2_Domain._id')
		->where('v2_Domain.DomainName',$domain->getDomainName())
		->where('v2_Domain._status', $this->blockingTypes)
		->exists();
	}      
	public function nextDomain($domainName=null) : Order {        
		$domainName = $domainName ?: $this->parent()->getDomain()->getDomainName();
		if($this->isBlocked()) {
			throw new AscioException("A blocking order is preventing getting the next order", 405);
		}
		$result = $this
			->select("v2_Order._id")
			->join('v2_Domain', 'v2_Order.Domain', '=', 'v2_Domain._id')
			->where('v2_Order._status', OrderStatus::Queued)
			->whereNull('v2_Order.OrderId')
			->where("DomainName",$domainName)
			->orderBy("v2_Order.CreDate","asc")
			->firstOrFail();
		$newOrder = new Order();
		$newOrder->db()->getById($result->_id);
		return $newOrder;         
	}
	public function scopeNext($query) {        
		// todo test this
		return $query
				->where('_status', OrderStatus::Queued)
				->whereExists(function($query) {
						$query->select(DB::raw(1))
						->from($this->table . ' as allOrders')
						->whereRaw('NOT EXISTS (allOrders._status = "Blocked" and DomainName = '.$this->table.'.DomainName)');
					}
				)
                ->orderBy("CreDate","asc")
                ->firstOrFail();        
    }
}