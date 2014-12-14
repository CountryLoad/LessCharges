<?php
include_once  "../simple_html_dom.php";
require_once  ('../../public_class/class_pkg.php');
require_once ('composition_bound.php');
/*4Gzixuan计费规则：
 1、自选套餐中，流量和话音是必选包、数据业务是可选包；
 2、自选套餐用户流量不够时，可将上网流量部分更换为更大流量包（次月生效）；若当月流量不够时，可订购流量加油包（立即生效）；
 3、4G自选套餐订购成功后会替代您原有基础套餐；
 4、4G语音资费所包含的国内主叫分钟数不含可视电话；可视电话国内主叫国内0.60元/分钟，国内被叫免费；
 5、多终端共享是指：主卡客户套餐内流量副卡可以共享使用，共享流量包含主卡客户基础套餐、流量包、加油包、营销活动赠送的全国通用流量；
 6、具体事宜以当地移动公司服务公告为准，详情请咨询当地10086热线。
 自选套餐中，流量和话音是必选包、数据业务是可选包；
 */
/**
 * 4G-自选套餐
 * @return Composition
 */
function extract_cm_4_ncData() {
	$url6 = 'http://www.10086.cn/4G/zixuantc/';
	$url = 'http://localhost/info_pages/4g_nc.html';
	$html = file_get_html ( $url6 );
	
	$table = $html->find ( 'table.tctable', 0 );
	$length = 8;
	
	for($i = 0; $i < $length; $i ++) {
		$pkg_cdt [$i] = new Composition ( 'D', 0, 0, 0.29 );
	}
	
	for($i = 0; $i < $length; $i ++) {
		// find data ROW
		$e = $table->find ( 'tr', $i + 2 );
		// extract cost
		$pkg_cdt [$i]->set_price ( ( int ) $e->find ( 'td>b>span', 0 )->innertext );
		// extract volume
		if (( int ) $e->find ( 'td>b', 1 )->innertext < 20) {
			$pkg_cdt [$i]->set_volume ( (( int ) $e->find ( 'td>b', 1 )->innertext) * 1024 );
		} else {
			$pkg_cdt [$i]->set_volume ( ( float ) $e->find ( 'td>b', 1 )->innertext );
		}
		$pkg_cdt[$i]->set_over_cost(0.29);
	}
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}	
	return $pkg_cdt;
}

function extract_cm_4_ncCall() {
	$url6 = 'http://www.10086.cn/4G/zixuantc/';
	$url = 'http://localhost/info_pages/4g_nc.html';
	$html = file_get_html ( $url6 );

	$table = $html->find ( 'table.tctable', 1 );
	$length = 8;

	for($i = 0; $i < $length; $i ++) {
		$pkg_cdt [$i] = new Composition ( 'C', 0, 0, 0.19 );
	}

	for($i = 0; $i < $length; $i ++) {
		// find data ROW
		$e = $table->find ( 'tr', $i + 2 );
		// extract cost
		$pkg_cdt [$i]->set_price ( ( int ) $e->find ( 'td>b>span', 0 )->innertext );
		// extract volume
		if (( int ) $e->find ( 'td>b', 1 )->innertext < 20) {
			$pkg_cdt [$i]->set_volume ( (( int ) $e->find ( 'td>b', 1 )->innertext) * 1024 );
		} else {
			$pkg_cdt [$i]->set_volume ( ( float ) $e->find ( 'td>b', 1 )->innertext );
		}
		$pkg_cdt[$i]->set_over_cost(0.19);
	}
// 	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}
	return $pkg_cdt;
}

function extract_cm_4_ncText() {
	$url6 = 'http://www.10086.cn/4G/zixuantc/';
	$url = 'http://localhost/info_pages/4g_nc.html';
	$html = file_get_html ( $url6 );

	$table = $html->find ( 'table.tctable', 2 );
	$length = 4;
	$pkg_cdt [0] = new Composition ( 'T', 0, 0, 0.1 );
	for($i = 1; $i < $length; $i ++) {
		$pkg_cdt [$i] = new Composition ( 'T', 0, 0, 0.1 );
	}

	for($i = 1; $i < $length; $i ++) {
		// find data ROW
		$e = $table->find ( 'tr', $i + 1 );
		// extract cost
		$pkg_cdt [$i]->set_price ( ( int ) $e->find ( 'td>b>span', 0 )->innertext );
		// extract volume
		if (( int ) $e->find ( 'td>p', 1 )->innertext < 20) {
			$pkg_cdt [$i]->set_volume ( (( int ) $e->find ( 'td>p', 1 )->innertext) * 1024 );
		} else {
			$pkg_cdt [$i]->set_volume ( ( float ) $e->find ( 'td>p', 1 )->innertext );
		}
		$pkg_cdt[$i]->set_over_cost(0.1);
	}
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}
	return $pkg_cdt;
}

