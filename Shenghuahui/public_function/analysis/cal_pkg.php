<?php
// require_once ("../pkg/read_pkg.php");
// require_once ("../../public_class/class_pkg.php");
/**
 * *** find cheap $ cal_cost ****
 */
function find_cheapest($pkgs, $call, $data, $text) {
	$flag = 0;
	$count = 0;
	$cheap = 100000.0;
	foreach ( $pkgs as $pkg ) {
		// cal full_cost
		$pkg->cal ( $call, $data, $text );
		$now = $pkg->full_cost;
		if ($now < $cheap) {
			$cheap = $now;
			$flag = $count;
		}
		$count ++;
	}
	return $flag;
}
/*
 * China Mobile
 * 1.local
 * 2.national
 * 3.student
 */
/**
 * *** for cm_local ****
 */
// 			'4G升舱套餐',
// 			'4G飞享套餐',
// 			'全球通商旅套餐',
// 			'动感地带上网套餐',
// 			'4G自选套餐_Data',
// 			'4G自选套餐_Call',
// 			'4G自选套餐_Text',
// 			'4G自选套餐_CText',
// 			'3G神州行自选套餐_Data',
// 			'3G神州行自选套餐_Call',
// 			'3G神州行自选套餐_Text',
// 			'3G神州行自选套餐_lCall' 
function cal_cm_local($call, $data, $text) {
	//szx local_composition & Global local
	$pkg_szx = get_composition ( '3G神州行自选套餐', $call, $data, $text );
// 	var_dump($pkg_szx);
	$pkg_global = pkg_query_tablename('全球通商旅套餐');
	$flag_g =find_cheapest($pkg_global, $call, $data, $text);
// 	var_dump($pkg_global [$flag_g]);
	$pkg_local = array (
			$pkg_szx,
			$pkg_global [$flag_g]
	);
	$flag = find_cheapest ( $pkg_local, $call, $data, $text );
// 	var_dump($pkg_local[$flag]);
	return $pkg_local [$flag];
}
/**
 * *** for cm_national ****
 */
function cal_cm_national($call, $data, $text) {
	$pkg_zx = get_composition ( '4G自选套餐', $call, $data, $text );
	$pkg_global = pkg_query_tablename('4G升舱套餐');
	$flag_g =find_cheapest($pkg_global, $call, $data, $text);
	$pkg_fei = pkg_query_tablename('4G飞享套餐');
	$flag_fei = find_cheapest($pkg_fei, $call, $data, $text);
	$pkg_national = array (
			$pkg_zx,
			$pkg_global [$flag_g],
			$pkg_fei [$flag_fei]
	);
	$flag = find_cheapest ( $pkg_national, $call, $data, $text );
	return $pkg_national [$flag];
}
/**
 * *** for cm_dzone ***
 */
function cal_cm_stu($call, $data, $text) {
	$pkg_zone = pkg_query_tablename('动感地带上网套餐');
	$flag = find_cheapest ( $pkg_zone, $call, $data, $text );
	return $pkg_zone [$flag];
}

/*
 * China Unicom
 * 1.local
 * 2.national
 * 3.student
 */

/**
 * *** for cu_local ****
 */
// local composition and 3G-C
function cal_cu_local($call, $data, $text) {
	$pkg_lc = get_composition ( '4G本地组合', $call, $data, $text );
	// get 3g_c
	$pkg_c = pkg_query_tablename ( '3G套餐C计划' );
	$flag_c = find_cheapest ( $pkg_c, $call, $data, $text );
	
	$pkg_local = array (
			$pkg_lc,
			$pkg_c [$flag_c] 
	);
	$flag = find_cheapest ( $pkg_local, $call, $data, $text );
	return $pkg_local [$flag];
}

/**
 * *** for cu_national ***
 */
