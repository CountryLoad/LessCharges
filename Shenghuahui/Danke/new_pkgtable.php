<?php
	//function new_pkgtable() {

		//connect to MySQL
		$mysql_server_name = "localhost"; //���ݿ����������
		$mysql_username = "root"; // �������ݿ��û���
		$mysql_password = "xyz2014"; // �������ݿ�����
		$mysql_database = "PhoneSet"; // ���ݿ������
		
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
		$query = 'CREATE TABLE pkg (
			value  	CHAR(25)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8';
		mysql_query($query, $db) or die (mysql_error($db));
	//}
?>



		


