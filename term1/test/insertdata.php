<?php
    //connect to MySQL
	echo 'Trying to connect to PhoneSet!<br>';
    $mysql_server_name = "localhost"; //数据库服务器名称
    $mysql_username = "root"; // 连接数据库用户名
    $mysql_password = "20081010"; // 连接数据库密码
    $mysql_database = "PhoneSet"; // 数据库的名字
    
	$db = mysql_connect($mysql_server_name, $mysql_username,
                        $mysql_password);
	if (!$db)
 	{
 		die('Could not connect: ' . mysql_error());
 	}

	echo 'PhoneSet database successfulingly connected!<br>';

	//make sure you're using the correct database
	mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

	// insert data into the phoneset
	$query = 'INSERT INTO phoneset
		    (id, name, operator, duration, fee, flow, sms, localcall, longdiscall, flowcharge, smscharge)
		VALUES 
		    (1, "10元套餐", "联通", 0, 10, 100, 0, 0.15, 0.3, 0.0001, 0.1),
			(2, "20元套餐", "联通", 0, 20, 440, 0, 0.15, 0.3, 0.0003, 0.1),
			(3, "56元套餐", "联通", 200, 56, 1000, 0, 0.15, 0.15, 0.0001, 0.1),
			(4, "46元套餐", "联通", 100, 46, 840, 0, 0.15, 0.2, 0.0002, 0.1),
			(5, "30元套餐", "联通", 0, 30, 500, 0, 0.15, 0.3, 0.0001, 0.1),
			(6, "96元A套餐", "联通", 240, 96, 300, 0, 0.15, 0.3, 0.0003, 0.1),
			(7, "96元B套餐", "联通", 450, 96, 80, 0, 0.15, 0.3, 0.0003, 0.1),
			(8, "96元A套餐", "联通", 550, 96, 80, 0, 0.15, 0.3, 0.0003, 0.1),
			(9, "66元套餐", "联通", 50, 66, 300, 240, 0.20, 0.20, 0.0003, 0.1),
			(10, "46元套餐", "联通", 50, 46, 150, 0, 0.25, 0.25, 0.0003, 0.1);';
	mysql_query($query, $db) or die(mysql_error($db));
	echo 'Data inserted successfully!<br>';
?>
