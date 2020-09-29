<?php
namespace ascio\migration;

use ascio\lib\ValidationException;
use ascio\v2\Contact;
use ascio\v2\Domain;
use ascio\v2\Order;
use ascio\v2\Registrant;
use Exception;
use libphonenumber\NumberParseException;
use \libphonenumber\PhoneNumberUtil;

class DataCleaner implements DataCleanerInterface {
    public $tld; 
    protected $order;
    public function __construct(?Order $order = null)
    {
        $this->order = $order; 
    }
    public function phone($phoneNumber,$country) {
        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $nrProto = $phoneUtil->parse($phoneNumber, $country);
            return "+".$nrProto->getCountryCode().".".$nrProto->getNationalNumber();
        } catch (NumberParseException $e) {
            return "+49.123456789";
        }
    }
    public function contactName(Contact $contact) : void {
        if($contact->getFirstName() =="") {
            $contact->setFirstName(null);
        }
        if($contact->getLastName() =="") {
            $contact->setLastName(null);
        }
        if(! ($contact->getFirstName() && $contact->getLastName())) {
            $companySplit = explode(" ",$contact->getOrgName());
            if(count($companySplit) > 1) {
                $contact->setFirstName($companySplit[0]);
                $contact->setLastName($companySplit[1]);
            } else {
                $contact->setFirstName($contact->getOrgName());
                $contact->setLastName($contact->getOrgName());
            }
        } 
    }
    function registrantName() : void {
        $registrant = $this->getOrder()->getDomain()->getRegistrant();
        if($registrant->getName()=="") {
            $registrant->setName(null);
        }
        if(!$registrant->getName()) {
            $registrant->setName($registrant->getOrgName());
        } 
    }
    public function city ($string) : ?string {
        //$string = str_replace("-"," ",$string);
        $string = str_replace("–","-",$string);
        return $string;
    }
    /**
     * @param Contact|Registrant $contact
     */
    function postal($contact, $postalCode) : ?string {
        $postalCode = trim($postalCode);
        switch ($contact->getCountryCode()) {
            case  "NL":
                if($this->getTld()=="nl") {
                    $contact->setPostalCode(str_replace(" ","",$postalCode)); 
                }              
            break;
            case "NO":
                if(!DataCleaner::startsWith($postalCode,"NO"))  {
                    $contact->setPostalCode("NO-".$postalCode);
                } 
            break;
            default: 
                $contact->setPostalCode($postalCode);
        } 
        return $contact->getPostalCode();
    }
    /**
     * @param Contact|Registrant $contact
     */
    function orgName ($contact) {
        return $contact->getOrgName();
    }
        /**
     * @param Contact|Registrant $contact
     */
    function address ($contact) : ?string{
        return $contact->getAddress1();
    }
    function nexus () : void {
        $registrant = $this->getOrder()->getDomain()->getRegistrant();
        switch ($this->getTld()) {
            case "us" :
                $registrant->setNexusCategory("C32");
            break;           
        }
    }
    public function vat() : void {
        $registrant = $this->getOrder()->getDomain()->getRegistrant();
        switch ($this->getTld()) {
            case "pt" :
                $registrant->setVatNumber("orgnumber");
            break;
        }
    }
    public function purpose () : void {
        $domain = $this->getOrder()->getDomain();
        switch ($this->getTld()) {
            case "us" :
                $domain->setDomainPurpose("P1");
            break;           
        }
    }
    public function localPresence () : void{
        switch ($this->getTld()) {
            case "sg" :
                $this->getOrder()->setLocalPresence("LocalPresenceAdmin");
            break;         
        }
    } 
    public function state () : ?string {
        $registrant = $this->getOrder()->getDomain()->getRegistrant();
        switch ($this->getTld()) {
            case "com.gr" :
            case "gr" :
                return $registrant->getCountryCode();
            break;    
            default : return $registrant->getState();     
        }
    }
    public function number() : ?string {        
        $country = $this->getOrder()->getDomain()->getRegistrant()->getCountryCode();
        switch ($this->getTld()) {     
            case "se" :
            case "nu" :
                switch ($country) {
                    case "NO" : return  "[NO]2345672121"; break;
                    case "SE" : return "[SE]2345672121"; break;
                    case "DK" : return "[DK]2345672121"; break;
                    default : return "2345672121";
                };
            break;
            default :
                return "2345672121";         
        }
    }
    public function type() : ?string {          
        switch ($this->getTld()) {
            case  "nl":
                return "BGG";             
            break;
            case "ca" :
                return "CA";    
            break;
            case "it" :
                return "7";    
            break;
            case "ee" :
                return "org";    
            break;
            case "fr" :
                return "Company";    
            break;
            case "fi" :
                return "1";
            break;
            default : return null;
        }
    }
    function registrantTypesOld(Order $order) {
        $domain = $order->getDomain();
        $registrant = $domain->getRegistrant();
        $registrant->setRegistrantNumber("2345672121");        
        
        switch ($this->getTld()) {
            case  "nl":
                $registrant->setRegistrantType("BGG");
                if($registrant->getOrgName() == "Orkla Health AS") {
                    $registrant->setAddress1("Drammensveien 149A");
                }
                if($registrant->getCountryCode()=="NL") {
                    $registrant->setPostalCode(str_replace(" ","",$registrant->getPostalCode()));
                }
            break;
            case "ca" :
                $registrant->setRegistrantType("CA");    
            break;
            case "it" :
                $registrant->setRegistrantType("7");    
            break;
            case "ee" :
                $registrant->setRegistrantType("org");    
            break;
            case "fi" :
                $registrant->setRegistrantType("1");    
            break;
            case "fr" :
                $registrant->setRegistrantType("Company");    
            break;
            case "pt" :
                $registrant->setVatNumber("orgnumber");
            break;
            case "us" :
                $registrant->setNexusCategory("C32");
                $domain->setDomainPurpose("P1");
            break;
            case "com.gr" :
            case "gr" :
                $registrant->setState($registrant->getCountryCode());
            break;
            case "sg" :
                $order->setLocalPresence("LocalPresenceAdmin");
            break;
            case "se" :
            case "nu" :
                $registrant->setRegistrantNumber("[SE]2345672121");    
            break;    
        }
    }
    function getPremium($msg) : ?int {
        preg_match("/The Premium Sales Price is ([0-9]+)/" ,$msg,$premium);
        if($premium && count($premium) > 1) {
            return $premium[1];
        } else {
            return null; 
        }
    }
    function switchHandle() : Contact {
        $contact = new Contact();
        switch ($this->getTld()) {
            case "nl" : $handle = "SH438131"; break;
            case "gr" : $handle = "SH91513"; break;
            default : $handle = "HM99459"; 
        }
        return $contact->setHandle($handle);
    }
    /**
     * @param Contact|Registrant $contact
     */
    function replaceCharacters($contact) {
        foreach($contact->properties() as $key => $value) {
            $searchTlds=[
                "pizza",
                "sk",
                "si",
                "pt",
                "nl",
                "rs",
                "nz",
                "co.nz",
                "li",
                "cz",
                "pl",
                "net.pl",
                "biz.pl",
                "ro",
                "com.pl",
                "ch",
                "as",
                "org",
                "info",
                "recipes",
                "guide",
                "lv",
                "us",
                "co.nl",
                "si",
                "cz",
                "ee",
                "me",
                "asia",
                "co.in",
                "in",
                "ee",
                "blog",
                "care",
                "ax",
                "organic",
                "fun",
                "at",
                "ba",
                "be",
                "pk",
                "by",
                "co",
                "mk",
                "app",
                "com.mk",
                "co.il",
                "il",
                "nu",
                "my",
                "fi",
                "lu",
                "lt",
                "com.my"
            ];
            $replacements = [
                "æ" => "e", 
                "á" => "a", 
                "ø" => "oe",
                "å" => "a",
                "Æ" => "E",
                "Ø" => "O",
                "Å" => "A",
                "ß" => "s",
                "õ" => "o",
                "Õ" => "O",
                "ž" => "z",
                "ä" => "ae",
                "ü" => "ue",
                "ö" => "oe",
                "Ä" => "AE",
                "Ü" => "UE",
                "Ö" => "OE",
                "š" => "s",
                "š" => "s",
                "´" => "",
                "ý" => "y",
                "–" => "-",
                "í" => "i"
            ];
            if(in_array($this->getTld(),$searchTlds)) {
                foreach($replacements as $search => $replace) {
                    $value = str_replace($search,$replace,$value);
                }
            }
            $contact->set($key,trim($value));   
        }
    }
    public static function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }
    public static function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }
        return (substr($haystack, -$length) === $needle);
    }
    /**
     * Get the value of tld
     */ 
    public function getTld()
    {
        $tld = $this->getOrder()->getDomain()->getTld();
        if(!$tld)  {
            $e =  new ValidationException("No TLD");
            $e->setObjectName($this->getOrder()->getDomain()->getDomainName());
        }
        return $tld; 
    }
    
    /**
     * Set the value of tld
     *
     * @return  self
     */ 
    public function setTld($tld)
    {
        $this->tld = $tld;

        return $this;
    }

    /**
     * Get the value of order
     */ 
    public function getOrder() : Order
    {
        return $this->order;
    }

    /**
     * Set the value of order
     *
     * @return  self
     */ 
    public function setOrder(Order $order)
    {
        $this->order = $order;
        return $this;
    }

}
