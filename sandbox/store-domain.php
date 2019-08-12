<?php
require_once(__DIR__."/../vendor/autoload.php");

use ascio\v2\Domain;
use ascio\v2\Contact;
use ascio\v2\NameServer;
use ascio\v2\NameServers;
use ascio\v2\Order;
use ascio\v2\OrderType;
use ascio\lib\Ascio;
use ascio\v2\PrivacyProxy;

Ascio::setConfig();

$email = "manuellautenschlager@gmail.com";
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

$domain =  new Domain();
$time = str_replace(".","",microtime(true));
$domain->setDomainName("phpfw-manuel-".$time.".com");
$domain->setRegistrant($registrant);
$domain->setAdminContact($contact);
$domain->setTechContact($contact);
$domain->setBillingContact($contact);
$domain->setNameServers($nameServers);
$domain->setDiscloseSocialData("true");

$proxy = new PrivacyProxy();
$extensions = $proxy->createExtensions();
$extensions->addExtension("test","1234");
$extensions->addExtension("test","5678");
$extensions->addExtension("test","910");
$domain->setPrivacyProxy($proxy);

$order = new Order();
$order->setType(OrderType::Register_Domain);
$order->setDomain($domain);

$order->db()->syncToDb();

