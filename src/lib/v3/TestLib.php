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
    public static function getDomain($name=null,$tld=null) : Domain {
        $faker = \Faker\Factory::create("de-DE");
        $fakedomain = $faker->domainName;
        if($tld) {
            $fakedomain = \str_replace(".com",".".$tld,$fakedomain);
            $fakedomain = \str_replace(".net",".".$tld,$fakedomain);
            $fakedomain = \str_replace(".org",".".$tld,$fakedomain);
            $fakedomain = \str_replace(".info",".".$tld,$fakedomain);
            $fakedomain = \str_replace(".biz",".".$tld,$fakedomain);
        }
        $email = Ascio::getConfig()->get()->email;
        $domain =  new Domain();        
        $registrant =  $domain->createOwner();
        $registrant->setFirstName($faker->firstNameFemale);
        $registrant->setLastName($faker->lastName);
        $registrant->setOrgName($faker->company);
        $registrant->setAddress1($faker->streetAddress);
        $registrant->setCity($faker->city);
        $registrant->setPostalCode($faker->postcode);
        $registrant->setCountryCode($faker->countryCode);
        $registrant->setEmail($email);
        $registrant->setPhone("+45.123456789012");
        $contact =  new Contact();
        $contact->setFirstName("John");
        $contact->setLastName($faker->lastName);
        $contact->setAddress1($faker->streetAddress);
        $contact->setPostalCode($faker->postcode);
        $contact->setCity($faker->city);
        $contact->setCountryCode($faker->countryCode);
        $contact->setEmail($email);
        $contact->setPhone("+45.123456789012");
        $contact->setType("owner");
        $nameServer1 =  new NameServer();
        $nameServer1->setHostName("ns1.ascio.com");
        $nameServer2 =  new NameServer();
        $nameServer2->setHostName("ns2.ascio.com");
        $nameServer3 =  new NameServer();
        $nameServer3->setHostName("ns3.ascio.com");
        $nameServer4 =  new NameServer();
        $nameServer4->setHostName("ns4.ascio.com");
        $nameServers =  new NameServers();
        $nameServers->setNameServer1($nameServer1);
        $nameServers->setNameServer2($nameServer2);
        $domain =  new Domain();
        $time = str_replace(".","",microtime(true));
        $domain->setName($name ?: ("ascio-".$fakedomain));
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
