<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta charset="utf-8">
<meta name="keywords" content="话费套餐, 手机话费, 推荐套餐" />

</head>
<body>
<?php
  //$url='img_web.html';
  //$info=file_get_content($url);
  //preg_match('|<title>(.*?)<\/title>|i',$info,$m);
  //echo 'hello' ;
  $url='http://api.k780.com:88/?app=phone.get&phone=18662061325&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json';
	$ch=curl_init();
  	$timeout=5;
  	curl_setopt($ch,CURLOPT_URL,$url);
 	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  	curl_setopt($ch,CURLOPT_CONNECTIMEOUT,$timeout);
  	$lines_string=curl_exec($ch);
 	curl_close($ch);
  
  //$obj =json_decode($lines_string);
  $jsondata =(json_decode($lines_string,true));
  //echo $jsondata['result']['att'];
  //echo htmlspecialchars($lines_string);
  //echo $jsondata['result']['att'];
  var_dump($jsondata);
?>
</body>
</html>
