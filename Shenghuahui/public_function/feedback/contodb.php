<?php
    //connect to MySQL
	echo 'Trying to connect to PhoneSet!<br>';
    $mysql_server_name = "localhost"; //数据库服务器名称
    $mysql_username = "root"; // 连接数据库用户名
    $mysql_password = "root"; // 连接数据库密码
    $mysql_database = "PhoneSet"; // 数据库的名字
    
	$db = mysql_connect($mysql_server_name, $mysql_username,
                        $mysql_password);
	if (!$db) {
 		die('Could not connect: ' . mysql_error());
 	}

	echo 'PhoneSet database successfulingly connected!<br>';
	mysql_query("SET NAMES UTF8");

	//create the main database if it doesn't already exist
	$query = "CREATE DATABASE IF NOT EXISTS PhoneSet
				CHARACTER SET 'utf8'
				COLLATE 'utf8_general_ci'";
	mysql_query($query, $db) or die(mysql_error($db));

	//make sure our recently created database is the active one
	mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

	//create the phoneset table
	$query = 'CREATE TABLE feedback (
		id				INT				PRIMARY KEY		AUTO_INCREMENT,
		content			CHAR(255),		
		time			CHAR(15)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
	mysql_query($query, $db) or die (mysql_error($db));


echo 'feedback table successfully created!';
?>
