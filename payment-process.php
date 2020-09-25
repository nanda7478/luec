<?php
   /*
   Template Name: Payment Process
   */
$package = $_POST['package'];
$user_id = $package['email'];


 

if(is_array($package) && $user_id <> ""){  
// Set sandbox (test mode) to true/false.
	$option = $package['paymentoption'];
	if($option == "card"){
		payWithCard($package, $user_id );
	}elseif ($option == "paypal") {
		payWithPaypal($package, $user_id );
	}
	
}

if($_REQUEST['request_type'] == "IPN"){
	$paypalURL = "https://www.sandbox.paypal.com/cgi-bin/webscr";
	verifyIPNRequest($paypalURL);
}

function verifyIPNRequest($paypalURL){
	 
	$package = $_REQUEST;
	$raw_post_data = file_get_contents('php://input'); 
	$raw_post_array = explode('&', $raw_post_data); 

	$myPost = array(); 
	foreach ($raw_post_array as $keyval) { 
	    $keyval = explode ('=', $keyval); 
	    if (count($keyval) == 2) 
	        $myPost[$keyval[0]] = urldecode($keyval[1]); 
	}

	// Read the post from PayPal system and add 'cmd' 
	$req = 'cmd=_notify-validate'; 
	if(function_exists('get_magic_quotes_gpc')) { 
	    $get_magic_quotes_exists = true; 
	} 

	foreach ($myPost as $key => $value) { 
	    if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
	        $value = urlencode(stripslashes($value)); 
	    } else { 
	        $value = urlencode($value); 
	    } 
	    $req .= "&$key=$value"; 
	} 

	/* 
	 * Post IPN data back to PayPal to validate the IPN data is genuine 
	 * Without this step anyone can fake IPN data 
	 */ 
	 
	$ch = curl_init($paypalURL); 
	if ($ch == FALSE) { 
	    return FALSE; 
	} 
	curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
	curl_setopt($ch, CURLOPT_POST, 1); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $req); 
	curl_setopt($ch, CURLOPT_SSLVERSION, 6); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); 
	curl_setopt($ch, CURLOPT_FORBID_REUSE, 1); 
	 
	// Set TCP timeout to 30 seconds 
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name')); 
	$res = curl_exec($ch); 


	$tokens = explode("\r\n\r\n", trim($res)); 
	$res = trim(end($tokens)); 
	if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0) { 
		$item_number    = $_POST['item_number']; 
	    $txn_id         = $_POST['txn_id']; 
	    $item_name 		= $_POST['item_name'];
	    $payment_gross     = $_POST['mc_gross']; 
	    $currency_code     = $_POST['mc_currency']; 
	    $payment_status = $_POST['payment_status']; 
	      
	      
	      $response = array('txn_id' => $txn_id, 
	      	'item_number' => $item_number, 
	      	'item_name' => $item_name,
	      	'amount' => $payment_gross, 
	      	'payment_status' => $payment_status);

	      	$data = array(
		 		'tnx_id' 			=> $txn_id,
		 		'tnx_status' 		=> "Success",
		 		'payment_status' 	=> $payment_status
	 		);
	       

		 	 
	 		$a = explode("-", $item_number);
	 		$lid = intval(end($a));
	 		if($lid > 0){
		 		paypalcourses_process_tnx("update", $data, $lid);

		 		sendEmailForCourse( $lid);
		 	}
		 	 
		 	//mail("tl1.ptiwebtech@gmail.com","IPN RESPONSE VERIFYED" .$lid.' '.$item_number,json_encode($_REQUEST));
	}

	 
}

function payWithPaypal($package,$user_id ){

	$data = array(
		'created_at' 	=> date("Y/m/d")." - ".date("h:i:sa"),
		'first_name' 	=>  $package['first_name'],
		'last_name' 	=>  $package['last_name'],
		'email'			=>  $package['email'],
		'phone' 		=>  $package['phone'],
		'address' 		=>  $address,
		'ip_address'	=> $_SERVER['REMOTE_ADDR'],
		'price' 		=> $package['amount'],
		'paid_via' 		=> 'PayPal',
		'payment_status'=> 'init',
		'tnx_status' 	=> 'init',
		'tnx_id' 		=> '',
		'package_name' 	=> $package['name']
	);

	 
	$lid = paypalcourses_process_tnx("init", $data);
		
	 $sandbox = false;	
	 
	 $paypal_id = $sandbox ?  "henideepak20-facilitator@gmail.com" : "levelupenglishcoaching.brown@gmail.com";

	 $sandbox_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr?';
	 $live_url 	  = 'https://www.paypal.com/cgi-bin/webscr?';
	 $return_url = site_url()."/thank-you";
	 $cancel_url = site_url()."/speak-better-english?option_type=cancel";

	 $request_info = 'business='.urldecode($paypal_id).'&cmd=_xclick&item_name='.urldecode($package['name']);
	 			$request_info .= '&item_number='.urldecode('PROD-'.$package['id'].'-'.$lid);
	 			$request_info .= '&amount='.urldecode($package['amount']);
	 			 
	 			$request_info .= '&currency_code='.urldecode("USD");
	 			$request_info .= '&return='.urldecode($return_url);
	 			$request_info .= '&cancel_return='.urldecode($cancel_url);
	  
	header('Location: '.$live_url.$request_info); 	
	//header('Location: http://myhost.com/mypage.php');	
	// echo "<pre>";	
	// echo $request_info;
	die();
}


