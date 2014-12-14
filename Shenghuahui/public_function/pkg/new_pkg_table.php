<?php
	function new_pkg_table($table_name) {

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

		//create the phoneset table
		$query = "CREATE TABLE ".$table_name." (
			ID					CHAR(11),
			type1				CHAR(2),
			type2				CHAR(2),
			月费					INT,
			套餐含本地通话		INT,
			套餐含全国通话		INT,
			套餐含流量			INT,
			套餐含短信			INT,
			套餐外本地通话		FLOAT,
			套餐外全国通话		FLOAT,
			套餐外流量			FLOAT,
			套餐外短信			FLOAT,
			其他					INT,
			费用					FLOAT
		) ENGINE=InnoDB DEFAULT CHARSET=utf8";
		mysql_query($query, $db) or die (mysql_error($db));
	}


	function new_com_table($table_name) {

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

		
		//create table
		$query = "CREATE TABLE ".$table_name." (
			type			CHAR(2),
			price			INT,
			volume			INT,
			over_cost		FLOAT,
			upper			INT,
			lower			INT,
			full_cost		FLOAT
		) ENGINE=InnoDB DEFAULT CHARSET=utf8";
		mysql_query($query, $db) or die (mysql_error($db));
	}
?>
