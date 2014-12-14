<?php
	require_once ('class_bill.php');

	function bill_query_phonenumber($phonenumber) {

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

		$query = "SELECT * FROM Bill WHERE 号码 = '".$phonenumber."';";
		$result = mysql_query($query);
		$i = 0;
		$bill[] = new BillAnalysis(); 
		while($row = mysql_fetch_array($result)){
			$bill[$i] = new BillAnalysis();
			$bill[$i]->phonenumber = (string)$row['号码'];
			$bill[$i]->pkgname = (string)$row['套餐名'];		
			$bill[$i]->call = (int)$row['通话'];		
			$bill[$i]->data =(float)$row['流量'];	
			$bill[$i]->text =(int)$row['短信'];			
			/*var_dump($bill[$i]);
			echo "<br />";*/
			$i = $i + 1;
		}
		return $bill[0];
	}

	function bill_query_all() {

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

		$query = "SELECT * FROM Bill;";
		$result = mysql_query($query);
		$i = 0;
		$bill[] = new BillAnalysis(); 
		while($row = mysql_fetch_array($result)){
			$bill[$i] = new BillAnalysis();
			$bill[$i]->phonenumber = (string)$row['号码'];
			$bill[$i]->pkgname = (string)$row['套餐名'];		
			$bill[$i]->call = (int)$row['通话'];		
			$bill[$i]->data =(float)$row['流量'];	
			$bill[$i]->text =(int)$row['短信'];			
			/*var_dump($bill[$i]);
			echo "<br />";*/
			$i = $i + 1;
		}
		return $bill;
	}
?>

