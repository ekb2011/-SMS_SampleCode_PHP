<?php
	//import Guzzle Framework - autoload.php
	require "..\\..\\..\\php\\vendor\\autoload.php";
	
	function get6DigitNumber(){
		$t=time()%1000000;
		$t=$t%1000000;
		$certNumLength=6;
		$range=pow(10, $certNumLength);
		$trim=pow(10, $certNumLength-1);
		$result=rand(0, (int)$t)+$trim;
		if ($result>$range){
			$result=$result-$trim;
		}
		return $result;
	}

	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/EGAHwbWtW692uzLs";
	$type="/sender/auth/sms";
	
	//setting a header
	$headers=array(
		'Content-Type: application/json;charset=UTF-8'
	);
	
	//making a requestBody
	$requestBody=array(
			"body"=>"Authorization Code is:[".get6DigitNumber()."]",
			"sendNo"=>"01041002071",
			"senderGroupingKey"=>"SenderGroupingKey",
			"recipientList"=>[array(
				"recipientNo"=>"01041002071",
				"recipientGroupingKey"=>"RecipientGroupingKey"
			)]
	);
	
	//set REST API Client
	$client=new GuzzleHttp\Client();
	
	//call REST API
	$response=$client->request('POST', $url.$appKeys.$type, [	
		'header'=>$headers,
		'json'=>$requestBody
	]);
	
	//print result
	print_r(json_encode(json_decode($response->getBody(), true)));
?>