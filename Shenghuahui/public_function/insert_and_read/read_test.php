<?php
  	//require("pkg_class.php");
	require("read.php");
	echo 'hehe';
  	$pkg_3g = new Pkg();
	$pkg_3g = read_db('3G', 'A');
	var_dump($pkg_3g);
	$pkg_3g = read_db('4G', '10');
	var_dump($pkg_3g);
?>
