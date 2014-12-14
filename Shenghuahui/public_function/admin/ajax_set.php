<?php
require_once ("../../public_class/class_pkg.php");
require_once ("../pkg/read_pkg.php");
require_once ('manage_package.php');
$choice= $_GET['setAdd'];
$tablename=$_GET['tablename'];
if($choice==0){
	del_cm_pkg();
	del_cu_pkg();
}elseif($choice==1){
	// set all tables
	set_cm_table();
	set_cu_table();
} elseif($choice ==21){
	add_cm_pkg();	
} elseif($choice ==22){
	add_cu_pkg();
} elseif($choice ==3) {
	if($tablename!=''){
		$pkg = pkg_query_tablename($tablename);
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
	}else{
		echo 'Invalid input!';
	}
} elseif($choice ==4) {
	if($tablename!=''){
		$pkg = com_query_all($tablename);
		foreach ( $pkg as $p ) {
			$p->display ();
		}
	}else{
		echo 'Invalid input!';
	}
} else {
	echo 'no operation!';
}
?>