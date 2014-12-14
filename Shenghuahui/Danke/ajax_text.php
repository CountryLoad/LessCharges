<?php
// 	extract($_REQUEST);
// 	echo "Welcome, $name!";
// 	echo "</br>TIme now is ",date("h:i:s A"),".";
	
// 	$key=$_GET["name"];
// 	//connect to MySQL
// 	$mysql_server_name = "localhost"; //数据库服务器名称
// 	$mysql_username = "root"; // 连接数据库用户名
// 	$mysql_password = "xyz2014"; // 连接数据库密码
// 	$mysql_database = "PhoneSet"; // 数据库的名字
	
// 	$db = mysql_connect($mysql_server_name, $mysql_username,
// 			$mysql_password);
// 	if (!$db) {
// 		die('Could not connect: ' . mysql_error());
// 	}
	
// 	mysql_query("SET NAMES UTF8");
	
// 	mysql_select_db('PhoneSet', $db) or die(mysql_error($db));
// 	echo 'key='.$key,'</br>';
// // 	$key = '';
// 	$sql="select value from pkg where value like '%$key%';";
// 	$result = mysql_query($sql);
// 	if(mysql_num_rows($result)>0)
// 	{
// // 		header('Content-Type:text/XML;charset=UTF-8');
// // 		echo "<all>";
// 		while($rows=mysql_fetch_array($result))
// 		{
// // 			echo "<v>".$rows[value]."</v>";
// 			echo $rows[value].'</br>';
// 		}
// // 		echo "</all>";
// 	}
require_once "../public_function/extract_packages/cu_34g.php";
require_once "../public_class/class_pkg.php";
require_once '../public_function/simple_html_dom.php';
$key=$_GET["name"];
echo 'key='.$key,'</br>';
if($key=='iphone'){
	$pkg = extract_iphone();
}else{
	$pkg = extract_a();
}

echo <<<HTML
	<table class="table table-striped">
	<thead>
	<tr>
	<th>套餐名称</th>
	<th>价格</th>
	<th>包含电话</th>
	<th>包含流量</th>
	<th>包含短信</th>
	<th>套餐外电话</th>
	<th>套餐外流量</th>
	<th>套餐外短信</th>
	<th>总价格</th>
	</tr>
	</thead>
	<tbody>
HTML;
foreach ($pkg as $p){
	echo '<tr>';
	echo '<td>'.$p->id.'</td>';
	echo '<td>'.$p->cost.'</td>';
	echo '<td>'.$p->pkg_call.'</td>';
	echo '<td>'.$p->pkg_data.'</td>';
	echo '<td>'.$p->pkg_text.'</td>';
	echo '<td>'.$p->over_call.'</td>';
	echo '<td>'.$p->over_data.'</td>';
	echo '<td>'.$p->over_text.'</td>';
	// 		echo '<td>'.$p->full_cost.'</td>';
	echo '</tr>';
}
echo '</tbody>';
echo '</table>';
?>