<?php
	require_once ('class_feedback.php');

	function add_feedback($feedback) {

		//connect to MySQL
		$mysql_server_name = "localhost"; //数据库服务器名称
		$mysql_username = "root"; // 连接数据库用户名
		$mysql_password = "xyz2014"; // 连接数据库密码
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
		foreach($feedback as $element) { 
			$username = $element->username;		
			$phonenumber = $element->phonenumber;	 
			$feed_info = $element->feed_info;	
			$feed_time = $element->feed_time;	
			$sql="INSERT INTO feedback (用户名, 号码, 内容, 反馈时间)
		VALUES
		('".$username."', '".$phonenumber."', '".$feed_info."', '".$feed_time."');";
			if(!mysql_query($sql,$db)) {
		 	 	die('Error: ' . mysql_error());
	 	 	}
		}
	}
?>
