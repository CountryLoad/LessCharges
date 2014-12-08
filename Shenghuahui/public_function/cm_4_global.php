<?php
include "simple_html_dom.php";
require ('../public_class/class_pkg.php');
require ('func_set_table.php');
function extract_cm_4_global() {
	echo '<p>资费说明</p>
	<p>1、4G上网套餐、4G商旅套餐全国范围内被叫免费，赠送来电显示；</p>
	<p>2、套餐外上网流量0.29元/M，提供10元100M加油包供选择，套餐外国内主叫国内0.19元/分钟；</p>
	<p>3、提供多终端共享，允许增加不超过4个共享终端，每增加一个，每月收取10元功能费；</p>';
	$url6 = 'http://www.10086.cn/4G/shengcang/';
	$html = file_get_html ( $url6 );
// 	$pkg_global [] = new Pkg ();
// 	array_keys ( $pkg_global );
	$length = 9;
	// echo $length.'</br>';
	for($i = 0; $i < $length * 2; $i ++) {
		$pkg_global [$i] = new Pkg ( 'shengcang', 4, 'B', 0, 0, 0, 0, 0.19, 0.29, 0.1, 0 );
		// $pkg_global[$i]->init_all($i, 4, 'n', 1);
	}
	$table = $html->find ( 'table', 0 );
	// var_dump($table);
	
	// Business cost data call
	for($i = 0; $i < $length; $i ++) {
		$e = $table->find ( 'tr', $i + 2 );
		$pkg_global [$i]->set_cost ( ( float ) $e->find ( 'td>p>span', 0 )->innertext );
		if (( int ) $e->find ( 'td>p', 1 )->innertext < 20) {
			$pkg_global [$i]->set_pkg_data ( (( int ) $e->find ( 'td>p', 1 )->innertext) * 1024 );
		} else {
			$pkg_global [$i]->set_pkg_data ( ( float ) $e->find ( 'td>p', 1 )->innertext );
		}
		$pkg_global [$i]->set_pkg_call ( ( float ) $e->find ( 'td>p', 2 )->innertext );
	}
	
	// shangwang cost data call
	$table = $html->find ( 'table', 1 );
	for($i = $length; $i < 18; $i ++) {
		$e = $table->find ( 'tr', $i - $length + 2 );
		$pkg_global [$i]->set_cost ( ( float ) $e->find ( 'td>p>span', 0 )->innertext );
		if (( int ) $e->find ( 'td>p', 1 )->innertext < 20) {
			$pkg_global [$i]->set_pkg_data ( (( int ) $e->find ( 'td>p', 1 )->innertext) * 1024 );
		} else {
			$pkg_global [$i]->set_pkg_data ( ( float ) $e->find ( 'td>p', 1 )->innertext );
		}
		$pkg_global [$i]->set_pkg_call ( ( float ) $e->find ( 'td>p', 2 )->innertext );
	}	
	return $pkg_global;
}
/*************************************/
//    $pkg = extract_cm_4_global();
//    $p = $pkg[0];
//    $p->display();
?>