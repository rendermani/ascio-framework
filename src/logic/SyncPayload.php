<?php
namespace ascio\logic;

use ascio\base\BaseClass;

class SyncPayload  extends Payload {
    private $domain;
    private $queueItem;
    private $order; 
    private $incremental;   

    /**
     * Get the value of domain
     */ 
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set the value of domain
     *
     * @return  self
     */ 
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get the value of queueItem
     */ 
    public function getQueueItem()
    {
        return $this->queueItem;
    }

    /**
     * Set the value of queueItem
     *
     * @return  self
     */ 
    public function setQueueItem($queueItem)
    {
        $this->queueItem = $queueItem;

        return $this;
    }

    /**
     * Get the value of order
     */ 
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the value of order
     *
     * @return  self
     */ 
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }
     /**
     * Get the value of incremental
     */ 
    public function getIncremental()
    {
        return $this->incremental;
    }

    /**
     * Set the value of incremental
     *
     * @return  self
     */ 
    public function setIncremental($incremental)
    {
        $this->incremental = $incremental;

        return $this;
    }
    /**
     * Get the value of changes
     */ 
    public function getChanges()
    {
        return $this->changes;
    }

    /**
     * Set the value of changes
     *
     * @return  self
     */ 
    public function setChanges($changes)
    {
        $this->changes = $changes;

        return $this;
    }
    public function getObject() : ?BaseClass {
        return  $this->getDomain() ?: $this->getOrder() ?: $this->getQueueItem() ?: null;
    }
}
