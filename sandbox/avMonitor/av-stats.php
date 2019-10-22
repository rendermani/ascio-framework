<?php

class AvMonitor {
	public $tlds;
	public $env;
	public $user;
	/**
	 * @var SoapClient $client
	 */
	public $client;
	public $sessionId;
	public $qualities = ["Fast","Smart","Live"];
	function __construct(array $tlds,string $env,string $user,string $pw)
	{
		$this->tlds = $tlds;
		$prefix = $env == "live" ? "" : "demo.";
		$wsdl = "https://aws.".$prefix."ascio.com/2012/01/01/AscioService.wsdl";
		$this->client = new SoapClient($wsdl,array( "trace" => 1 ));
		$this->login($user,$pw);
	}
	function login($username,$password) {
		echo "\n*** Login ***\n\n";
		$session = array(
			'Account'=> $username,
			'Password' => $password
			);
		$params = array('session' => $session );
		$result = $this->client->LogIn($params);
		echo 'ResultCode : '.$result->LogInResult->ResultCode."\r\n";
		echo 'ResultMessage : '.$result->LogInResult->Message."\r\n";
		if ($result->LogInResult->ResultCode == '200') {
			echo 'SessionId : ' . $this->sessionId = $result->sessionId;
		}	
	}
	function run() {
		echo "\n\n\n*** AvailabilityCheck ***\n\n";
		while(true) {
			foreach($this->tlds as $tld) {
				foreach($this->qualities as $quality) {
					$this->request($tld,$quality);
				}
			}
		}
	}
	function request($tld,$quality) {
		$name = "testme".rand(0,1000);
		$domainName = $name . "." . $tld;
		$params = array(
			'sessionId' => $this->sessionId ,
			'domains' => ['string' => [$name]],
			'tlds' => ['string' => [$tld]],
			'quality' => $quality
			);
		$start = microtime(true);
		try {
			$result = $this->client->AvailabilityCheck($params);		
			$status = $result->AvailabilityCheckResult;
			if($status->ResultCode > 299) {
				$message =  $status->Message;
				$code =  $status->ResultCode;
			} else {
				$availabilityResult = 
					is_array($result->results->AvailabilityCheckResult) ?
					$result->results->AvailabilityCheckResult[0] :
					$result->results->AvailabilityCheckResult;
				$message =  $availabilityResult->StatusMessage;
				$code =  $availabilityResult->StatusCode;

			}
		} catch (SoapFault $e) {
			$message =  $e->faultstring;
			$code =  $e->faultcode;
		}
		$objDateTime = new DateTime('NOW');
		$time =  $objDateTime->format('Y-m-d\TH:i:s');
		$host = gethostname();
		$ip = gethostbyname($host);		

		$duration =  round((microtime(true) - $start)*1000)/1000;		
		$out = $duration."s [".$time."] ". $this->username."@".$ip. " - ". $domainName.  " - ".$quality.": ".$message."\n";
		$outJson = [
			"tld" => $tld,
			"quality" => $quality,
			"time" => $time,
			"duration" => $duration,
			"username" => $this->username,
			"ip" => $ip,
			"domain" => $domainName,
			"message" => $message,
			"code" => $code,
			"worker_id" => 0,
			"script" => "av-stats"
		];
		$outCsv = implode(";",$outJson)."\n";
		if(!file_exists(__DIR__ . "/logs/av.csv")) {
			$outCsvHeader = implode("; ",array_keys($outJson))."\n";
			file_put_contents(__DIR__ . "/logs/av.csv",$outCsvHeader);
		}
		file_put_contents(__DIR__ . "/logs/av.log",$out,FILE_APPEND);
		file_put_contents(__DIR__ . "/logs/av.json",json_encode($outJson)."\n",FILE_APPEND);
		file_put_contents(__DIR__ . "/logs/av.csv",$outCsv,FILE_APPEND);
		echo $out;
		sleep(3);
	}
}
$tlds = ["ch","com","de","at","li","eu","it","fr","net","org","info","shop","swiss"];
$username = "webrender";
$password = "vnVeb4TtVah9hw{S8yd3[";
$av =  new AvMonitor($tlds,"live",$username,$password);
$av->run();
