<?php
	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/{appkey}";
	$type="/sender/sms";
	$requestId="?requestId={requestId}";
	
	//setting a header
	$headers=array(
		'Content-Type: application/json;charset=UTF-8'
	);
	
	//prepare REST API call
	$ch=curl_init($url.$appKeys.$type.$requestId);
	
	//put header with the REST API
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
	//call REST API and get response
	$res = curl_exec($ch);
	
	//close connection
	curl_close($ch);
	
	//print result
	var_dump($res);
?>