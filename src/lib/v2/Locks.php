<?
namespace ascio\v2; 

class Locks {
    protected $domain;
    protected $locks = [];  
    public function __construct(Domain $domain) 
    {
        $this->domain = $domain; 
        $this->locks["TransferLock"] = new Lock($domain,"TransferLock","TRANSFER_LOCK");
        $this->locks["DeleteLock"] = new Lock($domain,"DeleteLock","DELETE_LOCK");
        $this->locks["UpdateLock"] = new Lock($domain,"UpdateLock","UPDATE_LOCK");
    }
    public function getTransferLock() : Lock  {
        return $this->locks["TransferLock"];
    }
    public function getDeleteLock() : Lock {
        return $this->locks["DeleteLock"];
    }
    public function getUpdateLock() : Lock {
        return $this->locks["UpdateLock"];
    }
    public function setChangedLocks() : Locks {
        foreach ($this->locks as $lock) {
           $lock->setChangedLock();
        }
        return $this;
    }
    public function hasChanges() : bool  {
        foreach ($this->locks as $lock) {
           if($lock->lockChanged()) {
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
}
class Lock {
    private $status; 
    private $domain; 
    private $statusType; 
    private $type;
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
        if($this->hasNew() == $this->hasOld()) {
            return false;
        } else {
            return true;
        }
    }
}