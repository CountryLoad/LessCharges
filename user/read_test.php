<?php
	require("read.php");
	echo 'hehe';
	mysql_query("SET NAMES UTF8");
  	$user = new User();
	//$user = query_username('小张');
	//var_dump($user);
	$user = query_phonenumber('13515924846');
	var_dump($user);

?>
