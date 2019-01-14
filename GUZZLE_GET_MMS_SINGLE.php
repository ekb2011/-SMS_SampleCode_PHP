<?php
	//When Using Guzzle Framework
	//import Guzzle Framework - autoload.php
	require "..\\..\\..\\php\\vendor\\autoload.php";

	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/{appkey}";
	$type="/sender/mms";
	$requestId="/{requestId}";
	$query="?mtPr={mtPr}";
	
	//setting a header
	$headers=array(
		'Content-Type: application/json;charset=UTF-8'
	);
	
	//set REST API Client
	$client=new GuzzleHttp\Client();
	
	//call REST API
	$response=$client->request('GET', $url.$appKeys.$type.$requestId.$query, [
		'header'=>$headers
	]);
	
	//print result
	print_r(json_encode(json_decode($response->getBody(), true)));
?>