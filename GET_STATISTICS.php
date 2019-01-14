<?php
	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/{appkey}";
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
	
	//prepare REST API call
	$ch=curl_init($url.$appKeys.$type.$query."&from=".$encoded_from."&to=".$encoded_to);
	
	//put header with the REST API
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
	//call REST API and get response
	$res = curl_exec($ch);
	
	//print result
	$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($res, 0, $header_size);
    $body = substr($res, $header_size);    
 
    $body_json = json_decode($body, true);
    print_r($body_json);
	
	//close connection
	curl_close($ch);
?>