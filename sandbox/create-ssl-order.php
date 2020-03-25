<?php
namespace ascio\lib;

use ascio\service\v3\WebServerType;
use ascio\v3\OrderType;
use ascio\v3\SslCertificateOrderRequest;
use ascio\v3\Contact;
use ascio\v3\Registrant;
use ascio\v3\ArrayOfString;
use SoapFault;

require(__DIR__."/../vendor/autoload.php");
$order = new SslCertificateOrderRequest();
$order->setType(OrderType::Register);
$order->setPeriod(1);
$certificate = $order->createSslCertificate();

$contact = new Contact();
$contact->setFirstName("Manuel");
$contact->setLastName("Lautenschlager");
$contact->setAddress1("adr.1");
$contact->setPostalCode("8888");
$contact->setCity("Munich");
$contact->setPhone("+49.3343432434");
$contact->setCountryCode("DE");

$contact->setEmail(Ascio::getConfig()->get()->email);

$owner = new Registrant();
$owner->setFirstName("Manuel");
$owner->setLastName("Lautenschlager");
$owner->setAddress1("adr.1");
$owner->setPostalCode("8888");
$owner->setCity("Munich");
$owner->setPhone("+49.3343432434");
$owner->setCountryCode("DE");
$owner->setEmail(Ascio::getConfig()->get()->email);
$extensions = $owner->createExtensions();
$extensions->addKeyValue("Title","Mr");
$certificate->setCSR("-----BEGIN CERTIFICATE REQUEST-----MIIC2jCCAcICAQAwgZQxCzAJBgNVBAYTAkRFMRMwEQYDVQQIDApTb21lLVN0YXRlMQ8wDQYDVQQHDAZNdW5pY2gxEzARBgNVBAoMClRlc3RDb21hbnkxHjAcBgNVBAMMFWFzY2lvLXRlc3QtZG9tYWluLmNvbTEqMCgGCSqGSIb3DQEJARYbYWRtaW5AYXNjaW8tdGVzdC1kb21haW4uY29tMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwQ9AgF9B381tELA3BsKkIwu4Ddg0hOSfyrtBnm895ELPYG4YcPYXmauTxPu0oD6WhudQh2tbnN/QTRsZpdVgahS6uz7065wUC6IrvlcuaCx+e08vp/1VOIUrKfyrxkZ1mjrv4FwQ38y+ITejL46JBbKbhqbeovQymA/DmHmKUylNY3eud6w/Dp+QOoa1jIZRdHv5ie+ranOx9aYl0WeuzrIOeIVI7UKVF9d1o5r2h60wThLPzky9hux5uisGYZsWjFKOJUFZxkX4riResOWmkFy9KUV82MLuScrSJ4cVfVPmhN3tEpOtYhkJVkS0PvR7LCdL4rOF0pqzL71m2ZoMdQIDAQABoAAwDQYJKoZIhvcNAQELBQADggEBAHcDTCtBQmGcIarD4NFmKt+Tw3l2p+tGRA8OiT7dSTvJ1TavZYdcobFKkBhp/3T9ko4wncBChp97YWNWtQT+hoIrOh85QIMHW14JeVFk8AiptI5pI+DPHnSwSq4XANwwrUI/3zAeRtV7bQmP9upebZ3POJ9Bl9oarge8J2SJ6yM5Dizq9wmGgQlhEG9HuuvJHFGjci86m8yqbqlS8JaIvO2dA4OpEM3cCcu7jY13RYN4DT06VAx2okMJmAyxvG9eu45MIB/NzeV4SrqsTNqCkrXKiC9/rAzhl7eP3XDRI6XZFRq7qmIAQoZJqWSyl1f4cq+rbLIJ9xE+yII+qt/CVbc=-----END CERTIFICATE REQUEST-----");
$certificate->setOwner($owner);
$certificate->setAdmin($contact);
$certificate->setTech(clone $contact);
$certificate->setApproverEmail("ml@webrender.de");
$certificate->setWebServerType(WebServerType::Apache2);
$certificate->setProductCode("positivemdcssl"); 
$certificate->setCommonName("testssl-manuel-".uniqid().".com");
$certificate->setValidationType("Email");
$arrayOfStrings = new ArrayOfString();
$arrayOfStrings->fromArray(["testssl-manuel-abc.de","testssl-manuel-cde.com"]);
//$certificate->setSanNames($arrayOfStrings);
try {
    $order->submit();
} catch (SoapFault $e) {
    echo $e->getMessage();
    echo $e->getTraceAsString();
    echo Ascio::getClientV3()->__getLastRequest();
}catch (AscioOrderExceptionV3 $e) {
    echo $e->getMessage();
    echo($e->formatErrors());
    //echo Ascio::getClientV3()->__getLastResponse();
}