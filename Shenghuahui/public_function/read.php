<?php
	//require ('pkg_class.php');
	function read_db($type1, $type2){
		//connect to MySQL

		echo 'Trying to connect to PhoneSet!<br>';
		$mysql_server_name = "localhost"; //数据库服务器名称
		$mysql_username = "root"; // 连接数据库用户名
		$mysql_password = "20081010"; // 连接数据库密码
		$mysql_database = "TEST"; // 数据库的名字
		
		$db = mysql_connect($mysql_server_name, $mysql_username,
							$mysql_password);
		if (!$db){
			die('Could not connect: ' . mysql_error());
		}

		echo 'Test database successfulingly connected!<br>';
		mysql_query("SET NAMES UTF8");

		//make sure you're using the correct database
		mysql_select_db('TEST', $db) or die(mysql_error($db));

		if ($type1 == "3G"){
			$query = "SELECT * FROM 3G套餐 WHERE Type2 = '".$type2."'";
		}
		if ($type1 == "4G"){
			$query = "SELECT * FROM 4G全国套餐 WHERE Type2 = '".$type2."'";
		}
		$result = mysql_query($query);
		$i = 0;
		$pkg[] = new Pkg(); 
		while($row = mysql_fetch_array($result)){
			$pkg[$i] = new Pkg();
			$pkg[$i]->id = $row['ID'];
			$pkg[$i]->type1 = $row['Type1'];		
			$pkg[$i]->type2 = $row['Type2'];		
			$pkg[$i]->cost =intval($row[资费]);			
			$pkg[$i]->pkg_call = (int)$row[内国内语音];	
			$pkg[$i]->pkg_data = (int)$row[套餐内流量]; 	
			$pkg[$i]->pkg_text = (int)$row[套餐内短信];
			$pkg[$i]->over_call = (float)$row[外国内语音];	
			$pkg[$i]->over_data = (float)$row[外流量];	
			$pkg[$i]->over_text = (float)$row[外短信];	
			$pkg[$i]->extra = (int)$row[额外信息]; 
			//var_dump($pkg[$i]);
			//echo "<br />";
			$i = $i + 1;
		}
		return $pkg;
		
		//echo 'Data read successfully!<br>';
	}
?>

