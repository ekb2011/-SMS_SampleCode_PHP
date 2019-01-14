<?php
	//When Using Guzzle Framework
	//import Guzzle Framework - autoload.php
	require "..\\..\\..\\php\\vendor\\autoload.php";
	
	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/{appkey}";
	$type="/sender/sms";
	
	//setting a header
	$headers=array(
		"Content-Type"=> "application/json;charset=UTF-8"
	);
	
	//making a requestBody
	$requestBody=array(
			"requestDate"=> "2019-01-03 16:30",
			"body"=>"Reserved SMS at 16:30",
			"sendNo"=>"",
			"senderGroupingKey"=>"SenderGroupingKey",
			"recipientList"=>[array(
				"recipientNo"=>"",
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