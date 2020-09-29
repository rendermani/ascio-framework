<?php
namespace ascio\dns\importer;
use ascio\dns\Zone;
use ascio\lib\Ascio;
use ascio\lib\AscioException;

class Importer {
    protected $parser;
    protected $errorFile;
    private $errorFileCreated = false;
    protected $logFile;
    private $logFileCreated = false;
    protected $user;
    protected $counter=0; 
    protected $total;
    
    public function __construct(ZoneFileParser $parser)
    {
        $parser->setImporter($this);
    }
    function createZone(Zone $zone) : Zone {        
        try {            
            Ascio::getClientDns()->createZone($zone->getZoneName(),$this->getUser(),$zone->getRecords());                             
            return Ascio::getClientDns()->getZone($zone->getZoneName())->getZone();
        } catch (AscioException $e) {            
            $eNew = new DnsApiException($e->getMessage(),$e->getCode());
            $eNew->setZone($zone);
            $eNew->setResult($e->getMethod(),$e->getRequest(),$e->getStatus(),$e->getResult());
            throw $eNew;
        }
    }

    /**
     * Set the value of errorFile
     *
     * @return  self
     */ 
    public function setErrorFile($errorFile)
    {
        $this->errorFile = $errorFile;
        file_put_contents($this->errorFile,"");
        return $this;
    }

    /**
     * Set the value of logFile
     *
     * @return  self
     */ 
    public function setLogFile($logFile)
    {
        $this->logFile = $logFile;
        if($this->logFile) file_put_contents($this->logFile,"");
        return $this;
    }
    public function writeError(string $error) : self {
        if($this->errorFile) file_put_contents($this->errorFile,$error,FILE_APPEND);
        return $this;
    }
    public function writeLog(string $error) : self {
        if($this->logFile) file_put_contents($this->logFile,$error,FILE_APPEND);
        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of counter
     */ 
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * Set the value of counter
     *
     * @return  self
     */ 
    public function setCounter($counter)
    {
        $this->counter = $counter;

        return $this;
    }
    /**
     * Increment the value of counter
     *
     * @return  self
     */ 
    public function incrementCounter()
    {
        $this->counter++;

        return $this;
    }
    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }
}
