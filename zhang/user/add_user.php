<?php
	require_once ('class_user.php');

	function add_user($user) {

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

		mysql_query("SET NAMES UTF8");

		//make sure you're using the correct database
		mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

		//var_dump($user);
		foreach($user as $element) { 
			$username = $element->username;
			$phonenumber = $element->phonenumber;
			$password = $element->password;
			$carrier = $element->carrier;
			$email = $element->email;
			$current_pkg = $element->current_pkg;
			$rec_pkg = $element->rec_pkg;
			$sign_date = $user->sign_date;		
			$sql="INSERT INTO user (用户名, 号码, 密码, 运营商, 邮箱, 当前套餐, 推荐套餐, 注册日期)
				VALUES
				('".$username."', '".$phonenumber."', '".$password."', '".$carrier."', '".$email."', '".$current_pkg."', '".$rec_pkg."', '".$sign_date."');";
			if(!mysql_query($sql,$db)) {
		 	 	die('Error: ' . mysql_error());
	 	 	}
		}
	}
?>