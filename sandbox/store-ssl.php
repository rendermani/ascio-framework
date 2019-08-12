<?php
namespace ascio\lib;

use ascio\v3\OrderType;
use ascio\v3\SslCertificateOrderRequest;
use ascio\v3\Contact;
use ascio\v3\Registrant;
use ascio\v3\ArrayOfString;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

$order = new SslCertificateOrderRequest();
$order->setType(OrderType::Register);
$certificate = $order->createSslCertificate();

$contact = new Contact();
$contact->setFirstName("Manuel");
$contact->setLastName("Lautenschlager");
$contact->setAddress1("adr.1");
$contact->setEmail(Ascio::getConfig()->get()->email);

$owner = new Registrant();
$owner->setFirstName("Manuel");
$owner->setLastName("Lautenschlager");
$owner->setAddress1("adr.1");
$owner->setEmail(Ascio::getConfig()->get()->email);
$extensions = $owner->createExtensions();
$extensions->addKeyValue("Title","Mr");

$certificate->setOwner($owner);
$certificate->setAdmin($contact);
$certificate->setCommonName("abc@abc.com");
$arrayOfStrings = new ArrayOfString();
$arrayOfStrings->fromArray(["abc.de","cde.com"]);
$certificate->setSanNames($arrayOfStrings);

$order->db()->syncToDb();