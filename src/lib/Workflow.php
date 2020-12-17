<?php
namespace ascio\lib;

use ascio\base\TaskInterface;
use ascio\v3\ArrayOfOrder;
use ascio\v3\Domain;
use ascio\v3\Locks;
use ascio\v3\Order;

class Workflow {
    protected $tasks = []; 
    private $autoLock;
    private $name; 
    private $domain; 
    private $id;
    /**
     * @var ArrayOfOrder $unlockOrders 
     */
    private $unlockOrders;
    /**
     * @var ArrayOfOrder $lockOrders 
     */
    private $lockOrders;
    /**
     * @var SubmitOptions $submitOptions
     */
    private $submitOptions;
    public function __construct(Domain $domain,$name=null)
    {
        $this->name = $name; 
        $this->domain = $domain; 
        //$this->domain = $domain->getByHandle($domain->getDomainHandle()); 
        $this->id = uniqid("workflow");
        $this->lockOrders = new ArrayOfOrder();
        $this->unlockOrders = new ArrayOfOrder();
    }
    public function addTask(?TaskInterface $task) {
        if($task) {
            $this->tasks[] = $task;
        }   
    }
    public function addTasks(array $tasks) {
        $this->tasks = array_merge($this->tasks,$tasks);
    }
    public function setAutoUnlock(bool $autoUnlock) {
        $this->getSubmitOptions()->setAutoUnlock($autoUnlock);
    }
    public function getOrderRequests() : array {
        if(count($this->tasks) == 0){
            return [];
        } 
        $this->setLocks();
        $tasks = array_merge(
            $this->unlockOrders->toArray(), 
            $this->tasks, 
            $this->lockOrders->toArray()
        );
        return $tasks; 
    } 
    public function submit() {     
        $out = [];
        foreach($this->getOrderRequests() as $task) {
            $task->submit($this->submitOptions);
            $out[$task->db()->_id] = $task->getType(); 
        } 
        return $out; 
    }
    private function setLocks() {
        if(!$this->getSubmitOptions()->getAutoUnlock()) return false;
        $lockOrders = new ArrayOfOrder();
        $unlockOrders = new ArrayOfOrder();
        foreach($this->tasks as $order) {
            /**
             * @var Order $task
             */
            if($order instanceof Order) {
                $locks = new Locks($this->domain);
                $locks->setOrderType($order->getType());
                $lockOrders->add($locks->getLockOrders());
                $unlockOrders->add($locks->getUnLockOrders());
            }
        }
        if($unlockOrders){
            $this->unlockOrders = Locks::getMergedOrders($unlockOrders,LockAction::Unlock);
            $this->lockOrders = Locks::getMergedOrders($lockOrders,LockAction::Lock);
            return count($this->unlockOrders) > 0;
        } 
        return false;     
    }
    public function getSubmitOptions() : SubmitOptions {
        $this->submitOptions =  $this->submitOptions ?: new SubmitOptions();
        return $this->submitOptions;
    }
    public function setSubmitOptions(SubmitOptions $submitOptions) : self  {
        // get the old autoUnlock status if set in old $submitOptions. 
        $submitOptions->setAutoUnlock($this->getSubmitOptions()->getAutoUnlock());
        $this->submitOptions = $submitOptions;
        return $this; 
    }
    public function debug() {
        foreach($this->tasks as $task) {
            /**
             * @var TaskInterface $task
             */
            echo $task->getStatusSerializer()->console(LogLevel::Debug,"Debug Workflow");
        }
    }
}