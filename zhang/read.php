<?php
    //connect to MySQL
	require ('pkg_class.php');
	echo 'Trying to connect to PhoneSet!<br>';
    $mysql_server_name = "localhost"; //数据库服务器名称
    $mysql_username = "root"; // 连接数据库用户名
    $mysql_password = "root"; // 连接数据库密码
    $mysql_database = "TEST"; // 数据库的名字
    
	$db = mysql_connect($mysql_server_name, $mysql_username,
                        $mysql_password);
	if (!$db)
 	{
 		die('Could not connect: ' . mysql_error());
 	}

	echo 'PhoneSet database successfulingly connected!<br>';
	mysql_query("SET NAMES UTF8");

	//make sure you're using the correct database
	mysql_select_db('TEST', $db) or die(mysql_error($db));

	$result = mysql_query("SELECT * FROM 3G套餐");
	$i = 0;
	$pkg[] = new Pkg(); 
	while($row = mysql_fetch_array($result))
  {
	$pkg[$i] = new Pkg();
	$pkg[$i]->id = $row['ID'];
	$pkg[$i]->type1 = $row['Type1'];		
	$pkg[$i]->type2 = $row['Type2'];		
	$pkg[$i]->cost = $row['资费'];			
	$pkg[$i]->pkg_call = $row['内国内语音'];	
	$pkg[$i]->pkg_data = $row['套餐内流量']; 	
	$pkg[$i]->pkg_text = $row['套餐内短信'];
	$pkg[$i]->over_call = $row['外国内语音'];	
	$pkg[$i]->over_data = $row['外流量'];	
	$pkg[$i]->over_text = $row['外短信'];	
	$pkg[$i]->extra = $row['额外信息']; 
 var_dump($pkg[$i]);
  echo "<br />";
	$i = $i + 1;
  }

	echo 'Data inserted successfully!<br>';
?>