// national composition and 3G a/b/c/i and 4G N
function cal_cu_national($call, $data, $text) {
	$pkg_nc = get_composition ( '4G全国组合', $call, $data, $text );
	// get 3g_a
	$pkg_a = pkg_query_tablename ( '3G套餐A计划' );
	$flag_a = find_cheapest ( $pkg_a, $call, $data, $text );
	// get 3g_b
	$pkg_b = pkg_query_tablename ( '3G套餐B计划' );
	$flag_b = find_cheapest ( $pkg_b, $call, $data, $text );
	// get 3g_i
	$pkg_i = pkg_query_tablename ( 'iPhone套餐' );
	$flag_i = find_cheapest ( $pkg_i, $call, $data, $text );
	// get 4g_n
	$pkg_4n = pkg_query_tablename ( '4G全国套餐' );
	$flag_4n = find_cheapest ( $pkg_4n, $call, $data, $text );
	
	$pkg_national = array (
			$pkg_nc,
			$pkg_a [$flag_a],
			$pkg_b [$flag_b],
			$pkg_i [$flag_i],
			$pkg_4n [$flag_4n] 
	);
	$flag = find_cheapest ( $pkg_national, $call, $data, $text );
	return $pkg_national [$flag];
}
/**
 * *** for cu_student ****
 */
// 4g wopai
function cal_cu_stu($call, $data, $text) {
	// get wo object from DB!!!!
	$pkg_wo = pkg_query_tablename ( '4G沃派校园' );
	$flag = find_cheapest ( $pkg_wo, $call, $data, $text );
	return $pkg_wo [$flag];
}
/**
 * Composition to Pkg
 */
// Composition
function get_composition($table_name, $call, $data, $text) {
	$table_name1 = array (
			'4G全国组合_Call',
			'4G全国组合_Data',
			'4G全国组合_Text',
			'4G本地组合_Call',
			'4G本地组合_Data',
			'4G本地组合_Text',
			'4G全国套餐',
			'4G沃派校园',
			'3G套餐A计划',
			'3G套餐B计划',
			'3G套餐C计划',
			'iPhone套餐' 
	);
	$table_name2 = array (
			'4G升舱套餐',
			'4G飞享套餐',
			'全球通商旅套餐',
			'全球通上网套餐',
			'全球通本地套餐',
			'动感地带上网套餐',
			'4G自选套餐_Data',
			'4G自选套餐_Call',
			'4G自选套餐_Text',
			'4G自选套餐_CText',
			'3G神州行自选套餐_Data',
			'3G神州行自选套餐_Call',
			'3G神州行自选套餐_Text',
			'3G神州行自选套餐_lCall' 
	);
	// echo $table_name.'_Call';
	$c_call = com_query_tablename ( $table_name . '_Call', $call );
	$c_data = com_query_tablename ( $table_name . '_Data', $data );
	$c_text = com_query_tablename ( $table_name . '_Text', $text );
	$pkg_c = transfer_composition ( $c_call, $c_data, $c_text, $table_name, $table_name, 'C' );
	// $c_call->display();
	// $c_data->display();
	// $c_text->display();
	// $pkg_c->display();
	return $pkg_c;
}
function transfer_composition($c_call, $c_data, $c_text, $id, $type1, $type2) {
	$pkg_call = $c_call->volume;
	$pkg_data = $c_data->volume;
	$pkg_text = $c_text->volume;
	$over_call = $c_call->over_cost;
	$over_data = $c_data->over_cost;
	$over_text = $c_text->over_cost;
	$cost = $c_call->price + $c_data->price + $c_text->price;
	// return a pkg ;
	// not cal full_cost until find_cheapest();
	$pkg_c = new Pkg ( $id, $type1, $type2, $cost, $pkg_call, $pkg_data, $pkg_text, $over_call, $over_data, $over_text, 0 );
	return $pkg_c;
}
// $pkg=cal_cu_local(100, 200, 100);
// $pkg=cal_cu_national(100, 200, 100);
// $pkg=cal_cu_stu(100, 200, 100);
// $pkg=cal_cm_local(100, 200, 100);
// $pkg=cal_cm_national(100, 200, 100);
// $pkg=cal_cm_stu(100, 200, 100);
// $pkg->display();
?>