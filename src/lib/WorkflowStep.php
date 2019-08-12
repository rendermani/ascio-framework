<?php 
namespace ascio\workflows;
//require_once(__DIR__."/../model/Workflow.php");
use ascio\lib\v2\Domain;
use Illuminate\Database\Schema\Blueprint;
use ascio\model\common\WorkflowStepModel;
use Illuminate\Database\Capsule\Manager as Capsule;
use ascio\lib\Ascio;
use ascio\v3\OrderStatusType;
use ascio\v2\Response;
use ascio\v2\CreateOrderResponse;
use ascio\lib\AscioOrderException;
use ascio\lib\Tools;
use ascio\lib\AscioOrderExceptionV2;
use ascio\lib\AscioException;

class WorkflowStep {
    /**
     * @var Workflow $workflow
     */
    protected $workflow;
    protected $db;
    protected $id;
    protected $status;
    protected $code;
    protected $message;
    protected $partner;
    protected $errors;
    
    

    function __construct(Workflow $workflow,$name=null)
    {
        $this->name = $name;
        $this->workflow = $workflow;  
        $this->db = new WorkflowStepModel([
           "Workflow" => $workflow->getId(),
           "Name" => $name,
           "Partner" => Ascio::getPartner()
        ]);
    }
    public function save() {        
        $this->db->saveOrFail([]);
    }
    public function getDb() {        
        return $this->db;
    }
    public function setDb($db) {        
        $this->db = $db;
    }
    public function next() : ?WorkflowStep {
        $result = $this->getDb()->next();
        if($result && get_class($result)=="ascio\model\common\WorkflowStepModel") {
            $this->getDb()->setRawAttributes($result->getAttributes());
            $this->getDb()->exists = true;
            return $this;
        }
        return null;
    }
    //Get the next step that is not set. Not sure if this is needed
    public function current() : ?WorkflowStep {
        $result = $this->getDb()->current();
        if($result && get_class($result)=="ascio\model\common\WorkflowStepModel") {
            $this->getDb()->setRawAttributes($result->getAttributes());
            $this->getDb()->exists = true;
            return $this;
        }
        return null;
    }
    /**
     * 
     * @return CreateOrderResponse|Workflow A new sub-workflow can be return. TODO: SubWorkFlow
     */
    public function run()  {
        $db = $this->getWorkflow()->getDb();
        try{
            $this->getWorkflow()->getDomain();            
            $result = $this->workflow->{$this->getName()}();             
        } catch(AscioOrderExceptionV2 $e) {
            $result = $e->getResult();
            $this->getWorkflow()->setStatus(OrderStatusType::Invalid);
            $db->setObject($this->getWorkflow());
            $this->setErrors($e->getErrors());
            $db->saveOrFail();
            Tools::log($e->formatErrors());
        } catch(AscioException $e) {            
            $result = $e->getResult();
            $this->getWorkflow()->setStatus(OrderStatusType::Invalid);
            $db->setObject($this->getWorkflow());
            $db->saveOrFail();
            $this->setStatus(OrderStatusType::Invalid);
            $this->setCode($e->getCode());
            $this->setMessage($e->getMessage());               
            $this->getDb()->update($this->getDb()->getAttributes());       
            Tools::log($e->formatErrors());
        }
        
        if(\get_class($result)=="ascio\\v2\\CreateOrderResponse") {
            /**
             * @var CreateOrderResponse $result
             */
            $status = $result->getOrder()->getStatus();
            $this->setPartner($this->getWorkflow()->getPartner());
            $this->setStatus($status);
            $this->setOrderId($result->getOrder()->getOrderId());
            $this->setCode($result->getCreateOrderResult()->getResultCode());
            $this->setMessage($result->getCreateOrderResult()->getMessage());   
            if($result->getCreateOrderResult()->getValues()) {
                $this->setErrors($result->getCreateOrderResult()->getValues()->getString());   
            }            
            $this->getDb()->update($this->getDb()->getAttributes());                   
        }
        if(\get_class($result)=="ascio\\lib\workflows\\Workflow") {
            //TODO: Process Subworkflow            
            /**
             * @var Workflow $result 
             */
            $result->setParent($this);      
            $result->init();      
            return $result->run();
        }
        return $result;
    }

    /**
     * Get the value of parent
     */ 
    public function getParent()
    {
        return $this->getDb()->getAttribute("Parent");
    }

    /**
     * Set the value of parent
     *
     * @return  self
     */ 
    public function setParent($parent)
    {
        $this->getDb()->setAttribute("Parent",$parent->db->getKey());
        $this->parent = $parent;
        return $this;
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
    public function setDescription($description)
    {
        $this->db->setAttribute("Description",$description);
        return $this;
    }

    public function setJob($job)
    {
        $this->db->setAttribute("Job",$job);
        return $this;
    }
        /**
     * Get the value of description
     */ 
    public function getJob()
    {
        return $this->getAttribute("Job");
    }
    public function getByOrderId($orderId) {
        $this->getDb()->orderId($orderId);
        return $this;
    }

        /**
     * Get the value of orderId
     */ 
    public function getOrderId()
    {
        return $this->getAttribute("OrderId");
    }
    

    /**
     * Set the value of orderId
     *
     * @return  self
     */ 
    public function setOrderId($orderId)
    {
        $this->db->setAttribute("OrderId",$orderId);
        return $this;
    }
    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->db->getAttribute("Name");
    }

    /**
     * Get $workflow
     *
     * @return  Workflow
     */ 
    public function getWorkflow()
    {
        return $this->workflow;
    }

        /**
     * Get $workflow
     *
     * @return  Workflow
     */ 
    public function getWorkflowId()
    {
        return $this->getDb()->getAttribute("Workflow");
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->db->getKey();
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->getDb()->getAttribute("Status");
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;
        $this->getDb()->setAttribute("Status",$status);
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
     * Get the value of partner
     */ 
    public function getPartner()
    {
        return $this->getDb()->getAttribute("Partner");
    }

    /**
     * Set the value of partner
     *
     * @return  self
     */ 
    public function setPartner($partner)
    {
        $this->partner = $partner;
        $this->getDb()->setAttribute("Partner",$partner);
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
}