<?php
	require_once("read_user.php");
	echo 'hehe';
	mysql_query("SET NAMES UTF8");
  	$user = new User();
	$user = user_query_username('小张');
	var_dump($user);
	$user = user_query_phonenumber('18345197824');
	var_dump($user);
	$user = user_query_all();
	var_dump($user);
?>
