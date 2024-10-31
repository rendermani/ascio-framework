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
        $faker = \Faker\Factory::create("de-DE");
        $email = Ascio::getConfig()->get()->email;
        $domain =  new Domain();        
        $registrant =  $domain->createRegistrant();
        $registrant->setName($faker->firstNameFemale . " " . $faker->lastName);
        $registrant->setAddress1($faker->streetAddress);
        $registrant->setCity($faker->city);
        $registrant->setPostalCode($faker->postcode);
        $registrant->setCountryCode("AL");
        $registrant->setEmail($email);
        $registrant->setPhone("+45.123456789");
        $contact =  new Contact();
        $contact->setFirstName($faker->firstNameFemale );
        $contact->setLastName($faker->lastName);
        $contact->setAddress1($faker->streetAddress);
        $contact->setPostalCode($faker->postCode);
        $contact->setCity($faker->city);
        $contact->setCountryCode("AL");
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
        $domain->setDomainName($name ?: ("af" . "-".$faker->domainName));
        //$domain->setPrivacyProxy($proxy);
        $domain->setRegistrant($registrant);
        $domain->setAdminContact($contact->clone());
        $domain->setTechContact($contact->clone());
        $domain->setBillingContact($contact->clone());
        $domain->setNameServers($nameServers);
        $domain->changes()->setOriginal();
        return $domain;
    }
    public static function getDomainFull($name = null) : Domain {
        $domain = TestLib::getDomain($name);
        $proxy = new PrivacyProxy();
        $extensions = new Extensions();
        $extensions->addExtension()->setKey("key1")->setValue("value1");
        $extensions->addExtension()->setKey("key2")->setValue("value2");
        $extensions->addExtension()->setKey("key3")->setValue("value3");
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
