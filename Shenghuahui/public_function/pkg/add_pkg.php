<?php
	require_once("../../public_class/class_pkg.php");

	function add_pkg($pkg, $tablename){

		$mysql_server_name = "localhost"; //数据库服务器名称
		$mysql_username = "root"; // 连接数据库用户名
		$mysql_password = "xyz2014"; // 连接数据库密码
		$mysql_database = "PhoneSet"; // 数据库的名字
		
		$db = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);

		if (!$db){
			die('Could not connect: ' . mysql_error());
		}

		//echo ' database successfulingly connected!<br>';
		mysql_query("SET NAMES UTF8");

		//make sure you're using the correct database
		mysql_select_db('PhoneSet', $db) or die(mysql_error($db));
    	//var_dump($pkg);

		// insert data into the table
		foreach($pkg as $element) { 
			$id = $element->id;
			$type1 = $element->type1;
			$type2 = $element->type2;
			$cost = $element->cost;
			$pkg_call = $element->pkg_call;
			$pkg_lcall = $element->pkg_lcall;
			$pkg_data = $element->pkg_data;
			$pkg_text = $element->pkg_text;
			$over_call = $element->over_call;
			$over_lcall = $element->over_lcall;
			$over_data = $element->over_data;
			$over_text = $element->over_text;
			$extra = $element->extra;
			$full_cost = $element->full_cost;
			$query = "INSERT INTO ".$tablename." (ID, type1, type2, 月费, 套餐含本地通话, 套餐含全国通话, 套餐含流量, 套餐含短信, 套餐外本地通话, 套餐外全国通话, 套餐外流量, 套餐外短信, 其他, 费用)
					VALUES 
		   			('".$id."', '".$type1."', '".$type2."', $cost, $pkg_call, $pkg_lcall, $pkg_data, $pkg_text, $over_call, $over_lcall, $over_data, $over_text, $extra, $full_cost);";
			mysql_query($query, $db) or die (mysql_error($db));
		}
	}


	function add_com($com, $table_name) {

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

		//echo 'PhoneSet database successfulingly connected!<br>';
		mysql_query("SET NAMES UTF8");

		//make sure you're using the correct database
		mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

// 		var_dump($com);
		foreach($com as $element) {

			$type = $element->type;
			$price = $element->price;
			$volume = $element->volume;
			$over_cost = $element->over_cost;
			$upper = $element->upper;
			$lower = $element->lower;
			$full_cost = $element->full_cost;		
    		//var_dump($element);
			$sql="INSERT INTO ".$table_name." (type, price, volume, over_cost, upper, lower, full_cost)
			VALUES
			('".$type."', $price, $volume, $over_cost, $upper, $lower, $full_cost);";
			if(!mysql_query($sql,$db)) {
		 	 die('Error: ' . mysql_error());
	 	 	}
		}
	}
?>
