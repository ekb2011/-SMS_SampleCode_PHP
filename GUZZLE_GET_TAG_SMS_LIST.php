<?php
	//When Using Guzzle Framework
	//import Guzzle Framework - autoload.php
	require "..\\..\\..\\php\\vendor\\autoload.php";

	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/{appkey}";
	$type="/tag-sender";
	$query="?sendType=0&requestId={requestId}";
	
	$startRequestDate="2019-01-02";
	$endRequestDate="2019-01-02";
	
	//encode time data
	$encoded_startRequestDate=urlencode($startRequestDate);
	$encoded_endRequestDate=urlencode($endRequestDate);
	
	//setting a header
	$headers=array(
		'Content-Type: application/json;charset=UTF-8'
	);
	
	//set REST API Client
	$client=new GuzzleHttp\Client();
	
	//call REST API
	$response=$client->request('GET', $url.$appKeys.$type.$query."&startRequestDate=".$encoded_startRequestDate."&endRequestDate=".$encoded_endRequestDate, [
		'header'=>$headers
	]);
	
	//print result
	print_r(json_encode(json_decode($response->getBody(), true)));
?>