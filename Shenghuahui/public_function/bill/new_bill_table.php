<?php
	function new_bill_table() {

		//connect to MySQL
		$mysql_server_name = "localhost"; //数据库服务器名称
		$mysql_username = "root"; // 连接数据库用户名
		$mysql_password = "xyz2014"; // 连接数据库密码
		$mysql_database = "PhoneSet"; // 数据库的名字
		
		$db = mysql_connect($mysql_server_name, $mysql_username,
		                    $mysql_password);
		if (!$db) {
	 		die('Could not connect: ' . mysql_error());
	 	}

		//echo 'PhoneSet database successfulingly connected!<br>';
		mysql_query("SET NAMES UTF8");

		//create the main database if it doesn't already exist
		$query = "CREATE DATABASE IF NOT EXISTS PhoneSet
					CHARACTER SET 'utf8'
					COLLATE 'utf8_general_ci'";
		mysql_query($query, $db) or die(mysql_error($db));

		//make sure our recently created database is the active one
		mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

		//create the bill table
		$query = 'CREATE TABLE Bill (
			号码		CHAR(11)	PRIMARY KEY,
			套餐名	CHAR(10),		
			通话		INT,
			流量		FLOAT,
			短信		INT
		) ENGINE=InnoDB DEFAULT CHARSET=utf8';
		mysql_query($query, $db) or die (mysql_error($db));
	}
?>
