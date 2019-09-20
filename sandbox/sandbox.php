<?php
namespace ascio\lib;

use ascio\v2\ArrayOfString;
use ascio\v2\Contact;
use ascio\v2\PrivacyProxy;
use ascio\v2\TestLib;
use ascio\v3\Contact as AscioContact;
use ascio\v3\OrderType;
use ascio\v3\Registrant;
use ascio\v3\SslCertificateOrderRequest;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();
$order = new SslCertificateOrderRequest();
$order->setType(OrderType::Register);
$certificate = $order->createSslCertificate();

$contact = new AscioContact();
$contact->setFirstName("Manuel");
$contact->setLastName("Lautenschlager");
$contact->setAddress1("adr.1");
$contact->setEmail(Ascio::getConfig()->get()->email);

$owner = new Registrant();
$owner->setFirstName("Manuel");
$owner->setLastName("Lautenschlager");
$owner->setAddress1("adr.1");
$owner->setEmail(Ascio::getConfig()->get()->email);
//$extensions = $owner->createExtensions();
//$extensions->addKeyValue("Title","Mr");
//$extensions->addKeyValue("Test","Me");

$certificate->setOwner($owner);
$certificate->setAdmin($contact);
$certificate->setCommonName("abc.com");
$certificate->createSanNames()->add(["abc.de","cde.com"]);
$order->db()->syncToDb();
$id = $order->db()->_id; 

$order = new SslCertificateOrderRequest();
$order->db()->_id = $id; 
$order->db()->syncFromDb();


die();
foreach($extensions as $key => $value) {
    echo $value->getKey() .": ". $value->getValue() ."\n";
}
foreach($certificate->getSanNames() as $key => $value) {
    echo $key .": ". $value ."\n";
}

die();

$arr = new ArrayOfString();
$arr[] = "a";
$arr[] = "b";
$arr[] = "c";

$arr2 = new ArrayOfString();
$arr2[] = "1";
$arr2[] = "2";
$arr2[] = "3";

$arr->add("string","e");
$arr->addString("f","g");
$arr->add("string",$arr2);

foreach($arr as $key => $value) {
    echo $key .": ".$value."\n";
}
