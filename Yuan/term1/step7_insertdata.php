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
	mysql_query("SET NAMES UTF8");
	//make sure you're using the correct database
	mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

	// insert data into the phoneset
	$query = 'INSERT INTO phoneset
		    (id, name, operators, duration, fee, flow, sms, localcall, longdiscall, flowcharge, smscharge)
		VALUES 
		    (1, "46元A套餐", "联通", 50, 46, 150, 0, 0.25, 0.25, 0.0003, 0.1),
			(2, "66元A套餐", "联通", 50, 66, 300, 240, 0.20, 0.20, 0.0003, 0.1),
			(3, "96元A套餐", "联通", 240, 96, 300, 0, 0.15, 0.15, 0.0003, 0.1),
			(4, "126元A套餐", "联通", 320, 126, 400, 0, 0.15, 0.15, 0.0003, 0.1),
			(5, "186元A套餐", "联通", 510, 186, 500, 0, 0.15, 0.15, 0.0003, 0.1),
			(6, "46元B套餐", "联通", 120, 46, 40, 0, 0.25, 0.25, 0.0003, 0.1),
			(7, "66元B套餐", "联通", 200, 66, 60, 0, 0.20, 0.20, 0.0003, 0.1),
			(8, "46元C套餐", "联通", 260, 46, 40, 0, 0.20, 0.20, 0.0003, 0.1),
			(9, "66元C套餐", "联通", 380, 66, 60, 240, 0.20, 0.20, 0.0003, 0.1),
			(10, "46元套餐", "联通", 50, 46, 150, 0, 0.25, 0.25, 0.0003, 0.1);';
	mysql_query($query, $db) or die(mysql_error($db));
	echo 'Data inserted successfully!<br>';
?>
