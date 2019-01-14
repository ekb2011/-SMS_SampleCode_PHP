<?php
	//import Guzzle Framework - autoload.php
	require "..\\..\\..\\php\\vendor\\autoload.php";

	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/EGAHwbWtW692uzLs";
	$type="/statistics/view";
	$query="?searchType=DATE";
	
	//set time for getting results
	$fromDate="2018-12-20";
	$toDate="2018-12-20";
	$fromTime="00:00";
	$toTime="10:40";

	//encode time data for URL query
	$encoded_from=urlencode($fromDate.' '.$fromTime);
	$encoded_to=urlencode($toDate.' '.$toTime);
	
	//setting a header
	$headers=array(
		'Content-Type: application/json;charset=UTF-8'
	);
	
	//set REST API Client
	$client=new GuzzleHttp\Client();
	
	//call REST API
	$response=$client->request('GET', $url.$appKeys.$type.$query."&from=".$encoded_from."&to=".$encoded_to, [
		'header'=>$headers
	]);
	
	//print result
	print_r(json_encode(json_decode($response->getBody(), true)));
?>