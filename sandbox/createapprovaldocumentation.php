<?php
namespace ascio\lib;

use ascio\v3\ArrayOfAttachment;
use ascio\v3\Attachment;
use ascio\v3\base64Binary;
use ascio\v3\TestLib;
use ascio\v3\CreateApprovalDocumentationRequest;
use ascio\v3\IrtpApproval;
use ascio\lib\AscioException;
use SoapFault;
ini_set("soap.wsdl_cache_enabled", 0);
require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig("webrender");


$approval = new IrtpApproval();
$approval->setLoosingOwnerApprovalIP("123.123.123.123");
$approval->setLoosingOwnerApprovalTimestamp("2023-09-24+06:00");
$approval->setGainingOwnerApprovalIP("3.4.5.6");
$approval->setGainingOwnerApprovalTimestamp("2023-09-24+06:00");
$approval->setIRTPOptOut(true);

$attachment = new Attachment();
$attachment->setFileName("test.jpg");
$content = base64_encode("324234");
$attachment->setContent($content);

$attachments = new ArrayOfAttachment();
$attachments->addAttachment($attachment);


$request = new CreateApprovalDocumentationRequest();
$request->setApproval($approval);
try {
    $response =  Ascio::getClientV3()->createApprovalDocumentation($request);
    var_dump($response->serialize());
} catch ( SoapFault $e) {
    echo "\n\n". $e->getMessage()."\n\n";
    echo Ascio::getClientV3()->__getLastRequest();
}
catch ( AscioException $e) {
    echo  "\n\n". $e->getMessage()."\n\n";
    $e->debugSoap();
}