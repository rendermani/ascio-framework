<?php
namespace ascio\v3;

use DateTime;

class AutoRenew {
    /**
     * @var Domain|DomainInfo $domain
     */
    protected $domain;
    protected $status = false;
    protected $new;

    /** 
     * @var Domain|DomainInfo $domain
    */
    public function __construct($domain) 
    {
        $this->domain = $domain; 
        
    }
    public function getStatus() {
        if($this->domain instanceof DomainInfo) {
            $expiring = strpos($this->domain->getStatus(),"EXPIRING")===false;;
            echo "Get Status expiring ".$this->domain->getDomainName()." - ".$this->domain->getStatus().": ". $expiring. "\n";
            return $expiring;
        } else {
            $domainInfo = $this->domain->get();
            return $domainInfo->getAutoRenew()->getStatus(); 
        }

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