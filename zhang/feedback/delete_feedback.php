<?php
	function delete_feedback() {

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
	
		//make sure our recently created database is the active one
		mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

		//delete data of fb table
		$query = 'DELETE FROM feedback;';
		mysql_query($query, $db) or die (mysql_error($db));
	}
?>