<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta charset="utf-8">
<meta name="keywords" content="话费套餐, 手机话费, 推荐套餐" />

</head>
<body>
<?php
	//connect to MySQL
	echo 'Trying to connect to PhoneSet!<br>';
    $mysql_server_name = "localhost"; //数据库服务器名称
    $mysql_username = "root"; // 连接数据库用户名
    $mysql_password = "root"; // 连接数据库密码
    $mysql_database = "PhoneSet"; // 数据库的名字
    
	$db = mysql_connect($mysql_server_name, $mysql_username,
                        $mysql_password);
	if (!$db) {
 		die('Could not connect: ' . mysql_error());
 	}

	echo 'PhoneSet database successfulingly connected!<br>';
	mysql_query("SET NAMES UTF8");

	//make sure our recently created database is the active one
	mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

	// retrieve information
	$query = 'SELECT * FROM feedback';
	$result = mysql_query($query, $db) or die(mysql_error($db));

	// determine number of rows in returned result
	$num_set = mysql_num_rows($result);
?>
<div style="text-align: center;">
	<h2>Feedback Review</h2>
	<table border="1" cellpadding="2" cellspacing="2"
	  style="width: 70%; margin-left: auto; margin-right: auto;">
	<tr>
		<td>ID号</th>
		<td>反馈内容</td>
		<td>时间</td>

	</tr>
<?php
// loop through the results
while ($row = mysql_fetch_assoc($result)) {
    extract($row);
    echo '<tr>';
    echo '<td>' . $id . '</td>';
    echo '<td>' . $content . '</td>';
	echo '<td>' . $time . '</td>';
    echo '</tr>';
}     
?>
 </table>
</div>
</body>
</html>
