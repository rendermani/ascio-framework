<?php 
namespace ascio\migration;

use ascio\lib\ValidationException;
use ascio\v2\Contact;
use ascio\v2\NameServers;
use ascio\v2\Order;
use ascio\v2\Registrant;

class OrderParser {
    protected $order;
    protected $cleaner;
    protected $data;
    protected $tld;
    protected $dataLessTransferTlds = ["no"];
    public function __construct($data) 
    {
        $this->data = $data;

    }
    public function parse() : Order {
        $this->createOrder();
        $this->createDomain();
        $this->cleaner->localPresence();
        return $this->getOrder();
    }
    public function setCleaner(DataCleanerInterface $cleaner) {
        $this->cleaner = $cleaner;
        $this->cleaner->setOrder($this->createOrder());
    }
    protected function createDomain() {
        $domain = $this->getOrder()->createDomain();
        $domain->setDomainName($this->data["Domain Name"]);
        if(!$domain->getDomainName())  {
            throw new ValidationException("No domain-name",411);
        }
        $this->tld = $domain->getTld();

        if(! in_array($this->getTld(),$this->getDataLessTransferTlds())) {
            $this->parseRegistrant();
            $this->parseAdmin();
            $this->parseTech();
            $this->parseBilling();
            $this->parseNameServers();
        } 
        $this->cleaner->purpose();
    }
    protected function createOrder() : Order {
        if($this->getOrder()) return $this->getOrder();
        $this->order = new Order();
        $this->cleaner->setOrder($this->order);
        return $this->order;
    }
    protected function parseRegistrant() : Registrant {
        $data = $this->data;
        $domain = $this->getOrder()->getDomain();
        $c = $this->cleaner;
        $registrant = $domain->createRegistrant();
        $registrant->setOrgName($data["Company"]);
        $name1 = $data["Name1"] ? trim($data["Name1"])." " : "";
        $name2 = $data["Name2"] ? trim($data["Name2"])." " : "";
        $name3 = trim($data["Name3"]);
        
        $registrant->setName(trim($name1.$name2.$name3));
        $registrant->setAddress1(trim($data["Street"]));
        $registrant->setCity(trim($c->city($data["City"])));
        $registrant->setCountryCode(trim($data["Ctry"]));
        $registrant->setEmail("registry@softgarden.no");
        $registrant->setPhone($c->Phone($data["Phone"],$registrant->getCountryCode()));
        $registrant->setFax($c->Phone($data["Phone"],$registrant->getCountryCode()));
        $registrant->setRegistrantType($c->type());
        $registrant->setRegistrantNumber($c->number());
        $c->vat();
        $c->nexus();
        $c->state();
        $c->irishCountry();
        $c->registrantName(); 
      
        $c->postal($registrant,$data["Zip"]);
        $c->replaceCharacters($registrant);
        return $registrant;
    }
    protected function parseAdmin() : Contact {
        $data = $this->data;
        $c = $this->cleaner;
        $domain = $this->getOrder()->getDomain();
        $name1 = $data["Name1"] ? trim($data["Name1"])." " : "";
        $name2 = $data["Name2"] ? trim($data["Name2"])." " : "";
        $name3 = trim($data["Name3"]);
        $admin = $domain->createAdminContact();
        $admin->setOrgName(trim($data["Company"]));
        $admin->setFirstName(trim($name1.$name2));
        $admin->setLastName($name3);
        $admin->setAddress1(trim($data["Street"]));
        $admin->setCountryCode($this->getOrder()->getDomain()->getRegistrant()->getCountryCode());
        $c->postal($admin,$data["Zip"]);
        $admin->setCity($this->getOrder()->getDomain()->getRegistrant()->getCity());
        $admin->setEmail("registry@softgarden.no");
        $admin->setPhone($c->Phone($data["Phone"],$admin->getCountryCode()));
        $admin->setFax($c->Phone($data["Phone"],$admin->getCountryCode()));
        $admin->setOrganisationNumber($c->number());
        $admin->setType($c->type());
        $c->contactName($admin);
        $c->replaceCharacters($admin); 
        return $admin; 
    }
    protected function parseTech() : Contact {
        $data = $this->data;
        $domain = $this->getOrder()->getDomain();
        $domain->setTechContact($this->cleaner->switchHandle());
        return $domain->getTechContact();
    }
    protected function parseBilling() : Contact {
        $data = $this->data;
        $domain = $this->getOrder()->getDomain();
        $domain->setBillingContact($this->cleaner->switchHandle());
        return $domain->getBillingContact();
    }
    protected function parseNameServers() : NameServers {
        $data = $this->data;
        $nameservers =$this->getOrder()->getDomain()->createNameServers();
        $nameservers->createNameServer1()->setHostName("ns1.ascio.com");
        $nameservers->createNameServer2()->setHostName("ns2.ascio.com");
        $nameservers->createNameServer3()->setHostName("ns3.ascio.com");
        $nameservers->createNameServer4()->setHostName("ns4.ascio.com");
        return $nameservers;
    }
    /**
     * Get the order
     */ 
    public function getOrder() : ?Order
    {
        return $this->order;
    }

    /**
     * Get the cleaner
     */ 
    public function getCleaner(): DataCleanerInterface
    {
        return $this->cleaner;
    }

    /**
     * Get the value of tld
     */ 
    public function getTld()
    {
        return $this->tld;
    }

    /**
     * Get the value of dataLessTransferTlds
     */ 
    public function getDataLessTransferTlds()
    {
        return $this->dataLessTransferTlds;
    }

    /**
     * Set the value of dataLessTransferTlds
     *
     * @return  self
     */ 
    public function setDataLessTransferTlds($dataLessTransferTlds)
    {
        $this->dataLessTransferTlds = $dataLessTransferTlds;

        return $this;
    }
}