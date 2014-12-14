<?php
  	function phoneinfo($phonenumber){
      	$url1='http://api.k780.com:88/?app=phone.get&phone=';
	$url2='&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json';
        $url=$url1.$phonenumber.$url2;
	$ch=curl_init();
  	$timeout=5;
  	curl_setopt($ch,CURLOPT_URL,$url);
 	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  	curl_setopt($ch,CURLOPT_CONNECTIMEOUT,$timeout);
  	$lines_string=curl_exec($ch);
 	curl_close($ch);
  	$jsondata =(json_decode($lines_string,true));
        var_dump($jsondata);
	echo '尊敬的中国'.$jsondata['result']['operators'].$phonenumber
.'用户'.'</br>';
	echo '您来自: '.$jsondata['result']['style_citynm'].'</br>';
	echo '运营商： '.$jsondata['result']['operators'].'</br>';
// 	echo '您的卡类型为: '.$jsondata['result']['ctype'].'</br>';
	// if not harbin return 0 ; else return 1 
        if($jsondata['result']['area']=='0451'){
          return 1;
        } else {
          return 0;
        }

  }
  $key=$_GET["name"];
  if($key.length<11){
  	echo 'PhoneNumber need to be 11 digits!';
  } else {
  	phoneinfo($key);
  }
  

?>
