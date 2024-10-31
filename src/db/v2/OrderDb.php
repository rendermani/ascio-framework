<?php

// XSLT-WSDL-Client. Generated DB-Model class of Order. Can be copied and overwriten with own functions.

namespace ascio\db\v2;

use ascio\base\BaseClass;
use ascio\base\DbBase;
use ascio\base\v2\DbModel;
use ascio\lib\OrderStatus;
use ascio\v2\Order;
use ascio\lib\AscioException;
use ascio\v2\ArrayOfOrder;
use ascio\v2\OrderStatusType;
use ascio\v3\OrderType;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

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
		parent::setAttribute("_objectName", $this->parent()->getObjectName());
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
		->where('v2_Order._status', $this->blockingTypes)
		->exists();
	}      
	public function nextDomain($domainName=null) : Order {        
		$domainName = $domainName ?: $this->parent()->getObjectName();
		if($this->isBlocked()) {
			throw new AscioException("A blocking order is preventing getting the next order", 405);
		}
		$result = $this
			->select("v2_Order._id")
			->join('v2_Domain', 'v2_Order.Domain', '=', 'v2_Domain._id')
			->where('v2_Order._status', OrderStatus::Queued)
			->whereNull('v2_Order.OrderId')
			->where("DomainName",$domainName)
			->orderBy("v2_Order._nr","asc")
			->firstOrFail();
		$newOrder = new Order();
		$newOrder->db()->getById($result->_id);
		return $newOrder;         
	}
	public function next($status) : ArrayOfOrder {        
        $objectName = $this->parent()->getObjectName();		
		if($this->isBlocked()) {
			throw new AscioException("A blocking order is preventing getting the next order", 405);
		}
		$result = $this
			->select("*")
			->where('_previousId', $this->parent()->getId())
			->where('_status', OrderStatus::NotSet)
            ->where("_objectName",$objectName)
            ->where("_statusTrigger",$status)
			->orderBy("_nr","asc")
			->get();

		$orders = new ArrayOfOrder();
		foreach($result as $value) {
			$orders->addOrder()->set($value);			
		}
		return $orders;       
	}
	public function scopeFailed($query) {
		return $query
			->where('Status',OrderStatusType::Invalid)
			->orWhere('Status',OrderStatusType::Failed);
	}
	public function scopePending($query) {
		return $query
			->where('Status',OrderStatusType::Pending_Internal_Processing)
			->orWhere('Status',OrderStatusType::Pending_NIC_Document_Approval)
			->orWhere('Status',OrderStatusType::Pending_NIC_Processing)
			->orWhere('Status',OrderStatusType::Documentation_Received)
			->orWhere('Status',OrderStatusType::Pending_Post_Processing)
			->orWhere('Status',OrderStatusType::Validated)
			->orWhere('Status',OrderStatusType::Received)
			->orWhere('Status',OrderStatusType::Pending)
			->orWhere('Status',OrderStatusType::NotSet)
			->orWhere('Status',OrderStatusType::Processing);
	}
	public function scopeWaiting($query) {
		return $query
			->where('Status',OrderStatusType::Pending_End_User_Action)
			->orWhere('Status',OrderStatusType::Pending_Documentation);
	}
	public function scopeCompleted($query) {
		return $query
			->where('Status',OrderStatusType::Completed);
	}
	public function createTables(?\Closure $blueprintFunction=null) {
		parent::createTables(function(Blueprint $table) use ($blueprintFunction){
			$table->string('_message')->nullable();
			$table->integer('_code')->nullable()->index();
			$table->json('_values')->nullable();	
			$table->string('_status')->index()->nullable();	
			$table->string('_blocking')->index()->nullable();
			$table->string('_topic')->index()->nullable();
			$table->boolean('_acked')->index()->nullable();
			$table->integer('_nr',true)->index();
			$table->string('_objectName')->index();
			$table->string('_previousId')->nullable();
			$table->string('_statusTrigger')->default("Completed")->index();
			if($blueprintFunction) $blueprintFunction($table);
		}); 
	}
	/**
	 * @return OrderDb
	 */
	public function parent(?BaseClass $parent=null) : ?DbBase {
        return parent::parent($parent);
    }
}
