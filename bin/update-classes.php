<?php
require_once(__DIR__."/../vendor/rendermani/wsdl-client-generator/src/Generator.php");
use rendermani\wsdl\client\Generator;

$path= realpath(__DIR__."/../src");
echo "v2\n";
$Generator = new Generator("Ascio v2","v2","https://aws.ascio.com/2012/01/01/AscioService.xml");
$Generator->setCodeLang("php");
$Generator->setOutputPath($path);
$Generator->generate();
echo "v3\n";
$Generator = new Generator("Ascio v3","v3","https://aws.ascio.com/v3/aws.wsdl");
$Generator->setCodeLang("php");
$Generator->setOutputPath($path);
$Generator->generate();
echo "dns\n";
$Generator = new Generator("AscioDNS ","dns","https://dnsservice.ascio.com/2010/10/30/DnsService.wsdl");
$Generator->setCodeLang("php");
$Generator->setOutputPath($path);
$Generator->generate();