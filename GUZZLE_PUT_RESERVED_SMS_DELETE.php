<?php
	//When Using Guzzle Framework
	//import Guzzle Framework - autoload.php
	require "..\\..\\..\\php\\vendor\\autoload.php";

	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/{appkey}";
	$type="/reservations/cancel";
	
	//setting a header
	$headers=array(
		'Content-Type: application/json;charset=UTF-8'
	);
	
	//making a requestBody
	$requestBody=array(
			"reservationList"=>[array(
				"requestId"=>"{requestId}",
				"recipientSeq"=>1
			)],
			"updateUser"=>"gibonglim"
	);
	
	//set REST API Client
	$client=new GuzzleHttp\Client();
	
	//call REST API
	$response=$client->request('PUT', $url.$appKeys.$type, [	
		'header'=>$headers,
		'json'=>$requestBody
	]);
	
	//print result
	print_r(json_encode(json_decode($response->getBody(), true)));
?>