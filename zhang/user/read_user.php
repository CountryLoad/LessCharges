<?php
	require_once ('class_user.php');

	function user_query_username($username) {

		//connect to MySQL
		$mysql_server_name = "localhost"; //数据库服务器名称
		$mysql_username = "root"; // 连接数据库用户名
		$mysql_password = "xyz2014"; // 连接数据库密码
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

		$query = "SELECT * FROM user WHERE 
用户名 = '".$username."'";
		$result = mysql_query($query);
		$i = 0;
		$user[] = new User(); 
		while($row = mysql_fetch_array($result)){
			$user[$i] = new User();
			$user[$i]->username = (string)$row['用户名'];
			$user[$i]->phonenumber = (string)$row['号码'];		
			$user[$i]->password = (string)$row['密码'];		
			$user[$i]->carrier = (string)$row['运营商'];			
			$user[$i]->email = (string)$row['邮箱'];			
			$user[$i]->current_pkg = (string)$row['当前套餐'];			
			$user[$i]->rec_pkg = (string)$row['推荐套餐'];			
			$user[$i]->sign_date =(string)$row['注册日期'];			
			//var_dump($user[$i]);
			//echo "<br />";
			$i = $i + 1;
		}
		return $user[0];
	}	



	function user_query_phonenumber($phonenumber) {

		//connect to MySQL
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

		$query = "SELECT * FROM user WHERE 号码 = '".$phonenumber."'";
		$result = mysql_query($query);
		$i = 0;
		$user[] = new User(); 
		while($row = mysql_fetch_array($result)){
			$user[$i] = new User();
			$user[$i]->username = (string)$row['用户名'];
			$user[$i]->phonenumber = (string)$row['号码'];		
			$user[$i]->password = (string)$row['密码'];		
			$user[$i]->carrier =(string)$row['运营商'];			
			$user[$i]->email =(string)$row['邮箱'];			
			$user[$i]->current_pkg =(string)$row['当前套餐'];			
			$user[$i]->rec_pkg =(string)$row['推荐套餐'];			
			$user[$i]->sign_date =(string)$row['注册日期'];			
			/*var_dump($user[$i]);
			echo "<br />";*/
			$i = $i + 1;
		}
		return $user[0];
	}

	function user_query_all() {

		//connect to MySQL
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

		$query = "SELECT * FROM user;";
		$result = mysql_query($query);
		$i = 0;
		$user[] = new User(); 
		while($row = mysql_fetch_array($result)){
			$user[$i] = new User();
			$user[$i]->username = (string)$row['用户名'];
			$user[$i]->phonenumber = (string)$row['号码'];		
			$user[$i]->password = (string)$row['密码'];		
			$user[$i]->carrier =(string)$row['运营商'];			
			$user[$i]->email =(string)$row['邮箱'];			
			$user[$i]->current_pkg =(string)$row['当前套餐'];			
			$user[$i]->rec_pkg =(string)$row['推荐套餐'];			
			$user[$i]->sign_date =(string)$row['注册日期'];			
			/*var_dump($user[$i]);
			echo "<br />";*/
			$i = $i + 1;
		}
		return $user;
	}
?>

