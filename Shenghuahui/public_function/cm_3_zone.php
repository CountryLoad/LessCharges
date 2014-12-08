<?php
include "simple_html_dom.php";
require ('../public_class/class_pkg.php');
require ('func_set_table.php');
function extract_cm_3_zone() {
	$url [0] = 'http://www.10086.cn/fee/detail/hl/fee_rate_detail_129311.html';
	$url [1] = 'http://www.10086.cn/fee/detail/hl/fee_rate_detail_129312.html';
	$url [2] = 'http://www.10086.cn/fee/detail/hl/fee_rate_detail_129313.html';
	$length = 3;
	$pkg_zone [0] = new Pkg ( 'zone', 3, 'edu', 0, 0, 0, 100, 0.19, 0.512, 0.1, 0 );
	$pkg_zone [1] = new Pkg ( 'zone', 3, 'edu', 0, 0, 0, 150, 0.19, 0.512, 0.1, 0 );
	$pkg_zone [2] = new Pkg ( 'zone', 3, 'edu', 0, 0, 0, 200, 0.19, 0.512, 0.1, 0 );
	
	// print_r( $table);
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
	
// 	echo '<p>说明：</p>
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
/***********************************/
// 	$pkg = extract_cm_3_zone();
// 	$p = $pkg[0];
// 	$p->display();

?>