<?php
	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/EGAHwbWtW692uzLs";
	$type="/tag-sender";
	$query="?sendType=0&requestId=20190102164253Qi42OxhF231";
	
	$startRequestDate="2019-01-02";
	$endRequestDate="2019-01-02";
	
	//encode time data
	$encoded_startRequestDate=urlencode($startRequestDate);
	$encoded_endRequestDate=urlencode($endRequestDate);
	
	//setting a header
	$headers=array(
		'Content-Type: application/json;charset=UTF-8'
	);
	
	//prepare REST API call
	$ch=curl_init($url.$appKeys.$type.$query."&startRequestDate=".$encoded_startRequestDate."&endRequestDate=".$encoded_endRequestDate);
	
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