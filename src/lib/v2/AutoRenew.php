<?
namespace ascio\v2;

use DateTime;

class AutoRenew {
    protected $domain;
    protected $status = false;
    protected $new;
    public function __construct(Domain $domain) 
    {
        $this->domain = $domain; 
        
    }
    public function getStatus() {
        return strpos($this->domain->getStatus(),"EXPIRING")===false;
    }
    public function get() {
        return $this->new;
    }
    public function set(bool $autoRenew) : AutoRenew {
        $this->new = $autoRenew; 
        return $this;
    } 
    public function setAutoRenew() : AutoRenew {
        return $this->set(true);
    }
    public function setAutoExpire() : AutoRenew {
        return $this->set(false);
    }
    public function hasChanges() : bool {
        if($this->new !== null &&  $this->new !== $this->getStatus()) {
            return true;
        }
        return false; 
    }
    public function setPaidUntil(DateTime $date) {
        $this->domain->db()->_paid_until = $date;
    }
    public function isPaid() {
        $this->domain->db()->_paid_until < DateTime.now();
    }
}