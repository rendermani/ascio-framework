<?php
namespace ascio\v3;

use DateTime;

class AutoRenew {
    /**
     * @var Domain $domain
     */
    protected $domain;
    protected $status = false;
    protected $new;
    /**
     * @var DomainInfo $domainInfo
     */
    protected $domainInfo; 

    /** 
     * @var Domain $domain
    */
    public function __construct(Domain $domain) 
    {
        $this->domain = $domain; 
        
    }
    public function getStatus() {
        $expiring = strpos($this->domain->getStatus(),"EXPIRING")===false;
        echo "Get Status expiring ".$this->domain->getName()." - ".$this->domain->getStatus().": ". $expiring. "\n";
        return $expiring;
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
        $date = new DateTime;
        $this->domain->db()->_paid_until < $date;
    }
}