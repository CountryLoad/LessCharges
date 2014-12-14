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

	// retrieve information
	$query = 'SELECT * FROM phoneset';
	$result = mysql_query($query, $db) or die(mysql_error($db));

	// determine number of rows in returned result
	$num_set = mysql_num_rows($result);
?>
<div style="text-align: center;">
	<h2>PhoneSet Review Database</h2>
	<table border="1" cellpadding="2" cellspacing="2"
	  style="width: 70%; margin-left: auto; margin-right: auto;">
	<tr>
		<td rowspan="2">ID号</th>
		<td rowspan="2">套餐名称</td>
		<td rowspan="2">套餐费用</td>
	    <td rowspan="2">运营商</td>
		<td colspan="3">套餐内容含</td>	
	   	<td colspan="4">套餐外</td>
	</tr>
	<tr>



		<td>本地通话/分钟</td>
		<td>数据流量/MB</td>
		<td>短信/条</td>		
		<td>本地主叫本地通话(元/分钟)</td>
		<td>本地主叫国内长途(元/分钟)</td>
		<td>数据流量(元/KB)</td>
		<td>短信/条</td>
	</tr>
<?php
// loop through the results
while ($row = mysql_fetch_assoc($result)) {
    extract($row);
    echo '<tr>';
    echo '<td>' . $id . '</td>';
    echo '<td>' . $name . '</td>';
    echo '<td>' . $operators . '</td>';
    echo '<td>' . $fee . '</td>';
    echo '<td>' . $duration . '</td>';
    echo '<td>' . $flow . '</td>';
    echo '<td>' . $sms . '</td>';
    echo '<td>' . $localcall . '</td>';
    echo '<td>' . $longdiscall . '</td>';
    echo '<td>' . $flowcharge . '</td>';
    echo '<td>' . $smscharge . '</td>';
    echo '</tr>';
}     
?>
 </table>
</div>
