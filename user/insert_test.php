<?php
  require("insert.php");
	echo 'haha';
	mysql_query("SET NAMES UTF8");
	$user = new User("小张", "13515924846", "123456");
	$user->display();
    //var_dump($user);
	add_user($user);
	echo 'hehe';
?>
