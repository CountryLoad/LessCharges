<?php
include_once  "../simple_html_dom.php";
require_once  ('../../public_class/class_pkg.php');
require_once ('composition_bound.php');
//自选套餐中，流量是必选包、text和话音是可选包；
function extract_ncData() {
	$url6 = 'http://info.10010.com/database/4gindex/4gfee/diy_plan.html';
	$url = 'http://localhost/info_pages/4g_nc.html';
	$html = file_get_html ( $url6 );
	
	$table = $html->find ( 'table.package_tab2', 0 );
	$length = 9;
	
	for($i = 0; $i < $length; $i ++) {
		$pkg_cdt [$i] = new Composition ( 'D', 0, 0, 0 );
	}
	
	for($i = 0; $i < $length; $i ++) {
		// find data ROW
		$e = $table->find ( 'tr', $i + 2 );
		// extract cost
		$pkg_cdt [$i]->set_price ( ( int ) $e->find ( 'td', 1 )->innertext );
		// extract volume
		if (( int ) $e->find ( 'td', 2 )->innertext < 20) {
			$pkg_cdt [$i]->set_volume ( (( int ) $e->find ( 'td', 2 )->innertext) * 1024 );
		} else {
			$pkg_cdt [$i]->set_volume ( ( float ) $e->find ( 'td', 2 )->innertext );
		}
		// extrat over_cost
		if ($i == 0) {
			$e1 = $e->find ( 'td', 3 );
			for($count = 0; $count < $length; $count ++) {
				$pkg_cdt [$count]->set_over_cost ( ( float ) $e1->innertext );
			}
		}
	}
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}	
	return $pkg_cdt;
}

function extract_ncCall() {
	$url6 = 'http://info.10010.com/database/4gindex/4gfee/diy_plan.html';
	$url = 'http://localhost/info_pages/4g_nc.html';
	$html = file_get_html ( $url6 );
	$table = $html->find ( 'table.package_tab2', 1 );
	$length = 7;
	// optional first choice
	$pkg_cdt [0] = new Composition('C', 6, 0, 0.2);
	for($i = 1; $i < $length; $i ++) {
		$pkg_cdt [$i] = new Composition ( 'C', 0, 0, 0 );
	}
	
	for($i = 1; $i < $length; $i ++) {
		// find data ROW
		$e = $table->find ( 'tr', $i + 1 );
		// extract cost
		$pkg_cdt [$i]->set_price ( ( int ) $e->find ( 'td', 1 )->innertext );
		// extract volume
		if (( int ) $e->find ( 'td', 2 )->innertext < 20) {
			$pkg_cdt [$i]->set_volume ( (( int ) $e->find ( 'td', 2 )->innertext) * 1024 );
		} else {
			$pkg_cdt [$i]->set_volume ( ( float ) $e->find ( 'td', 2 )->innertext );
		}
		// extrat over_cost
		if ($i == 1) {
			$e1 = $e->find ( 'td', 3 );
			for($count = 1; $count < $length; $count ++) {
				$pkg_cdt [$count]->set_over_cost ( ( float ) $e1->innertext );
			}
		}
	}
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}
	return $pkg_cdt;
}

function extract_ncText() {
	$url6 = 'http://info.10010.com/database/4gindex/4gfee/diy_plan.html';
	$url = 'http://localhost/info_pages/4g_nc.html';
	$html = file_get_html ( $url6 );
	$table = $html->find ( 'table', 2 );
	$length = 4; // not essential
	$pkg_cdt [0] = new Composition('T', 0, 0, 0.1);
	for($i = 1; $i < $length; $i ++) {
		$pkg_cdt [$i] = new Composition ( 'T', 0, 0, 0 );
	}

	for($i = 1; $i < $length; $i ++) {
		// find data ROW
		$e = $table->find ( 'tr', $i + 1 );
		// extract cost
		$pkg_cdt [$i]->set_price ( ( int ) $e->find ( 'td', 0)->innertext );
		// extract volume
		if (( int ) $e->find ( 'td', 1 )->innertext < 20) {
			$pkg_cdt [$i]->set_volume ( (( int ) $e->find ( 'td', 1 )->innertext) * 1024 );
		} else {
			$pkg_cdt [$i]->set_volume ( ( float ) $e->find ( 'td', 1 )->innertext );
		}
		// extrat over_cost
		if ($i == 1) {
			$e1 = $e->find ( 'td', 2 );
			for($count = 0; $count < $length; $count ++) {
				$pkg_cdt [$count]->set_over_cost ( ( float ) $e1->innertext );
			}
		}
	}
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}
	return $pkg_cdt;
}

