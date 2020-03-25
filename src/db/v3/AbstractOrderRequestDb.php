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
		]
	];
	public function syncToDb() {
		parent::setAttribute("_part_of_order", true);
		parent::setAttribute("_order", true);
		parent::syncToDb();		
	}
	protected function getChildDb() : ?DbModelBase {
		$childObjects = $this->parent()->objects();
		$childObject = $childObjects->get($childObjects->index(0));
		return $childObject ? $childObject->db() : null;
	}
	protected function getChildTable() : string {
		return $this->getChildDb()->table;
	}
	/**
	 *  when submitting an order, see if the order should queue
	 */
	public function shouldQueue() {
		$childDb = $this->getChildDb();
		if(!$childDb) return false; 
		return 
			$this->getChildDb()
			->join($this->table, 'v3_AbstractOrderRequest.'.$this->objectPropertyName, '=', $this->getChildTable().'._id')
			->where($this->parent()->getObjectKey(),$this->parent()->getObjectName())
			->where($this->table.'._status',array_merge($this->blockingTypes,[OrderStatus::Queued]))
			->exists();
	} 
	/**
	 *  when processing the queue the order should not be blocked
	 */
	public function isBlocked() {
		$this->getChildDb()
		->join('v3_AbstractOrderRequest', $this->table.'.Domain', '=', $this->getChildTable().'._id')
		->where($this->getChildTable().'.'.$this->parent()->getObjectKey(),$this->parent()->getObjectName())
		->where($this->table.'._status', $this->blockingTypes)
		->exists();
	}      
	public function nextDomain($objectName=null) : AbstractOrderRequest {        
		$objectName = $objectName ?: $this->parent()->getObjectName();
		if($this->isBlocked()) {
			throw new AscioException("A blocking order is preventing getting the next order", 405);
		}
		$result = $this
			->select($this->table."._id")
			->join($this->getChildTable(), $this->table.'.'.$this->parent()->getObjectKey(), '=', $this->getChildTable().'._id')
			->where($this->table.'._status', OrderStatus::Queued)
			->where($this->parent()->getObjectKey(),$objectName)
			->orderBy($this->table.".CreDate","asc")
			->firstOrFail();
		$class = $this->get_class();
		$newOrder = new $class();
		$newOrder->db()->getById($result->_id);
		return $newOrder;         
	}
	public function scopeNext($query) {        
		// todo test scope next?
		return $query
				->where('_status', OrderStatus::Queued)
				->whereExists(function($query) {
						$query->select(DB::raw(1))
						->from($this->table . ' as allOrders')
						->whereRaw('NOT EXISTS (allOrders._status = "Blocked" and '.$this->parent()->getObjectKey().' = '.$this->table.'.'.$this->parent()->getObjectName().')');
					}
				)
                ->orderBy("CreDate","asc")
                ->firstOrFail();        
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