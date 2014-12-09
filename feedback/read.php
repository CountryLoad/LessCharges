<?php
	require ('class_feedback.php');
	function query_feed_time($time) {

		//connect to MySQL
		//echo 'Trying to connect to PhoneSet!<br>';
		$mysql_server_name = "localhost"; //数据库服务器名称
		$mysql_username = "root"; // 连接数据库用户名
		$mysql_password = "root"; // 连接数据库密码
		$mysql_database = "PhoneSet"; // 数据库的名字
		
		$db = mysql_connect($mysql_server_name, $mysql_username,
							$mysql_password);
		if (!$db){
			die('Could not connect: ' . mysql_error());
		}

		echo 'PhoneSet database successfulingly connected!<br>';
		mysql_query("SET NAMES UTF8");

		//make sure you're using the correct database
		mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

		$query = "SELECT * FROM feedback WHERE 反馈时间 = '".$time."'";
		$result = mysql_query($query);
		$i = 0;
		$feedback[] = new Feedback(); 
		while($row = mysql_fetch_array($result)){
			$feedback[$i] = new Feedback();
			$feedback[$i]->username = (string)$row['用户名'];
			$feedback[$i]->phonenumber = (string)$row['号码'];		
			$feedback[$i]->feed_info = (string)$row['内容'];		
			$feedback[$i]->feed_time =(string)$row['反馈时间'];			
			var_dump($feedback[$i]);
			echo "<br />";
			$i = $i + 1;
		}
		return $feedback;
		//echo 'Data read successfully!<br>';
	}	



	function query_phonenumber($phonenumber) {

		//connect to MySQL
		//echo 'Trying to connect to PhoneSet!<br>';
		$mysql_server_name = "localhost"; //数据库服务器名称
		$mysql_username = "root"; // 连接数据库用户名
		$mysql_password = "root"; // 连接数据库密码
		$mysql_database = "PhoneSet"; // 数据库的名字
		
		$db = mysql_connect($mysql_server_name, $mysql_username,
							$mysql_password);
		if (!$db){
			die('Could not connect: ' . mysql_error());
		}

		//echo 'PhoneSet database successfulingly connected!<br>';
		mysql_query("SET NAMES UTF8");

		//make sure you're using the correct database
		mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

		$query = "SELECT * FROM feedback WHERE 号码 = '".$phonenumber."'";
		$result = mysql_query($query);
		$i = 0;
		$feedback[] = new Feedback(); 
		while($row = mysql_fetch_array($result)){
			$feedback[$i] = new Feedback();
			$feedback[$i]->username = (string)$row['用户名'];
			$feedback[$i]->phonenumber = (string)$row['号码'];		
			$feedback[$i]->feed_info = (string)$row['内容'];		
			$feedback[$i]->feed_time =(string)$row['反馈时间'];			
			var_dump($feedback[$i]);
			echo "<br />";
			$i = $i + 1;
		}
		return $feedback;
		//echo 'Data read successfully!<br>';
	}
?>

