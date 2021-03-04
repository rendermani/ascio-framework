<?php
namespace ascio\v3;

use ascio\lib\LockAction;
use ascio\lib\LockType;

class Locks {
    protected $domain;
    protected $locks = []; 
    /**
     * @var ArrayOfOrder $unlockOrders
     */ 
    protected $unlockOrders;  
    /**
     * @var ArrayOfOrder $LockOrders
     */ 
    protected $lockOrders ;  
    protected $status;
    /**
     * @var Domain|DomainInfo $domain
     */
    public function __construct($domain) 
    {
        $this->domain = $domain; 
        $this->locks["TransferLock"] = new Lock($domain,"TransferLock","TRANSFER_LOCK");
        $this->locks["DeleteLock"] = new Lock($domain,"DeleteLock","DELETE_LOCK");
        $this->locks["UpdateLock"] = new Lock($domain,"UpdateLock","UPDATE_LOCK");
    }
    public function transferLock() : Lock  {
        return $this->locks["TransferLock"];
    }
    public function deleteLock() : Lock {
        return $this->locks["DeleteLock"];
    }
    public function updateLock() : Lock {
        return $this->locks["UpdateLock"];
    }
    public function setChangedLocks() : Locks {
        foreach ($this->locks as $unlock) {
           $unlock->setChangedLock();
        }
        return $this;
    }
    public function get($lockType) : Lock {
        return $this->locks[$lockType];
    }
    public function hasChanges() : bool  {
        foreach ($this->locks as $unlock) {
           if($unlock->lockChanged()) {
               return true;
           }
        }
        return false; 
    }
    public function setDomain(Domain $domain) : Locks {
        $this->__construct($domain);
        return $this;
    }
    public function getLockTypes() : array {
        return ["TransferLock","UpdateLock","DeleteLock"];
    }
    /**
     * @return bool return true if lock-actions are generated
     */
    public function setOrderType(?string $orderType=null) : bool {
        $locks = [];
        $this->unlockOrders = new ArrayOfOrder();
        $this->lockOrders = new ArrayOfOrder();
        if(
            // get the status of the domain if update and no status
            !in_array($orderType,[OrderType::Register, OrderType::Transfer, OrderType::Queue]) &&
            !$this->domain->getStatus()
        ) {
            $domain = new Domain();
            $domain->setHandle($this->domain->getHandle());
            $domain->setName($this->domain->getName());
            $domain->db()->syncFromDb();
            $this->domain->setStatus($domain->getStatus());
        }
        switch ($orderType) {
            case OrderType::Transfer : $locks = ["UpdateLock","TransferLock"]; break;
            case OrderType::Expire :
            case OrderType::TransferAway :
            case OrderType::Delete : $locks = ["UpdateLock","DeleteLock"]; break;
            case OrderType::Register :
            case OrderType::Queue :
            case OrderType::DeQueue : return null;
            default : $locks = ["UpdateLock"]; break; 
        }
        $this->unlockOrders = $this->createUnLockOrders($locks,LockAction::Unlock);
        // DeleteLock and TransferLock should not be restored
        $this->lockOrders = $this->createLockOrders(["UpdateLock"],LockAction::Lock);
        return count($this->unlockOrders) > 0;
    }
    private function createUnlockOrders(array $locks,$action) : ArrayOfOrder {
        $orders = new ArrayOfOrder();
        foreach($locks as $lock) {
            $this->domain->set($lock,LockAction::Unlock);
            //TODO: wrong changed locks
            $order = $this->domain->getOrderRequest()->changeLocks();
            $this->domain->set($lock,null);
            if($order->getDomain()->get($lock)) {
                $order->getSubmitOptions()->setQueue(true)->setSubmitAfterQueue($action==LockAction::Unlock);
                $orders->addOrder($order);
                $lock = $this->get($lock);
                $lock->autoUnlocked = true; 
                $this->domain->setStatus(str_replace($lock->getStatusType(),"",$this->domain->getStatus()));
            }
        }        
        return $orders; 
    }
    private function createLockOrders(array $locks,$action) : ArrayOfOrder {
        $orders = new ArrayOfOrder();
        foreach($locks as $lock) {
            $doLock = $this->get($lock)->autoUnlocked;
            if($doLock) {
                $this->domain->set($lock,LockAction::Lock);
            } else {
                $this->domain->set($lock,null);
            }
            $order = $this->domain->getOrderRequest()->changeLocks();
            if($order->getDomain()->get($lock) && $doLock) {
                $order->getSubmitOptions()->setQueue(true)->setSubmitAfterQueue($action==LockAction::Unlock);
                $orders->addOrder($order);
                if($action == LockAction::Unlock) {
                    //remove the unlocked lockType from the status. Otherwise the re-lock will assume, it's already locked
                    $lock->autoUnlocked = true; 
                    $this->domain->setStatus(str_replace($lock->getStatusType(),"",$this->domain->getStatus()));
                }
            }
        }        
        return $orders; 
    }
    public function hasUnlocks() : bool {
        return count($this->unlockOrders) > 0;
    }
    public static function getMergedOrders(ArrayOfOrder $orderArray,$type="Unlock") {
        $updateLock = false;
        $transferLock = false; 
        $deleteLock = false; 
        foreach ($orderArray as $order) {
            if($order->getDomain()->getUpdateLock()) {
                $updateLock = $order->getDomain()->getUpdateLock() ? true : false;
            }
            if($order->getDomain()->getDeleteLock()) {
                $deleteLock = $order->getDomain()->getDeleteLock() ? true : false;
            }
            if($order->getDomain()->getTransferLock()) {
                $transferLock = $order->getDomain()->getTransferLock() ? true : false;
            }
        }
        if($updateLock) {
            $updateOrder = new DomainOrderRequest();
            $updateOrder->setType(OrderType::ChangeLocks);
            $updateOrder->createDomain()
                ->setHandle($order->getDomain()->getDomainHandle())
                ->setName($order->getDomain()->getDomainName())
                ->setUpdateLock($type)
                ->setDeleteLock(null)
                ->setTransferLock(null);
        }
        if($transferLock || $deleteLock) {
            $transferDeleteOrder = new DomainOrderRequest();
            $transferDeleteOrder->setType(OrderType::ChangeLocks);
            $transferDeleteOrder->createDomain()
                ->setHandle($order->getDomain()->getDomainHandle())
                ->setName($order->getDomain()->getDomainName())
                ->setUpdateLock(null)
                ->setDeleteLock($deleteLock ? $type : null)
                ->setTransferLock($transferLock ? $type : null);
        }
        $orderArray = [];
        if($updateLock) $orderArray[] = $updateOrder;
        if(isset($transferDeleteOrder)) $orderArray[] = $transferDeleteOrder;
        
        if($type == "Lock") {
            $orderArray = array_reverse($orderArray);
        } 
        $orders = new ArrayOfOrder();
        $orders->fromArray($orderArray); 
        return $orders;
    }
        /**
     * Get the value of unlockOrders
     */ 
    public function getUnlockOrders() : ArrayOfOrder
    {
        return $this->unlockOrders;
    }

