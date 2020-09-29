<?php
namespace ascio\migration;

class Migrator {
    protected $includes;
    protected $excludes;
    protected $authCodes; 
    protected $createOrder;
 
    public function __construct()
    {
        $this->includes = new Whitelist;
        $this->excludes = new Blacklist;
    }
    public function setSource(SourceInterface $source) : self {
        return $this;
    }
    public function createOrder(callable $function): self  {
        $this->createOrder = $function;
        return $this;
    }
    public function validate(callable $function) : self {
        $this->validate = $function;
        return $this;
    }
    public function process(callable $function) : self {
        $this->process = $function;
        return $this;
    }
    public function filter (callable $function) : self {
        $this->process = $function;
        return $this;
    }
    /**
     * Get the value of includes
     */ 
    public function getIncludes() : Whitelist
    {
        return $this->includes;
    }

    /**
     * Set the value of includes
     *
     * @return  self
     */ 
    public function setIncludes( Whitelist $includes) 
    {
        $this->includes = $includes;

        return $this;
    }
    public function addInclude( File $include) : self {
        $this->getIncludes()->add($include);
        return $this;
    }
    /**
     * Get the value of excludes
     */ 
    public function getExcludes() : Blacklist
    {
        return $this->excludes;
    }

    /**
     * Set the value of excludes
     *
     * @return  self
     */ 
    public function setExcludes( Blacklist $excludes)
    {
        $this->excludes = $excludes;

        return $this;
    }
    public function addExclude( File $exclude) : self{
        $this->getExcludes()->add($exclude);
        return $this;
    }
    /**
     * Get the value of authCodes
     */ 
    public function getAuthCodes() : File
    {
        return $this->authCodes;
    }

    /**
     * Set the value of authCodes
     *
     * @return  self
     */ 
    public function setAuthCodes(File $authCodes)
    {
        $this->authCodes = $authCodes;

        return $this;
    }
}
$authCodes = new File("data/authcodes-all.txt");
$options = new CsvOptions();
$options
    ->setHasHeader(false)
    ->setMemData(true)
    ->setDataColumnIndex(1)
    ->setDelimiter("\t")
    ->setFieldNames(["domain","authcode"]);
$authCodes->readCSV($options);

$options = new CsvOptions();
$options->setHasHeader(true)->setMemData(false);
$whois = new File("data/whois-all.csv");   

$migrator = new Migrator(); 
$migrator
    ->setSource(new File("all-whois.csv"))
    ->setAuthCodes($authCodes)
    ->addExclude(new File("data/softgarden-redlist.txt"))
    ->addInclude(new File("data/softgarden-positive.txt"))
    ->filter(function(Migrator $migratorFiltered) {})
    ->validate(function(Migrator $migratorValidated) {})
    ->process(function() {});
    

    