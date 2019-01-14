<?php
	function get6DigitNumber(){
		$t=time()%1000000;
		$t=$t%1000000;
		$certNumLength=6;
		$range=pow(10, $certNumLength);
		$trim=pow(10, $certNumLength-1);
		$result=rand(0, (int)$t)+$trim;
		if ($result>$range){
			$result=$result-$trim;
		}
		return $result;
	}

	//url, appKeys, requestId, and type for calling REST API
	$url="https://api-sms.cloud.toast.com/sms/v2.1";
	$appKeys="/appKeys/EGAHwbWtW692uzLs";
	$type="/sender/auth/sms";
	
	//setting a header
	$headers=array(
		'Content-Type: application/json;charset=UTF-8'
	);
	
	//making a requestBody
	$requestBody=array(
			"body"=>"Authorization Code is:[".get6DigitNumber()."]",
			"sendNo"=>"01041002071",
			"senderGroupingKey"=>"SenderGroupingKey",
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