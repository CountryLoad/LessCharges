<?php
	require ('class_feedback.php');
	function add_feedback($feedback) {
		//connect to MySQL
		//echo 'Trying to connect to PhoneSet!<br>';
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

		//var_dump($feedback);
		$username = $feedback->username;		
		$phonenumber = $feedback->phonenumber;	 
		$feed_info = $feedback->feed_info;	
	    $feed_time = $feedback->feed_time;	
		$sql="INSERT INTO feedback (用户名, 号码, 内容, 反馈时间)
		VALUES
		('".$username."', '".$phonenumber."', '".$feed_info."', '".$feed_time."');";
		if(!mysql_query($sql,$db)) {
		 	 die('Error: ' . mysql_error());
	 	 }
		//echo "1 record added";
	}
?>
