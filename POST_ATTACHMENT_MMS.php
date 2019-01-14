<?php
	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/EGAHwbWtW692uzLs";
	$type="/sender/mms";
	
	//setting a header
	$headers=array(
		'Content-Type: application/json;charset=UTF-8'
	);
	
	//making a requestBody
	$requestBody=array(
			"title"=>"Title: PHP Test MMS",
			"body"=>"PHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\nPHP Test by REST API\n",
			"sendNo"=>"01041002071",
			"senderGroupingKey"=>"SenderGroupingKey",
			"attachFileIdList"=>[307917],
			"recipientList"=>[array(
				"recipientNo"=>"01041002071",
				"recipientGroupingKey"=>"RecipientGroupingKey"
			)]
	);
	
	//prepare REST API call
	$ch=curl_init($url.$appKeys.$type);
	
	//put header with the REST API
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestBody));
	
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