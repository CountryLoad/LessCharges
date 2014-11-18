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
    $mysql_password = "20081010"; // 连接数据库密码
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
		<td colspan="3">套餐内</td>	
	   	<td colspan="4">套餐外</td>    
		<td rowspan="2">FullCharge</td>
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
	  $_POST['Data1'] += 0;
	  $_POST['Message1'] += 0;
	  $_POST['Call1'] += 0;
          
	  echo 'You have Data:'.' '.$_POST['Data1'].'</br>';
	  echo 'You have Messages:'.' '.$_POST['Message1'].'</br>';
	  echo 'You have Calls:'.' '.$_POST['Call1'].'</br>';
	  $money = 0 ;
	  echo $money;
	
	while ($row = mysql_fetch_array($result)) {
  	  extract($row);
	  $money = $fee;
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
	if($_POST['Data1']>=$flow){
 		$money = ($_POST['Data1']-$flow) *1024* $flowcharge + $money ;	
	}
	if($_POST['Message1']>=$sms){
		 $money = ($_POST['Message1']-$sms) * $smscharge+ $money;
	}
	if($_POST['Call1']>=$duration){
		$money = ($_POST['Call1']-$duration) * $localcall+ $money;		}		
    	echo '<td>' .$money. '</td>';
        echo '</tr>';
	}     
?>
 </table>
</div>
</body>
</html>
