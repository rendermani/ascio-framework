<?php

// XSLT-WSDL-Client. Generated DB-Model class of AbstractOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\db\v3;

use ascio\base\DbModelBase;
use ascio\base\v3\DbModel;
use ascio\lib\AscioException;
use ascio\lib\OrderStatus;
use ascio\service\v3\AbstractOrderRequest;
use ascio\v3\OrderStatusType;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class AbstractOrderRequestDb extends DbModel {
	protected $table="v3_AbstractOrderRequest";
	protected $objectPropertyName; 
	private $blockingTypes = [
		OrderStatus::Running,
		OrderStatus::Blocking,
		OrderStatus::WaitingForUser,
		OrderStatus::BlockedByOtherOrder,
		OrderStatus::Processing
    ];
	// todo: Make abstract db possible with overwriting createTable()
	protected $_customColumnTypes = [
		"OrderId" => [
			"type" => "string",
			"parameters" => [
				"nullable" => true,
				"length" => 10					
			]
		],
		"Response" => [
			"type" => "string",
			"parameters" => [
				"nullable" => true,
				"length" => 255					
			]
		],
		"_blocking" => [
			"type" => "string",
			"parameters" => [
				"nullable" => true,
				"length" => 255			
			]
		],
		"_topic" => [
			"type" => "string",
			"parameters" => [
				"nullable" => true,
				"length" => 255					
			]
		],
		"_status" => [
			"type" => "string",
			"parameters" => [
				"nullable" => true,
				"length" => 255					
			]
		],
		"_code" => [
			"type" => "string",
			"parameters" => [
				"nullable" => true,
				"length" => 255					
			]
		],
		"_values" => [
			"type" => "text",
			"parameters" => [
				"nullable" => true			
			]
		],
		"_message" => [
			"type" => "text",
			"parameters" => [
				"nullable" => true,			
			]
		],
		"_nr" => [
			"type" => "integer",
			"parameters" => [
				"index" => true,
				"autoIncrement" => true,			
			]
		],		
		"_objectName" => [
			"type" => "string",
			"parameters" => [
				"index" => true,
				"length" => 255,
				"nullable" => true			
			]
		],
		"_previousId" => [
			"type" => "string",
			"parameters" => [
				"index" => true,
				"length" => 255,
				"nullable" => true			
			]
		],
		"_statusTrigger" => [
			"type" => "string",
			"parameters" => [
				"index" => true,
				"length" => 255,
				"default" => "Completed"			
			]
		]
	];
	public function syncToDb() {
		parent::setAttribute("_part_of_order", true);
		parent::setAttribute("_order", true);
		parent::syncToDb();		
	}
	public function getByOrderId($orderId) {
		return parent::getByHandle($orderId);
	}
	protected function getChildDb() : ?DbModelBase {
		$childObjects = $this->parent()->objects();
		$childObject = $childObjects->get($childObjects->index(0));
		return $childObject ? $childObject->db() : null;
	}
	protected function getChildTable() : string {
		return $this->getChildDb()->getTable();
	}
	/**
	 *  when submitting an order, see if the order should queue
	 */
	public function shouldQueue() {
		$childDb = $this->getChildDb();
		$result =  
			$this
			->where('._objectName',$this->parent()->getObjectName())
			->whereIn('._status', array_merge($this->blockingTypes,[OrderStatus::Queued]))
			->exists();
		return $result;
	} 
	/**
	 *  when processing the queue the order should not be blocked
	 */
	public function isBlocked() {
		$this
		->where('._objectName',$this->parent()->getObjectName())
		->where('._status', $this->blockingTypes)
		->exists();
	}      
	public function nextDomain($objectName=null) : AbstractOrderRequest {        
		$objectName = $objectName ?: $this->parent()->getObjectName();
		if($this->isBlocked($objectName)) {
			throw new AscioException("A blocking order is preventing getting the next order", 405);
		}
		$result = $this
			->select($this->table."._id")
			->where("_objectName",$objectName)
			->where($this->table.'._status', OrderStatus::Queued)
			->orderBy($this->table."._nr","asc")
			->firstOrFail();
		$class = $this->get_class();
		$newOrder = new $class();
		$newOrder->db()->getById($result->_id);
		return $newOrder;         
	}

	public function next($status,$objectName) : Array {        
		if($this->isBlocked($objectName)) {
			throw new AscioException("A blocking order is preventing getting the next order", 405);
		}
		$result = $this
			->select("*")
			->where('_previousId', $this->getKey())
			->where('_status', OrderStatus::NotSet)
            ->where("_statusTrigger",$status)
			->orderBy("_nr","asc")
			->get();
		$tasks = [];
		foreach($result as $value) {
			$type = $value->_type;
			$task = new $type();
			$task->set($value);
			$tasks[] = $task; 
		}
		return $tasks;       
	}
	public function scopeFailed($query) {
		return $query
			->where('Status',OrderStatusType::Invalid)
			->orWhere('Status',OrderStatusType::Failed);
	}
	public function scopePending($query) {
		return $query
			->where('Status',OrderStatusType::PendingInternalProcessing)
			->orWhere('Status',OrderStatusType::PendingNicDocumentApproval)
			->orWhere('Status',OrderStatusType::PendingNicDocumentApproval)
			->orWhere('Status',OrderStatusType::DocumentationReceived)
			->orWhere('Status',OrderStatusType::DocumentationApproved)
			->orWhere('Status',OrderStatusType::Validated)
			->orWhere('Status',OrderStatusType::Received);
	}
	public function scopeWaiting($query) {
		return $query
			->where('Status',OrderStatusType::PendingEndUserAction)
			->orWhere('Status',OrderStatusType::PendingDocumentation);
	}
	public function scopeCompleted($query) {
		return $query
			->where('Status',OrderStatusType::Completed);
	}
}