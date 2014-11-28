<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta charset="utf-8">
<meta name="keywords" content="话费套餐, 手机话费, 推荐套餐" />
    <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
    <script type="text/javascript" >
        $(document).ready(function() {
                $('table').tablesorter({
			sortList: [[11,0],[2,0]]
		});
		$('table').tablesorter({widgets:['zebra']});
	});	
    </script>
    <style>
	th { cursor: pointer};
	tr.even { background-color: #ECFFFF;}
	tr.odd { background-color: #CEFFCE;}
    </style>
              
    

</head>
<body>
<?php
	//connect to MySQL
    $mysql_server_name = "localhost"; //数据库服务器名称
    $mysql_username = "root"; // 连接数据库用户名
    $mysql_password = "20081010"; // 连接数据库密码
    $mysql_database = "PhoneSet"; // 数据库的名字
    
	$db = mysql_connect($mysql_server_name, $mysql_username,
                        $mysql_password);
	if (!$db) {
 		die('Could not connect: ' . mysql_error());
 	}

	mysql_query("SET NAMES UTF8");
	//make sure our recently created database is the active one
	mysql_select_db('PhoneSet', $db) or die(mysql_error($db));

	// retrieve information
	$query = 'SELECT * FROM phoneset';
	$result = mysql_query($query, $db) or die(mysql_error($db));

	// determine number of rows in returned result
	$num_set = mysql_num_rows($result);

        $phonenumber=$_POST['phonenumber'];
  	//echo $phonenumber;
  	$url1='http://api.k780.com:88/?app=phone.get&phone=';
	$url2='&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json';
        $url=$url1.$phonenumber.$url2;
	$ch=curl_init();
  	$timeout=5;
  	curl_setopt($ch,CURLOPT_URL,$url);
 	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  	curl_setopt($ch,CURLOPT_CONNECTIMEOUT,$timeout);
  	$lines_string=curl_exec($ch);
 	curl_close($ch);
  	$jsondata =(json_decode($lines_string,true));
	echo '尊敬的中国'.$jsondata['result']['operators'].$phonenumber
.'用户'.'</br>';
	echo '您来自: '.$jsondata['result']['style_citynm'].'</br>';
	echo '您的卡类型为: '.$jsondata['result']['ctype'].'</br>';
?>
<div style="text-align: center;">
	<h2>中国联通-哈尔滨-3G套餐资费表</h2>
	<table border="1" cellpadding="2" cellspacing="2"
	  style="width: 70%; margin-left: auto; margin-right: auto;">
	<thead>
	<tr>
		<th >ID号</th>
		<th >套餐名称</th>
		<th >套餐费用</th>
	    	<th >运营商</th>
		<th>本地通话/分钟</th>
		<th>数据流量/MB</th>
		<th>短信/条</th>		
		<th>本地主叫本地通话(元/分钟)</th>
		<th>本地主叫国内长途(元/分钟)</th>
		<th>数据流量(元/KB)</th>
		<th>短信/条</th>
		<th>FullCharge</th>
	</tr>
	</thead>
	<tbody>
<?php
// loop through the results
	  $_POST['Data1'] += 0;
	  $_POST['Message1'] += 0;
	  $_POST['Call1'] += 0;
          
	  $money = 0 ;
	
	while ($row = mysql_fetch_array($result)) {
  	  extract($row);
	  $money = $fee;
    	echo '<tr>';
   	echo '<td>' . $id . '</td>';
    	echo '<td>' . $name . '</td>';
        echo '<td>' . $fee. '</td>';
    	echo '<td>' . $operators. '</td>';
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
  </tbody>
 </table>
</div>
</body>
</html>
