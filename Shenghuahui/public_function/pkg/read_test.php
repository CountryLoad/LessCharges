<?php
	echo 'hahe';
	require_once ("read_pkg.php");
	require_once ("delete_pkg.php");
	mysql_query("SET NAMES UTF8");
  	/*$com = new Composition();
	$com = com_query_tablename('hehe', 1000);
	var_dump($com);*/
	$pkg = new Pkg(); 
	$pkg = pkg_query_tablename('haha');
	var_dump($pkg);
	/*delete_pkg("hehe");
	delete_pkg("haha");*/
	echo 'hahe';
?>
