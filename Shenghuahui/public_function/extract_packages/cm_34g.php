<?php
include_once "../simple_html_dom.php";
require_once ('../../public_class/class_pkg.php');
require_once ('../func_set_table.php');
/**
 * China Mobile 4G feixiang & shengcang
 * 
 * @return Pkg
 */
/**
 * *4g global**
 */
function extract_cm_4_global() {
	$url = 'http://www.10086.cn/4G/shengcang/';
	$html = file_get_html ( $url );
	$length = 9;
	for($i = 0; $i < $length; $i ++) {
		$pkg_global [$i] = new Pkg ( '4G上网套餐', 4, 'B', 0, 0, 0, 0, 0.19, 0.29, 0.1, 0 );
	}
	for($i = $length; $i < $length * 2; $i ++) {
		$pkg_global [$i] = new Pkg ( '4G商旅套餐', 4, 'B', 0, 0, 0, 0, 0.19, 0.29, 0.1, 0 );
	}
	$table = $html->find ( 'table', 0 );
	
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
	
	// Surfing cost data call
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
/**
 * *feixiang**
 */
function extract_cm_4_fei() {
	$url = 'http://www.10086.cn/4G/feixiangtc/';
	$html = file_get_html ( $url );
	
	$length = 8;
	for($i = 0; $i < $length; $i ++) {
		$pkg_fei [$i] = new Pkg ( '4G飞享套餐', 4, 'C', 0, 0, 0, 0, 0.19, 0.29, 0.1, 0 );
	}
	$table = $html->find ( 'table', 0 );
	
	// Business cost data call
	for($i = 0; $i < $length; $i ++) {
		$e = $table->find ( 'tr', $i + 1 );
		$pkg_fei [$i]->set_cost ( ( float ) $e->find ( 'td>p>span', 0 )->innertext );
		if (( int ) $e->find ( 'td>p', 1 )->innertext < 20) {
			$pkg_fei [$i]->set_pkg_data ( (( int ) $e->find ( 'td>p', 1 )->innertext) * 1024 );
		} else {
			$pkg_fei [$i]->set_pkg_data ( ( float ) $e->find ( 'td>p', 1 )->innertext );
		}
		$pkg_fei [$i]->set_pkg_call ( ( float ) $e->find ( 'td>p', 2 )->innertext );
	}
	return $pkg_fei;
}
function extract_cm_3_global() {
	// 全球通商旅套餐
	// 58套餐外长市漫一口价0.25元/分钟，全国接听免费（国内不含港澳台）数据流量：0.0005元/KB
	// 本地主叫0.19元/分钟；本地拨打国内长途0.19元/分钟；国内漫游主叫0.19元/分钟数据流量：0.0005元/KB
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122581.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122594.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122607.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122620.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122633.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122646.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122659.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122672.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122685.html
	// 全球通上网套餐
	// 58套餐外长市漫一口价0.25元/分钟，全国接听免费（国内不含港澳台）数据流量：0.0005元/KB
	// 套餐外长市漫一口价0.19元/分钟，全国接听免费（国内不含港澳台）数据流量：0.0005元/KB
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122698.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122711.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122724.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122737.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122750.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122763.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122776.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122789.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122802.html
	// 全球通本地套餐
	// 58套餐外本地主叫国内0.25元/分钟，漫游主叫0.29元/分钟，全国接听免费（国内不含港澳台）数据流量：0.0005元/KB
	// 88套餐外本地主叫国内0.19元/分钟，漫游主叫0.29元/分钟，全国接听免费（国内不含港澳台）数据流量：0.0005元/KB
	// 128套餐外本地主叫国内0.19元/分钟，漫游主叫0.30元/分钟，全国接听免费（国内不含港澳台）数据流量：0.0005元/KB
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122815.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122828.html
	// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122841.html
	$length = 9;
	for($i = 0; $i < $length; $i ++) {
		$number = 122581 + $i * 13;
		$url = 'http://www.10086.cn/fee/detail/hl/fee_rate_detail_' . $number . '.html';
		$html = file_get_html ( $url );
		$table = $html->find ( 'table', 4 );
		
		$pkg_3g [$i] = new Pkg ( '全球通商旅套餐', '3G', 'B', 0, 0, 0, 0, 0.15, 0.3, 0.1, 0 );
		$e = $table->find ( 'tr', 2 );
		$pkg_3g [$i]->set_cost ( ( float ) $e->find ( 'td', 0 )->innertext );
		
		$text1 = $e->find ( 'td', 2 )->innertext;
		preg_match_all ( '/(\d+)(\.?)(\d*)/is', $text1, $arr1 );
		$pkg_3g [$i]->set_pkg_call ( $arr1 [0] [0] );
		
		$pkg_3g [$i]->set_pkg_data ( ( float ) $e->find ( 'td', 4 )->innertext );
		// 套餐外长市漫一口价0.25元/分钟，全国接听免费（国内不含港澳台）数据流量：0.0005元/KB
		// 本地主叫0.19元/分钟；本地拨打国内长途0.19元/分钟；国内漫游主叫0.19元/分钟 数据流量：0.0005元/KB
		$text1 = $e->find ( 'td', 6 )->innertext;
		preg_match_all ( '/(\d+)(\.?)(\d*)/is', $text1, $arr1 );
		$pkg_3g [$i]->set_over_call ( $arr1 [0] [0] );
		if ($i == 0) {
			$pkg_3g [$i]->set_over_data ( $arr1 [0] [1] * 1024 );
		} else {
			$pkg_3g [$i]->set_over_data ( $arr1 [0] [3] * 1024 );
		}
	}
	for($i = $length; $i < 2 * $length; $i ++) {
		// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122698.html
		$number = 122698 + ($i - $length) * 13;
		$url = 'http://www.10086.cn/fee/detail/hl/fee_rate_detail_' . $number . '.html';
		$html = file_get_html ( $url );
		$table = $html->find ( 'table', 4 );
		
		$pkg_3g [$i] = new Pkg ( '全球通上网套餐', '3G', 'Net', 0, 0, 0, 0, 0.15, 0.3, 0.1, 0 );
		$e = $table->find ( 'tr', 2 );
		$pkg_3g [$i]->set_cost ( ( float ) $e->find ( 'td', 0 )->innertext );
		
		$text1 = $e->find ( 'td', 2 )->innertext;
		preg_match_all ( '/(\d+)(\.?)(\d*)/is', $text1, $arr1 );
		$pkg_3g [$i]->set_pkg_call ( $arr1 [0] [0] );
		
		$pkg_3g [$i]->set_pkg_data ( ( float ) $e->find ( 'td', 4 )->innertext );
		// 套餐外长市漫一口价0.19元/分钟，全国接听免费（国内不含港澳台）数据流量：0.0005元/KB
		$text1 = $e->find ( 'td', 6 )->innertext;
		preg_match_all ( '/(\d+)(\.?)(\d*)/is', $text1, $arr1 );
		$pkg_3g [$i]->set_over_call ( $arr1 [0] [0] );
		$pkg_3g [$i]->set_over_data ( $arr1 [0] [1] * 1024 );
	}
	for($i = 2*$length; $i < 2 * $length+3; $i ++) {
		// http://www.10086.cn/fee/detail/hl/fee_rate_detail_122698.html
		$number = 122815 + ($i - 2*$length) * 13;
		$url = 'http://www.10086.cn/fee/detail/hl/fee_rate_detail_' . $number . '.html';
		$html = file_get_html ( $url );
		$table = $html->find ( 'table', 4 );
	
		$pkg_3g [$i] = new Pkg ( '全球通本地套餐', '3G', 'GL', 0, 0, 0, 0, 0.15, 0.3, 0.1, 0 );
		$e = $table->find ( 'tr', 2 );
		$pkg_3g [$i]->set_cost ( ( float ) $e->find ( 'td', 0 )->innertext );
	
		$text1 = $e->find ( 'td', 2 )->innertext;
		preg_match_all ( '/(\d+)(\.?)(\d*)/is', $text1, $arr1 );
		$pkg_3g [$i]->set_pkg_call ( $arr1 [0] [0] );
	
		$pkg_3g [$i]->set_pkg_data ( ( float ) $e->find ( 'td', 4 )->innertext );
		// 套餐外长市漫一口价0.19元/分钟，全国接听免费（国内不含港澳台）数据流量：0.0005元/KB
		$text1 = $e->find ( 'td', 6 )->innertext;
		preg_match_all ( '/(\d+)(\.?)(\d*)/is', $text1, $arr1 );
		$pkg_3g [$i]->set_over_call ( $arr1 [0] [0] );
		$pkg_3g [$i]->set_over_data ( $arr1 [0] [2] * 1024 );
	}
// 	foreach ( $pkg_3g as $p ) {
// 		$p->display ();
// 	}
	return $pkg_3g;
}
function extract_cm_3_zone() {
	$url [0] = 'http://www.10086.cn/fee/detail/hl/fee_rate_detail_129311.html';
	$url [1] = 'http://www.10086.cn/fee/detail/hl/fee_rate_detail_129312.html';
	$url [2] = 'http://www.10086.cn/fee/detail/hl/fee_rate_detail_129313.html';
	$length = 3;
	$pkg_zone [0] = new Pkg ( '动感地带上网套餐', '3', 'edu', 0, 0, 0, 100, 0.19, 0.512, 0.1, 0 );
	$pkg_zone [1] = new Pkg ( '动感地带上网套餐', '3', 'edu', 0, 0, 0, 150, 0.19, 0.512, 0.1, 0 );
	$pkg_zone [2] = new Pkg ( '动感地带上网套餐', '3', 'edu', 0, 0, 0, 200, 0.19, 0.512, 0.1, 0 );
	for($i = 0; $i < $length; $i ++) {
		$html = file_get_html ( $url [$i] );
		$table = $html->find ( 'table.data_table_1', 0 );
		$e = $table->find ( 'tr', 2 );
		// var_dump($e);
		$pkg_zone [$i]->set_cost ( ( float ) $e->find ( 'td', 0 )->innertext );
		$content = $e->find ( 'td', 2 )->innertext;
		preg_match ( '/本地主叫本地通话(\d*)分钟/', $content, $arr );
		$pkg_zone [$i]->set_pkg_call ( ( float ) $arr [1] );
		if (( int ) $e->find ( 'td', 4 )->innertext < 20) {
			$pkg_zone [$i]->set_pkg_data ( (( int ) $e->find ( 'td', 4 )->innertext) * 1024 );
		} else {
			$pkg_zone [$i]->set_pkg_data ( ( float ) $e->find ( 'td', 4 )->innertext );
		}
	}
	// echo '<p>说明：</p>
	// <p>月使用费38元，赠送来电显示，含本地主叫本地通话80分钟，国内数据流量200M，200条短信，套餐外本地主叫本地通话0.1元/分钟，本地主叫国内长途0.19元/分钟，流量0.0005元/KB，国内不含港澳台，其他资费按照标准执行。
	// </p>
	// <p>套餐特点： 专为在校学生设计的一款套餐，赠送数据流量，优惠本地、长途通话费。
	// </p>
	// <ol>特别说明：
	// <ui>1、套餐月功能使用费执行上、下半月，赠送减半；</ui>
	// <ui>2、办理该套餐客户，无论是否叠加其它数据流量可选包，超出套餐外移动数据流量均按照0.0005元/KB收取；</ui>
	// <ui>3、套餐内包含短信条数指的是手机终端到手机终端的短信，不含梦网短信；</ui>
	// <ui>4、套餐内包含的数据流量为全国范围内手机上网流量（含T网和G网流量），不含港澳台漫游时产生的上网流量；</ui>
	// <ui>5、上网套餐（校园版）包含的WLAN时长仅限在校园内有CMCC-EDU网络热点标识的区域使用，同一个号码每月限40GB流量；</ui>
	// <ui>6、其它资费按照标准资费执行。</ui>
	// 办理限制： 黑龙江移动所有客户（已与我司签订协议不能变更基础资费套餐的客户除外） </ol>
	// ';
	return $pkg_zone;
}
function extract_xingfu() {
	$url = "http://www.10086.cn/fee/detail/hl/fee_rate_detail_129314.html";
	$pkg_cdt [0] = new Pkg ( 'xingfu', '3G', 'szx', 9, 0, 0, 0, 0.29, 0.512, 0.1, 0 );
	foreach ( $pkg_cdt as $pkg ) {
		$pkg->display ();
	}
	// return $pkg_cdt;
}
/**
 * ********************************
 */
// $pkg = extract_cm_3_zone();
// $p = $pkg[1];
// $p->display();
// extract_cm_3_global ();
/**
 * **********************************
 */
// $pkg = extract_cm_4_fei();
// $p = $pkg[0];
// $p->display();
/**
 * **********************************
 */
// $pkg = extract_cm_4_global();
// $p = $pkg[9];
// $p->display();
?>