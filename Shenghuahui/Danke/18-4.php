+<?php
	$key=$_GET["key"];

	//connect to MySQL
	$mysql_server_name = "localhost"; //数据库服务器名称
	$mysql_username = "root"; // 连接数据库用户名
	$mysql_password = "xyz2014"; // 连接数据库密码
	$mysql_database = "PhoneSet"; // 数据库的名字

	$db = mysql_connect($mysql_server_name, $mysql_username,
		                    $mysql_password);
	if (!$db) {
	 	die('Could not connect: ' . mysql_error());
	 }

	mysql_query("SET NAMES UTF8");

	mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

	//$key = 'a';
	$sql="select value from pkg where value like '$key%';";
	$result = mysql_query($sql);

	if(mysql_num_rows($result)>0)
	{
	  header('Content-Type:text/XML;charset=UTF-8');
	  echo "<all>";
	  while($rows=mysql_fetch_array($result))
		{
		  echo "<v>".$rows[value]."</v>";
		}
		echo "</all>";
	}

?>
