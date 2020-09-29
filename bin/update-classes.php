<?php
require_once(__DIR__."/../vendor/rendermani/wsdl-client-generator/src/Generator.php");
use rendermani\wsdl\client\Generator;
require(__DIR__."/../vendor/autoload.php");

$path = realpath(__DIR__."/../src");
$configPath = realpath(__DIR__."/../config/code-generator");
$generator = new Generator("Ascio v2","v2","https://aws.ascio.com/2012/01/01/AscioService.xml");
$generator->setConfigPath($configPath);
$generator->setCodeLang("php");
$generator->setOutputPath($path);
$generator->generate();
echo "v3\n";
$generator = new Generator("Ascio v3","v3","https://aws.ascio.com/v3/aws.wsdl");
$generator->setConfigPath($configPath);
$generator->setCodeLang("php");
$generator->setOutputPath($path);
$generator->generate();
echo "dns\n";
$generator = new Generator("AscioDNS ","dns","https://dnsservice.ascio.com/2010/10/30/DnsService.wsdl");
$generator->setConfigPath($configPath);
$generator->setCodeLang("php");
$generator->setOutputPath($path);
$generator->generate();