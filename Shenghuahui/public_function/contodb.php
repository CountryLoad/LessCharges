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
	$query = 'CREATE TABLE phoneset (
		id				INT				NOT NULL,
		name			CHAR(15),		
		operator		CHAR(3)			NOT NULL,
		duration		INT				NOT NULL DEFAULT 0,
		fee				FLOAT			NOT NULL DEFAULT 0,
		flow			INT				NOT NULL DEFAULT 0,
		sms				INT				NOT NULL DEFAULT 0,
		localcall		FLOAT			NOT NULL DEFAULT 0,
		longdiscall		FLOAT			NOT NULL DEFAULT 0,
		flowcharge 		FLOAT			NOT NULL DEFAULT 0,
		smscharge		FLOAT			NOT NULL DEFAULT 0
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8';
	mysql_query($query, $db) or die (mysql_error($db));


echo 'PhoneSet database successfully created!';
?>