function extract_cm_4_ncCText() {
	$url6 = 'http://www.10086.cn/4G/zixuantc/';
	$url = 'http://localhost/info_pages/4g_nc.html';
	$html = file_get_html ( $url6 );

	$table = $html->find ( 'table.tctable', 3 );
	$length = 4;
	$pkg_cdt [0] = new Composition ( 'CT', 0, 0, 0.3 );
	for($i = 0; $i < $length; $i ++) {
		$pkg_cdt [$i] = new Composition ( 'CT', 0, 0, 0.3 );
	}

	for($i = 1; $i < $length; $i ++) {
		// find data ROW
		$e = $table->find ( 'tr', $i + 0 );
		// extract cost
		$pkg_cdt [$i]->set_price ( ( int ) $e->find ( 'td>span', 0 )->innertext );
		// extract volume
		if (( int ) $e->find ( 'td>p', 1 )->innertext < 20) {
			$pkg_cdt [$i]->set_volume ( (( int ) $e->find ( 'td>p', 1 )->innertext) * 1024 );
		} else {
			$pkg_cdt [$i]->set_volume ( ( float ) $e->find ( 'td>p', 1 )->innertext );
		}
		$pkg_cdt[$i]->set_over_cost(0.3);
	}
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}
	return $pkg_cdt;
}
/**
 * 3G-神州行-自选套餐,暂时手动输入；
 */
function extract_cm_szx_Data() {
	$i =0 ;
	$pkg_cdt [$i] = new Composition ( 'D', 0, 0, 1 );
	$pkg_cdt [$i+1] = new Composition ( 'D', 5, 30, 1 );
	$pkg_cdt [$i+2] = new Composition ( 'D', 10, 70, 1 );
	$pkg_cdt [$i+3] = new Composition ( 'D', 20, 150, 1 );
	$pkg_cdt [$i+4] = new Composition ( 'D', 30, 500,0.29);
	$pkg_cdt [$i+5] = new Composition ( 'D', 40, 700,0.29);
	$pkg_cdt [$i+6] = new Composition ( 'D', 50, 1024,0.29);
	$pkg_cdt [$i+7] = new Composition ( 'D', 70, 2048,0.29);
	$pkg_cdt [$i+8] = new Composition ( 'D', 100, 3072,0.29);
	$pkg_cdt [$i+9] = new Composition ( 'D', 130, 4096,0.29);
	$pkg_cdt [$i+10] = new Composition ( 'D', 180, 6144,0.29);
	$pkg_cdt [$i+11] = new Composition ( 'D',280, 11264,0.29);
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}
	return $pkg_cdt;
}
function extract_cm_szx_lCall() {
	$pkg_cdt [0] = new Composition ( 'LC', 9, 40, 0.1 );
	$pkg_cdt [1] = new Composition ( 'LC', 18, 100, 0.1 );
	$pkg_cdt [2] = new Composition ( 'LC', 28, 200, 0.1);
	$pkg_cdt [3] = new Composition ( 'LC', 38, 300, 0.1);
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}
	return $pkg_cdt;
}
function extract_cm_szx_nCall(){
	$pkg_cdt [0] = new Composition ( 'NC', 18, 80, 0.19);
	$pkg_cdt [1] = new Composition ( 'NC', 28, 160, 0.19);
	$pkg_cdt [2] = new Composition ( 'NC', 38, 240, 0.19);
	$pkg_cdt [3] = new Composition ( 'NC', 48, 340, 0.19);
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}
	return $pkg_cdt;
}
function extract_cm_szx_Text() {
	$pkg_cdt [0] = new Composition ( 'T', 0, 0, 0.1);
	$pkg_cdt [1] = new Composition ( 'T', 3, 40, 0.1);
	$pkg_cdt [2] = new Composition ( 'T', 5, 80, 0.1);
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}
	return $pkg_cdt; 
}
// extract_cm_4_ncData();
// extract_cm_4_ncCall();
// extract_cm_4_ncText();
// extract_cm_4_ncCText();
// 	extract_cm_szx_Data();
// 	extract_cm_szx_lCall();
// 	extract_cm_szx_nCall();
// 	extract_cm_szx_Text();
?>