<?php
namespace ascio\v2; 

use ascio\lib\Ascio;
use ascio\v2\Contact;
use ascio\v2\Domain;
use ascio\v2\NameServer;
use ascio\v2\NameServers;
use ascio\v2\PrivacyProxy;
use ascio\v2\Extensions;

class TestLib {
    public static function getDomain($name = null) : Domain {
        Ascio::setConfig();
        $email = Ascio::getConfig()->get()->email;
        $domain =  new Domain();        
        $registrant =  $domain->createRegistrant();
        $registrant->setName("Jane Doe");
        $registrant->setAddress1("Address1Test");
        $registrant->setCity("CityTest");
        $registrant->setPostalCode("888349");
        $registrant->setCountryCode("DK");
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
        $dnsSecKeys = new DnsSecKeys();
        $key = $dnsSecKeys->createDnsSecKey1();
        $key->setDigest("000");
        $proxy = new PrivacyProxy();
        $extensions = new Extensions();
        $extensions->addExtension("key1","value1");
        $extensions->addExtension("key2","value2");
        $extensions->addExtension("key3","value3");
        $proxy->setExtensions($extensions);
        $domain =  new Domain();
        $time = str_replace(".","",microtime(true));
        $domain->setDomainName($name ?: "test-ascio-framework-".uniqid().".com");
        $domain->setPrivacyProxy($proxy);
        $domain->setRegistrant($registrant);
        $domain->setAdminContact($contact->clone());
        $domain->setTechContact($contact->clone());
        $domain->setBillingContact($contact->clone());
        $domain->setNameServers($nameServers);
        $domain->setDnsSecKeys($dnsSecKeys);
        $domain->setDiscloseSocialData("true");
        $domain->changes()->setOriginal();
        return $domain;
    }
}
