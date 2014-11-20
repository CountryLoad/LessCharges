<?php
    //connect to MySQL
    require ('pkg_class.php');
	function insrt_db($pkg){
		
		echo 'Trying to connect to database!<br>';
		$mysql_server_name = "localhost"; //数据库服务器名称
		$mysql_username = "root"; // 连接数据库用户名
		$mysql_password = "root"; // 连接数据库密码
		$mysql_database = "TEST"; // 数据库的名字
		
		$db = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);

		if (!$db){
			die('Could not connect: ' . mysql_error());
		}

		echo ' database successfulingly connected!<br>';
		mysql_query("SET NAMES UTF8");

		//make sure you're using the correct database
		mysql_select_db('TEST', $db) or die(mysql_error($db));
    var_dump($pkg);
		// insert data into the phoneset
		foreach($pkg as $element) { 
			$id = $element->id;
			$type1 = $element->type1;
			$type2 = $element->type2;
			$cost = $element->cost;
			$pkg_call = $element->pkg_call;
			$pkg_data = $element->pkg_data;
			$pkg_text = $element->pkg_text;
			$over_call = $element->over_call;
			$over_data = $element->over_data;
			$over_text = $element->over_text;
			$extra = $element->extra;
    var_dump($element);
			if ($type1 == "3G") {
				$query = "INSERT INTO 3G套餐
		    		(ID, Type1, Type2, 资费, 内国内语音, 套餐内流量, 套餐内短信, 外国内语音, 外本地通话, 外流量, 外短信, 额外信息)
					VALUES 
		   			('".$id."', '".$type1."', '".$type2."', $cost, $pkg_call, $pkg_data, $pkg_text, $over_call, $over_call, $over_data, $over_text, $extra);";
				mysql_query($query, $db) or die(mysql_error($db));
		} elseif ($type1 == "4G") {
				$query = "INSERT INTO 4G全国套餐
		    		(ID, Type1, Type2, 资费, 内国内语音, 套餐内流量, 套餐内短信, 外国内语音, 外本地通话, 外流量, 外短信, 额外信息)
						VALUES 
					 ('".$id."', '".$type1."', '".$type2."', $cost, $pkg_call, $pkg_data, $pkg_text, $over_call, $over_call, $over_data, $over_text, $extra);";
				mysql_query($query, $db) or die(mysql_error($db));
			}
		}
		echo 'Data inserted successfully!<br>';
	}
?>



