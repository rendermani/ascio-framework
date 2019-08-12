<?php
$username = "";
$password = "";

$wsdl = 'https://aws.ascio.com/2012/01/01/AscioService.wsdl';
$client = new SoapClient($wsdl,array( "trace" => 1 ));

// login

$session = array(
	'Account'=> $username,
	'Password' => $password
	);

$tlds = array("net");
$iterations = 100;


echo "\n*** Login ***\n\n";

$params = array('session' => $session );
try{	
	$result = $client->LogIn($params);
//	echo $client->__getLastRequest();  //see the SOAP request
//	echo $client->__getLastResponse(); //see the SOAP response
	echo 'ResultCode : '.$result->LogInResult->ResultCode."\r\n";
	echo 'ResultMessage : '.$result->LogInResult->Message."\r\n";
	if ($result->LogInResult->ResultCode == '200') {
		echo 'SessionId : ' . $sessionId = $result->sessionId;
	}
} catch(Exception $e) {
	echo $e->getMessage(); 
}
if(!isset($sessionId)) {
	die();
}
echo "\n\n\n*** AvailabilityCheck ***\n\n";
// availability
$durationAll = 0;
try {
	for($z=0; $z < $iterations ; $z++) {
		$params = array(
		'sessionId' => $sessionId ,
		'domains' => array('string' => array("testme".rand(0,1000))),
		'tlds' => array('string' => $tlds),
		'quality' => 'Smart'
		);
		$start = microtime(true);
		$result = $client->AvailabilityCheck($params);
		echo $client->__getLastRequest();
		var_dump($result);
		$objDateTime = new DateTime('NOW');
		$time =  $objDateTime->format('c');
		$host= gethostname();
		$ip = gethostbyname($host);		
		$availabilityResult = $result->results->AvailabilityCheckResult[0];
		$duration =  (microtime(true) - $start)  ;		
		$durationAll += $duration;
		echo $duration."[".$time."] ". $username."@".$ip. " - ". $availabilityResult->DomainName. ": ".$availabilityResult->StatusMessage."\n";
		//var_dump($result->results);
	}
	echo "average time: ". ($durationAll / $iterations)."\n";

} catch(Exception $e) {
	echo $e->getMessage(); 
}

?>
