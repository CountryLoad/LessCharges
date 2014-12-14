<?php

	require_once("new_pkg_table.php");
  	require_once("add_pkg.php");
	echo 'haha';
	//new_com_table("hehe");
	//new_pkg_table("haha");
	mysql_query("SET NAMES UTF8");


	$com1 = new Composition("D", 15.0, 500, 0.0003);
	$com2 = new Composition("M", 15.0, 500, 0.0003);
	$com = new Composition();	
	$com = array($com1, $com2);
	add_com($com, "hehe");



	$pkg1 = new Pkg();
	$pkg2 = new Pkg();
	$pkg = new Pkg();	
	$pkg1->init_all("1", "a", "B", 2);
	$pkg2->init_all("2", "C", "D", 3);
	$pkg = array($pkg1, $pkg2);
	add_pkg($pkg, "haha");	


?>