    /**
     * Set the value of unlockOrders
     *
     * @return  self
     */ 
    public function setUnlockOrders($unlockOrders)
    {
        $this->unlockOrders = $unlockOrders;

        return $this;
    }

    /**
     * Get the value of lockOrders
     */ 
    public function getLockOrders() : ArrayOfOrder
    {
        return $this->lockOrders;
    }

    /**
     * Set the value of lockOrders
     *
     * @return  self
     */ 
    public function setLockOrders($lockOrders)
    {
        $this->lockOrders = $lockOrders;

        return $this;
    }
}
class Lock {
    private $status; 
    /**
     * @var Domain $domain
     */
    private $domain; 
    private $statusType; 
    private $type;
    public $autoUnlocked = false; 
    public function __construct(Domain $domain,string $type, string $statusType)
    {
        $this->domain =  $domain; 
        $this->type  = $type; 
        $this->statusType  = $statusType; 
    }
    public function hasOld () {
        return strpos($this->domain->getStatus(),$this->statusType) !== false; 
    }
    public function hasNew () {
        return $this->getNewLock()  == "Lock";
    }
    public function set(bool $active) : Lock {
        $this->domain->{"set".$this->type}($active ? "Lock" : "Unlock");
        $this->setChangedLock(); 
        return $this; 
    }
    public function getNewLock () {
        $lockFunction = "get".$this->type;
        return $this->domain->$lockFunction();
    }
    public function setChangedLock() {
        if($this->lockChanged()) {
            $this->domain->{"set".$this->type}($this->hasNew() ? "Lock" : "Unlock" );
        } else {
            $this->domain->{"set".$this->type}(null);
        }
        return $this;
    }
    public function lockChanged() {
        if(!$this->getNewLock() || $this->hasNew() == $this->hasOld()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the value of statusType
     */ 
    public function getStatusType()
    {
        return $this->statusType;
    }
}