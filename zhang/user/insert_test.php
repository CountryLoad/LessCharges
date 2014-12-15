<?php
  	require_once("add_user.php");
	echo 'haha';
	mysql_query("SET NAMES UTF8");
	$user1 = new User("小张", "13515924846", "123456");
	$user2 = new User("小袁", "18345197824", "1324");
	$user = new User();
	$user = array($user1, $user2);
    var_dump($user);
	add_user($user);
	echo 'hehe';
?>
