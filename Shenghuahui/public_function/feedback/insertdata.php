<?php
    //connect to MySQL
	echo 'Trying to connect to PhoneSet!<br>';
    $mysql_server_name = "localhost"; //数据库服务器名称
    $mysql_username = "root"; // 连接数据库用户名
    $mysql_password = "root"; // 连接数据库密码
    $mysql_database = "PhoneSet"; // 数据库的名字
    
	$db = mysql_connect($mysql_server_name, $mysql_username,
                        $mysql_password);
	if (!$db)
 	{
 		die('Could not connect: ' . mysql_error());
 	}

	echo 'PhoneSet database successfulingly connected!<br>';
	mysql_query("SET NAMES UTF8");

	//make sure you're using the correct database
	mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

	// insert data into the phoneset
	$query = 'INSERT INTO feedback
		    (id, content, date)
		VALUES 
		    (1, "不错哦！", 20141028);';
	mysql_query($query, $db) or die(mysql_error($db));
	echo 'Data inserted successfully!<br>';
?>
