<?php
	//connect to MySQL
	echo 'Trying to connect to PhoneSet!<br>';
    $mysql_server_name = "localhost"; //数据库服务器名称
    $mysql_username = "root"; // 连接数据库用户名
    $mysql_password = "20081010"; // 连接数据库密码
    $mysql_database = "PhoneSet"; // 数据库的名字
    
	$db = mysql_connect($mysql_server_name, $mysql_username,
                        $mysql_password);
	if (!$db) {
 		die('Could not connect: ' . mysql_error());
 	}

	echo 'PhoneSet database successfulingly connected!<br>';

	//make sure our recently created database is the active one
	mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

	// select the date
	$query = 'SELECT * FROM phoneset';
	$result = mysql_query($query, $db) or die(mysql_error($db));

	// show the results
	echo '<table border="5">';
	while ($row = mysql_fetch_assoc($result)) {
		echo '<tr>';
		foreach ($row as $value) {
		    echo '<td>' . $value . '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
?>
