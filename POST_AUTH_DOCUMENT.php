<?php
	function getBase64($filePath){
		$data=file_get_contents($filePath);
		return base64_encode($data);
	}
	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/{appkey}";
	$type="/requests/attachFiles/authDocuments";
	
	//setting a header
	$headers=array(
		'Content-Type: multipart/form-data'
	);
	
	//making a requestBody
	$pathToUpload="C:\\Users\\NHNEnt\\Desktop\\authTest.jpg";
	$path="@\"C:\Users\NHNEnt\Desktop\authTest.JPG\";type=image"."/"."jpeg;filename=\"authTest.JPG\"";
	$requestBody=array(
			"attachFile"=>$path
	);
	
	//prepare REST API call
	$ch=curl_init($url.$appKeys.$type);
	
	//put header with the REST API
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);
	
	//call REST API and get response
	$res = curl_exec($ch);
	
	//print result
	$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($res, 0, $header_size);
    $body = substr($res, $header_size);    
 
    $body_json = json_decode($body, true);
    print_r($body_json);
	echo('<br/>');
	print_r(json_encode($requestBody));
	//close connection
	curl_close($ch);
?>