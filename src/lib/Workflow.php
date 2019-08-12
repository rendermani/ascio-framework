<?php
namespace ascio\workflows;
use ascio\lib\v2\Domain;
use Illuminate\Database\Schema\Blueprint;
use ascio\model\common\WorkflowModel;
use Illuminate\Database\Capsule\Manager as Capsule;
use ascio\lib\Ascio;
use ascio\v3\OrderStatusType;
use ascio\model\common\WorkflowStepModel;

class Workflow {
    /**
     * @var Domain $domain
     */
    private $domain;
    /**
     * @var $properties The Custom Workflow-Properties. Can be shared between Steps
     */
    private $properties = [];
    /**
     * @var WorkflowModel $db
     */
    private $db;
    private $id; 
    private $description;
    private $class;
    private $name;
    private $partner;
    private $steps = [];
    private $status;
    private $code;
    private $message;
    private $errors;
    
    public function __construct(Domain $domain,$name = null,$description = null) 
    {
        $this->domain = $domain;
        $this->db = new WorkflowModel();
        $this->getDb()->setObject($this);
        $this->setDomain($domain);
        $this->setPartner(Ascio::getPartner());
        $this->setClass(get_class($this));
        $this->setName($name);        
        $this->setDescription($description);
        $this->createTables();
    }
    private function setAttribute(string $key, ?string $value) {
        $this->db->setAttribute($key, $value);
    }
    private function getAttribute(string $key) : ?string {
        return $this->db->getAttribute($key);
    }
    private function getAttributes() : array {
        return $this->db->getAttributes();
    }
    /**
     * Get properties
     */ 
    public function getProperties()
    {
        return $this->properties;
    }
    /**
     * Get the value of a property
     */ 
    public function getProperty($key) 
    {
        return $this->properties[$key];
    }
     /**
     * Set the value of a property
     */ 
    public function setProperty(string $key,?string $value) : void
    {
        $this->properties[$key] = $value;
    }
    /**
     * Set pro
     */ 
    public function setProperties($properties) : void 
    {
        $this->properties = $properties;
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->db->getKey();
    }
    public function getByOrderId($id)
    {
        $this->getDb()->orderId($id);
    }
    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->getAttribute("Description");
    }
    /**
     * Set the value of description
     *
     * @return  self
     */ 
    private function setDescription($description)
    {
        $this->description = $description;
        $this->setAttribute("Description",$description);
        return $this;
    }
    /**
     * Save all steps
     */
    public function init() : void {            
        $this->db->saveOrFail();
        foreach($this->createSteps() as $key => $step) {
            $step->save();            
        }
    }
    public function load() {
        $this->db = $this->db->workflow();
        $model = new WorkflowStepModel;
        $results = $model->where("Workflow",$this->getId())->get();
        foreach($results->all() as $key => $stepModel)   {
            $step = new WorkflowStep($this); 
            $step->getDb()->setRawAttributes($stepModel->getAttributes());
            $this->steps[] = $step;
        }


    }
    public function next() : ?WorkflowStep {
        $step = new WorkflowStep($this);
        $step->next();
        if($step) {
            $step->run();
            return $step;
        }
    }
    /**
     * Create Step objects from Class
     */
    private function createSteps() : array {            
        $array1 = get_class_methods($this);
        if($parent_class = get_parent_class($this)){
            $array2 = get_class_methods($parent_class);
            $array3 = array_diff($array1, $array2);
        }else{
            $array3 = $array1;
        }
        return array_map(function($item) {
            return new WorkflowStep($this,$item);
        },$array3);       
    }
    /**
     * Get the steps
     */ 
    public function getSteps() : array
    {
        return $this->steps;
    }

    /**
     * Set the steps
     *
     * @return  self
     */ 
    private function setSteps($steps) 
    {
        $this->steps = $steps;
        return $this;
    }
    public function getDb() : WorkflowModel {
        return $this->db;
    }

    public function getPartner() {
        return $this->getAttribute("Partner");
    }
    public function setPartner($partner) {
        $this->partner = $partner;
        $this->setAttribute("Partner", $partner);
        //TODO: Set all steps
        Ascio::setPartner($partner);
    }



    /**
     * Get the value of name
     */ 
    public function getName()
    {        
        return $this->getAttribute("Name");
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    protected function setName($name)
    {
        $this->name = $name; 
        $this->setAttribute("Name",$name);
        return $this;
    }
    /**
     * Get the value of class
     */ 
    public function getClass()
    {
        return $this->getAttribute("Class");
    }
    /**
     * Set the value of class
     *
     * @return  self
     */ 
    private function setClass($class)
    {
        $this->class = $class;
        $this->setAttribute("Class",$class);
        return $this;
    }

    /**
     * Get $domain
     *
     * @return  Domain
     */ 
    public function getDomain()
    {
        if(!$this->domain->getHandle()) {
            $this->domain->get($this->domain->getDomainName());
        }
        return $this->domain;
    }

    /**
     * Set $domain
     *
     * @param  Domain  $domain  $domain
     *
     * @return  self
     */ 
    private function setDomain(Domain $domain)
    {
        $this->domain = $domain;
        $this->setAttribute("Domain",$domain->getDomainName());
        $this->setAttribute("DomainHandle",$domain->getDomainHandle());
        return $this;
    }
    private function createTables() {
        if(!Capsule::Schema()->hasTable('Workflow')) {
            Capsule::Schema()->create('Workflow',function(Blueprint $table) {
                $table->increments('Id');
                $table->string('Name');
                $table->integer('Parent')->nullable();
                $table->string('Class')->index();
                $table->string('Description');
                $table->string('Domain')->index();
                $table->string('DomainHandle')->index()->nullable();
                $table->string('Status')->index()->default(OrderStatusType::NotSet);
                $table->integer('Code')->index()->default(100);
                $table->string('Message')->nullable();
                $table->json('Errors')->nullable();
                $table->json('Properties')->nullable();
                $table->string('Partner')->index();
                $table->timestamps();
            });
            Capsule::Schema()->create('WorkflowStep',function(Blueprint $table) {
                $table->increments('Id');
                $table->string('Name');
                $table->integer('Parent')->nullable();
                $table->string('Workflow')->index();          
                $table->string('Status')->index()->default(OrderStatusType::NotSet);
                $table->integer('Code')->index()->default(100);
                $table->string('Message')->index()->nullable();
                $table->json('Errors')->nullable();
                $table->string('OrderId')->index()->nullable();
                $table->string('Description')->nullable();
                $table->string('Partner')->index();
                $table->timestamps();
            });
        }
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->getAttribute("Status");
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;
        $this->setAttribute("Status",$status);
        return $this;
    }
        /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->getDb()->getAttribute("Code");
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;
        $this->getDb()->setAttribute("Code",$code);
        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->getDb()->getAttribute("Message");
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;
        $this->getDb()->setAttribute("Message",$message);
        return $this;
    }
    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return \json_decode($this->getDb()->getAttribute("Errors"));
    }

    /**
     * Set the value of errors
     *
     * @return  self
     */ 
    public function setErrors($errors)
    {
        $this->errors = $errors;
        $json = $errors ? json_encode($errors) : null;
        $this->getDb()->setAttribute("Errors",$json );
        return $this;
    }
    /**
     * Set the value of parent
     *
     * @return  self
     */ 
    public function setParent($parent)
    {
        foreach($this->steps as $key => $step) {
            $step->setParent($parent);
        }
        return $this;
    }
}