function extract_lcData() {
	$url6 = 'http://info.10010.com/database/4gindex/4gfee/diy_plan2.html';
	$url = 'http://localhost/info_pages/4g_lc.html';
	$html = file_get_html ( $url6 );

	$table = $html->find ( 'table', 0 );
	$length = 4;
	for($i = 0; $i < $length; $i ++) {
		$pkg_cdt [$i] = new Composition ( 'D', 0, 0, 0 );
	}
	for($i = 0; $i < $length; $i ++) {
		// find data ROW
		$e = $table->find ( 'tr', $i + 2 );
		// extract cost
		$pkg_cdt [$i]->set_price ( ( int ) $e->find ( 'td', 1 )->innertext );
		// extract volume
		if (( int ) $e->find ( 'td', 2 )->innertext < 20) {
			$pkg_cdt [$i]->set_volume ( (( int ) $e->find ( 'td', 2 )->innertext) * 1024 );
		} else {
			$pkg_cdt [$i]->set_volume ( ( float ) $e->find ( 'td', 2 )->innertext );
		}
		// extrat over_cost
		if ($i == 0) {
			$e1 = $e->find ( 'td', 3 );
			for($count = 0; $count < $length; $count ++) {
				$pkg_cdt [$count]->set_over_cost ( ( float ) $e1->innertext );
			}
		}
	}
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}
	return $pkg_cdt;
}
function extract_lcCall() {
	$url6 = 'http://info.10010.com/database/4gindex/4gfee/diy_plan2.html';
	$url = 'http://localhost/info_pages/4g_lc.html';
	$html = file_get_html ( $url6 );

	$table = $html->find ( 'table', 1 );
	$length = 3;
	for($i = 0; $i < $length; $i ++) {
		$pkg_cdt [$i] = new Composition ( 'C', 0, 0, 0 );
	}

	for($i = 0; $i < $length; $i ++) {
		// find data ROW
		$e = $table->find ( 'tr', $i + 2 );
		// extract cost
		$pkg_cdt [$i]->set_price ( ( int ) $e->find ( 'td', 0 )->innertext );
		// extract volume
		if (( int ) $e->find ( 'td', 1 )->innertext < 20) {
			$pkg_cdt [$i]->set_volume ( (( int ) $e->find ( 'td', 1 )->innertext) * 1024 );
		} else {
			$pkg_cdt [$i]->set_volume ( ( float ) $e->find ( 'td', 1 )->innertext );
		}
		// extrat over_cost
		if ($i == 0) {
			$e1 = $e->find ( 'td', 3 );
			for($count = 0; $count < $length; $count ++) {
				$pkg_cdt [$count]->set_over_cost ( ( float ) $e1->innertext );
			}
		}
	}
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}
	return $pkg_cdt;
}
function extract_lcText() {
	$url6 = 'http://info.10010.com/database/4gindex/4gfee/diy_plan2.html';
	$url = 'http://localhost/info_pages/4g_lc.html';
	$html = file_get_html ( $url6 );

	$table = $html->find ( 'table', 2 );
	$length = 4; // not essential
	$pkg_cdt [0] = new Composition('T', 0, 0, 0.1);
	for($i = 1; $i < $length; $i ++) {
		$pkg_cdt [$i] = new Composition ( 'T', 0, 0, 0 );
	}

	for($i = 1; $i < $length; $i ++) {
		// find data ROW
		$e = $table->find ( 'tr', $i + 1 );
		// extract cost
		$pkg_cdt [$i]->set_price ( ( int ) $e->find ( 'td', 0)->innertext );
		// extract volume
		if (( int ) $e->find ( 'td', 1 )->innertext < 20) {
			$pkg_cdt [$i]->set_volume ( (( int ) $e->find ( 'td', 1 )->innertext) * 1024 );
		} else {
			$pkg_cdt [$i]->set_volume ( ( float ) $e->find ( 'td', 1 )->innertext );
		}
		// extrat over_cost
		if ($i == 1) {
			$e1 = $e->find ( 'td', 2 );
			for($count = 0; $count < $length; $count ++) {
				$pkg_cdt [$count]->set_over_cost ( ( float ) $e1->innertext );
			}
		}
	}
	cal_UpLow ( $pkg_cdt );
// 	foreach ( $pkg_cdt as $pkg ) {
// 		$pkg->display ();
// 	}
	return $pkg_cdt;
}

// function cal_UpLow($pkg_cdt) {
// 	$len = count ( $pkg_cdt );
// 	// i-1 upper i lower
// 	for($i = 1; $i < $len; $i ++) {
// 		$upper = ($pkg_cdt [$i]->price - $pkg_cdt [$i - 1]->price) / $pkg_cdt [$i - 1]->over_cost + $pkg_cdt [$i - 1]->volume;
// 		$pkg_cdt [$i - 1]->upper = (int)$upper ;
// 		$pkg_cdt [$i]->lower = $pkg_cdt [$i - 1]->upper;
// 	}
// }
// 	extract_ncData();
// 	extract_ncCall();
// 	extract_ncText();
// 	extract_lcData();
// 	extract_lcCall();
// 	extract_lcText();
// 	$pkg_cdt[0]->display();
?>