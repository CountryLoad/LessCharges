<?php
function phoneinfo($phonenumber) {
	$url1 = 'http://api.k780.com:88/?app=phone.get&phone=';
	$url2 = '&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json';
	$url = $url1 . $phonenumber . $url2;
	$ch = curl_init ();
	$timeout = 5;
	curl_setopt ( $ch, CURLOPT_URL, $url );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $ch, CURLOPT_CONNECTIMEOUT, $timeout );
	$lines_string = curl_exec ( $ch );
	curl_close ( $ch );
	$jsondata = (json_decode ( $lines_string, true ));
// 	var_dump($jsondata);
	// echo '尊敬的中国'.$jsondata['result']['operators'].$phonenumber
	// .'用户'.'</br>';
	// echo '您来自: '.$jsondata['result']['style_citynm'].'</br>';
	// echo '您的卡类型为: '.$jsondata['result']['ctype'].'</br>';
	// if not harbin return 0 ; else return 1
	$flag = '是';
	if ($jsondata ['result'] ['area'] == '0451') {
		$flag = '是';
	} else {
		$flag = '否';
	}
	$phone_info [0] = $jsondata ['result'] ['operators'];
	$phone_info [1] = $jsondata ['result'] ['att'];
	$phone_info [2] = $flag;
	return $phone_info;
}

?>
