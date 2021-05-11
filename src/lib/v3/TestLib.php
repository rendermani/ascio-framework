<?php
namespace ascio\v3; 

use ascio\lib\Ascio;
use ascio\v3\Contact;
use ascio\v3\Domain;
use ascio\v3\NameServer;
use ascio\v3\NameServers;
use ascio\v3\PrivacyProxy;
use ascio\v3\Extensions;

class TestLib {
    public static function getDomain($name = null) : Domain {
        $email = Ascio::getConfig()->get()->email;
        $domain =  new Domain();        
        $registrant =  $domain->createOwner();
        $registrant->setFirstName("Jane");
        $registrant->setLastName("Doe");
        $registrant->setOrgName("Webrender");
        $registrant->setAddress1("Address1Test");
        $registrant->setCity("CityTest");
        $registrant->setPostalCode("OX4 6LB");
        $registrant->setCountryCode("GB");
        $registrant->setEmail($email);
        $registrant->setPhone("+45.123456789");
        $contact =  new Contact();
        $contact->setFirstName("John");
        $contact->setLastName("Doe");
        $contact->setAddress1("Address1Test");
        $contact->setPostalCode("888349");
        $contact->setCity("CityTest");
        $contact->setCountryCode("DK");
        $contact->setEmail($email);
        $contact->setPhone("+45.123456789");
        $contact->setType("owner");
        $nameServer1 =  new NameServer();
        $nameServer1->setHostName("ns1.ascio.net");
        $nameServer2 =  new NameServer();
        $nameServer2->setHostName("ns2.ascio.net");
        $nameServers =  new NameServers();
        $nameServers->setNameServer1($nameServer1);
        $nameServers->setNameServer2($nameServer2);
        $domain =  new Domain();
        $time = str_replace(".","",microtime(true));
        $domain->setName($name ?: "test-ascio-framework-".uniqid().".com");
        //$domain->setPrivacyProxy($proxy);
        $domain->setOwner($registrant);
        $domain->setAdmin($contact->clone());
        $domain->setTech($contact->clone());
        $domain->setBilling($contact->clone());
        $domain->setNameServers($nameServers);
        $domain->changes()->setOriginal();
        return $domain;
    }
    public static function getDomainFull($name = null) : Domain {
        $domain = TestLib::getDomain($name);
        $proxy = new PrivacyProxy();
        $extensions = new Extensions();
        $extensions->addKeyValue("key1","value1");
        $extensions->addKeyValue("key2","value2");
        $extensions->addKeyValue("key3","value3");
        $proxy->setExtensions($extensions);
        $domain->setPrivacyProxy($proxy);
        $dnsSecKeys = new DnsSecKeys();
        $key = $dnsSecKeys->createDnsSecKey1();
        $key->setDigest("000");
        $domain->setDnsSecKeys($dnsSecKeys);
        $domain->setDiscloseSocialData("true");
        $domain->changes()->setOriginal();
        return $domain; 
    }
}
