<?php
// 	require_once("../../public_class/class_pkg.php");

	function pkg_query_tablename($table_name) {
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

		mysql_query("SET NAMES UTF8");

		//make sure you're using the correct database
		mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

		$query = "SELECT * FROM ".$table_name.";";
		$result = mysql_query($query);
		$i = 0;
		$pkg[] = new  Pkg(); 
		while($row = mysql_fetch_array($result)){
			$pkg[$i] = new Pkg();
			$pkg[$i]->id = $row['ID'];
			$pkg[$i]->type1 = $row['type1'];		
			$pkg[$i]->type2 = $row['type2'];		
			$pkg[$i]->cost =(int)$row['月费'];			
			$pkg[$i]->pkg_call = (int)$row['套餐含本地通话'];	
			$pkg[$i]->pkg_lcall = (int)$row['套餐含全国通话'];
			$pkg[$i]->pkg_data = (int)$row['套餐含流量']; 	
			$pkg[$i]->pkg_text = (int)$row['套餐含短信'];
			$pkg[$i]->over_call = (float)$row['套餐外本地通话'];	
			$pkg[$i]->over_lcall = (float)$row['套餐外全国通话'];	
			$pkg[$i]->over_data = (float)$row['套餐外流量'];	
			$pkg[$i]->over_text = (float)$row['套餐外短信'];	
			$pkg[$i]->extra = (int)$row['其他']; 
			$pkg[$i]->full_cost = (float)$row['费用'];				
			//var_dump($pkg[$i]);
			//echo "<br />";
			$i = $i + 1;
		}
		return $pkg;
	}	


	function com_query_tablename($tablename, $cdt) {

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

		mysql_query("SET NAMES UTF8");

		//make sure you're using the correct database
		mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

		$query = "SELECT * FROM ".$tablename." WHERE ".$cdt."<upper AND ".$cdt.">=lower;";
		$result = mysql_query($query);
		$i = 0;
		$com[] = new  Composition(); 
		while($row = mysql_fetch_array($result)){
			$com[$i] = new  Composition();
			$com[$i]->type = (string)$row['type'];
			$com[$i]->price = (int)$row['price'];		
			$com[$i]->volume = (int)$row['volume'];		
			$com[$i]->over_cost = (float)$row['over_cost'];			
			$com[$i]->lower = (int)$row['lower'];			
			$com[$i]->upper = (int)$row['upper'];			
			$com[$i]->full_cost = (float)$row['full_cost'];						
			//var_dump($com[$i]);
			//echo "<br />";
			$i = $i + 1;
		}
		return $com[0];
	}	

	function com_query_all($tablename) {

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

		mysql_query("SET NAMES UTF8");

		//make sure you're using the correct database
		mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

		$query = "SELECT * FROM ".$tablename.";";
		$result = mysql_query($query);
		$i = 0;
		$com[] = new  Composition(); 
		while($row = mysql_fetch_array($result)){
			$com[$i] = new  Composition();
			$com[$i]->type = (string)$row['type'];
			$com[$i]->price = (int)$row['price'];		
			$com[$i]->volume = (int)$row['volume'];		
			$com[$i]->over_cost = (float)$row['over_cost'];			
			$com[$i]->lower = (int)$row['lower'];			
			$com[$i]->upper = (int)$row['upper'];			
			$com[$i]->full_cost = (float)$row['full_cost'];						
			//var_dump($com[$i]);
			//echo "<br />";
			$i = $i + 1;
		}
		return $com;
	}	
?>

