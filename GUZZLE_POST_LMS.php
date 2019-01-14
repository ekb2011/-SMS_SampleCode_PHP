<?php
	//When Using Guzzle Framework
	//import Guzzle Framework - autoload.php
	require "..\\..\\..\\php\\vendor\\autoload.php";

	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/{appkey}";
	$type="/sender/mms";
	
	//setting a header
	$headers=array(
		'Content-Type: application/json;charset=UTF-8'
	);
	
	//making a requestBody
	$requestBody=array(
			"title"=>"Title: PHP Test LMS",
			"body"=>"PHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\n",
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