function payWithCard($package,$user_id ){

	$address = $package['street']." ".$package['city']. " ".$package['state']." ".$package['country_code']. ' '.$package['zip'];

	$data = array(
		'created_at' 	=> date("Y/m/d")." - ".date("h:i:sa"),
		'first_name' 	=>  $package['first_name'],
		'last_name' 	=>  $package['last_name'],
		'email'			=>  $package['email'],
		'phone' 		=>  $package['phone'],
		'address' 		=>  $address,
		'ip_address'	=> $_SERVER['REMOTE_ADDR'],
		'price' 		=> $package['amount'],
		'paid_via' 		=> 'card',
		'payment_status'=> 'init',
		'tnx_status' 	=> 'init',
		'tnx_id' 		=> '',
		'package_name' 	=> $package['name']
	);

	 
	$lid = paypalcourses_process_tnx("init", $data);


	$sandbox = false;
	// Set PayPal API version and credentials.
	$api_version = '85.0';
	$api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' 						: 'https://api-3t.paypal.com/nvp';
	$api_username = $sandbox ? 'henideepak20-facilitator@gmail.com' 					: 'levelupenglishcoaching.brown_api1.gmail.com';
	$api_password = $sandbox ? '2MEDU3BVBZMMPXEW' 												: 'AVNJ3PGKRP7DVNRE';
	$api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31AT19wDhuUMb8kvC58CZyD7u9lIA-' 	: 'Av5U8ZLIxJP9H48UeOJBNfiQVhgoAV7hTZpVxoEQLP3b-rQil-hSgEmS';

	$request_params = array
        (
        'METHOD' => 'DoDirectPayment', 
        'USER' => $api_username, 
        'PWD' => $api_password, 
        'SIGNATURE' => $api_signature, 
        'VERSION' => $api_version, 
        'PAYMENTACTION' => 'Sale',                   
        'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
        'CREDITCARDTYPE' => $package['card_type'], 
        'ACCT' => $package['card_number'],                        
        'EXPDATE' => $package['expiry_date']['month'].''.$package['expiry_date']['year'],           
        'CVV2' => $package['cvv2'], 
        'AMT' => $package['amount'], 
        'OrderTotal' => $package['amount'],
        'CURRENCYCODE' => 'USD', 
        'payer_id' => $user_id,
        'product_id' => $package['id'],

        'FIRSTNAME' => $package['first_name'], 
        'LASTNAME' => $package['last_name'], 
        'STREET' => $package['street'], 
        'CITY' => $package['city'], 
        'STATE' => $package['state'],                     
        'COUNTRYCODE' => $package['country_code'], 
        'ZIP' => $package['zip'], 
        'DESC' => substr('Payments for '.$package['name'], 0,125)
        );

        $nvp_string = '';
		foreach($request_params as $var=>$val)
		{
		    $nvp_string .= '&'.$var.'='.urlencode($val);    
		}

		$curl = curl_init();
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($curl, CURLOPT_URL, $api_endpoint);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);
 
		$result = curl_exec($curl);     
		curl_close($curl);
		//print_r($request_params);
		//print_r($result);
 
	 $response = parseResponse($result);
	 if($response['ACK'] == "Success" || $response['ACK'] == "SuccessWithWarning"){
	 	$data = array(
	 		'tnx_id' 			=> $response['TRANSACTIONID'],
	 		'tnx_status' 		=> 'Success',
	 		'payment_status' 	=> 'Success'
	 	);
	 	if($lid > 0){
	 		paypalcourses_process_tnx("update", $data, $lid);
	 		sendEmailForCourse( $lid);
	 	}
	 	wp_redirect( site_url()."/thank-you" );
	 	exit();
	 }else{
	 	$data = array(
	 		'tnx_id' 			=> $response['TRANSACTIONID'],
	 		'tnx_status' 		=> $response['ACK'],
	 		'payment_status' 	=> $response['L_ERRORCODE0']
	 	);
	 	if($lid > 0){
	 		$lid = paypalcourses_process_tnx("update", $data, $lid);
		}
	 		wp_redirect( site_url()."/payment?error=true&tid=".$lid."&msg=".$response['L_LONGMESSAGE0'] );
	 	//print_r($response);
	 	exit();
	 }
	 
	 //$data = array();
	// $lid = paypalcourses_process_tnx("update", $data);
} 


function dbEntry($package, $response,$type){

}



function parseResponse($resp){
		$resp = urldecode($resp);
		$a = explode("&", $resp);
		 
		$e = [];
		foreach($a as $key => $val){
			 
			$b = explode("=", $val);

			if(is_array($b)){
				$d = array($b[0] => $b[1]);
				$e = array_merge($e,$d);
			}
		}
		//print_r($e);
		return $e;
}

die();

 get_header();
?>
	

 <?php get_footer(); ?>