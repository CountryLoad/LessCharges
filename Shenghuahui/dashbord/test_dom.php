<?php
	require_once "../public_function/extract_packages/cu_34g.php";
	require_once "../public_class/class_pkg.php";
	require_once '../public_function/simple_html_dom.php';
	$pkg = extract_iphone();
	$name = 'hello';
	//get iphone_packages
	
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
