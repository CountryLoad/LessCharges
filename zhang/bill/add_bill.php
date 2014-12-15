<?php
	require_once ('class_bill.php');
	function add_bill($bill) {

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

		//var_dump($bill);
		foreach($bill as $element) { 
			$phonenumber = $element->phonenumber;		
			$pkgname = $element->pkgname;	 
			$call = $element->call;	
			$data = $element->data;	
			$text = $element->text;
			$sql="REPLACE INTO Bill (号码, 套餐名, 通话, 流量, 短信)
				  VALUES
				  ('".$phonenumber."', '".$pkgname."', '".$call."', '".$data."', '".$text."');";
				//ON DUPLICATE KEY UPDATE 套餐名= 通话 流量 短信
			if(!mysql_query($sql,$db)) {
		 		 die('Error: ' . mysql_error());
	 	 	}
		}
	}
?>
