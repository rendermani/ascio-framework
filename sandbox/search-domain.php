<?php
$wsdl = "https://aws.demo.ascio.com/2012/01/01/AscioService.wsdl";
//$wsdl = "https://aws.ascio.com/2012/01/01/AscioService.wsdl";
$client = new SoapClient($wsdl,array( "trace" => 1 ));

$session= array(
	"Account" => "mlautens",
	"Password" => "PasswordTest"
);
//LogIn

$logIn= array(
	"session" => $session
);
try{	
    $result = $client->logIn($logIn);
    echo "ResultCode : ".$result->LogInResult->ResultCode."\r\n";
    echo "ResultMessage : ".$result->LogInResult->Message."\r\n";
    $sessionId = $result->sessionId; 
} catch(Exception $e) {
	echo $e->getMessage(); 
}

//Clause

$clause= array(
	"Attribute" => "DomainName",
	"Operator" => "Is",
	"Value" => "Mr."
);
//ArrayOfClause

$clauses= array(
	$clause
);
//SearchCriteria

$criteria= array(
	"Clauses" => $clauses,
	"Mode" => "Strict",
	"Withoutstates" => ["active","deleted"]
);
//SearchDomain

$searchDomain= array(
	"sessionId" => $sessionId,
	"criteria" => $criteria
);
try{	
    $result = $client->searchDomain($searchDomain);
    echo "ResultCode : ".$result->SearchDomainResult->ResultCode."\r\n";
    echo "ResultMessage : ".$result->SearchDomainResult->Message."\r\n";
    if($result->SearchDomainResult->Values) {
        foreach($result->SearchDomainResult->Values as $key => $value) {
            echo $value->string."\r\n";
        }
    }
} catch(Exception $e) {
	echo $e->getMessage(); 
}
