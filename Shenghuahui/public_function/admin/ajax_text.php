<?php
// 	extract($_REQUEST);
// 	echo "Welcome, $name!";
// 	echo "</br>TIme now is ",date("h:i:s A"),".";
require_once ("../../public_class/class_pkg.php");
require_once ("../pkg/read_pkg.php");
$key1=$_GET["name1"];
$key2=$_GET["name2"];
// $key1="4G全国套餐";
// $key1='';
if($key1!=''){
	$pkg = pkg_query_tablename($key1);
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
} elseif($key2!='') {
	$pkg = com_query_all($key2);
	foreach ( $pkg as $p ) {
		$p->display ();
	}
} else {
	echo 'Invalid input!';
}
?>