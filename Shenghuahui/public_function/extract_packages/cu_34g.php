<?php
// require_once "../simple_html_dom.php";
// require_once ('../../public_class/class_pkg.php');
function extract_iphone() {
	$url = 'http://localhost/info_pages/iPhone_plan.html';
	$url1 = 'http://info.10010.com/database/3gindex/3gfee/iPhone_plan.html';
	$html = file_get_html ( $url);
	
	$table = $html->find ( 'table', 0 );
	$length = 10;
	for($i = 0; $i < $length; $i ++) {
		$pkg_iphone [$i] = new Pkg ( 'iPhone套餐', '3G', 'i', 0, 0, 0, 0, 0.2, 0.3, 0.1, 0 );
	}
	// extract cost
	$count = 0;
	$e = $table->find ( 'tr', 0 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			$pkg_iphone [$count]->set_cost ( ( float ) $td->innertext );
			$count ++;
		}
	}
	// extract call
	$count = 0;
	$e = $table->find ( 'tr', 1 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			// $pkg_iphone[$count]->set_cost($td->innertext);
			$pkg_iphone [$count]->set_pkg_call ( ( int ) $td->innertext );
			$count ++;
		}
	}
	// extract data
	$count = 0;
	$e = $table->find ( 'tr', 2 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			if (( float ) $td->innertext < 20.0) {
				$pkg_iphone [$count]->set_pkg_data ( (( float ) $td->innertext) * 1024 );
			} else {
				$pkg_iphone [$count]->set_pkg_data ( ( float ) $td->innertext );
			}
			$count ++;
		}
	}
	// extract text
	$count = 0;
	$e = $table->find ( 'tr', 3 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			$pkg_iphone [$count]->set_pkg_text ( ( int ) $td->innertext );
			$count ++;
		}
	}
	// extract over_call
	$count = 0;
	$e = $table->find ( 'tr', 5 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			if (($td->colspan) > 1) {
				for($i = 0; $i < $td->colspan; $i ++) {
					$pkg_iphone [$count]->set_over_call ( ( float ) $td->innertext );
					$count ++;
				}
			} else {
				$pkg_iphone [$count]->set_over_call ( ( float ) $td->innertext );
				$count ++;
			}
		}
	}
// 	foreach ( $pkg_iphone as $p ) {
// 		$p->display ();
// 	}
	return $pkg_iphone;
}
function extract_a() {
	$url = 'http://localhost/info_pages/3gfee_A_plan.html';
	$url1 = 'http://info.10010.com/database/3gindex/3gfee/A_plan.html';
	$html = file_get_html ( $url );
	
	$table = $html->find ( 'table', 0 );
	$length = 11;
	for($i = 0; $i < $length; $i ++) {
		$pkg_a [$i] = new Pkg ( '3G套餐A计划', '3G', 'A', 0, 0, 0, 0, 0.2, 0.3, 0.1, 0 );
	}
	// extract cost
	$count = 0;
	$e = $table->find ( 'tr', 0 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			$pkg_a [$count]->set_cost ( ( float ) $td->innertext );
			$count ++;
		}
	}
	// extract call
	$count = 0;
	$e = $table->find ( 'tr', 1 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			$pkg_a [$count]->set_pkg_call ( ( int ) $td->innertext );
			$count ++;
		}
	}
	// extract data
	$count = 0;
	$e = $table->find ( 'tr', 2 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			if (( float ) $td->innertext < 20.0) {
				$pkg_a [$count]->set_pkg_data ( (( float ) $td->innertext) * 1024 );
			} else {
				$pkg_a [$count]->set_pkg_data ( ( float ) $td->innertext );
			}
			$count ++;
		}
	}
	// extract text
	$count = 0;
	$e = $table->find ( 'tr', 3 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			$pkg_a [$count]->set_pkg_text ( ( int ) $td->innertext );
			$count ++;
		}
	}
	// extract over_call
	$count = 0;
	$e = $table->find ( 'tr', 4 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			if (($td->colspan) > 1) {
				for($i = 0; $i < $td->colspan; $i ++) {
					$pkg_a [$count]->set_over_call ( ( float ) $td->innertext );
					$count ++;
				}
			} else {
				$pkg_a [$count]->set_over_call ( ( float ) $td->innertext );
				$count ++;
			}
		}
	}
// 	foreach ( $pkg_a as $p ) {
// 		$p->display ();
// 	}
	return $pkg_a;
}
function extract_b() {
	$url = 'http://localhost/info_pages/3gfee_B_plan.html';
	$url1 = 'http://info.10010.com/database/3gindex/3gfee/B_plan.html';
	$html = file_get_html ( $url1 );
	
	// $pkg_b[] = new Pkg();
	// array_keys($pkg_b);
	$table = $html->find ( 'table', 0 );
	$length = 6;
	for($i = 0; $i < $length; $i ++) {
		$pkg_b [$i] = new Pkg ( '3G套餐B计划', '3G', 'B', 0, 0, 0, 0, 0.2, 0.3, 0.1, 0 );
	}
	// extract cost
	$count = 0;
	$e = $table->find ( 'tr', 0 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			$pkg_b [$count]->set_cost ( ( float ) $td->innertext );
			$count ++;
		}
	}
	// extract call
	$count = 0;
	$e = $table->find ( 'tr', 1 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			// $pkg_b[$count]->set_cost($td->innertext);
			$pkg_b [$count]->set_pkg_call ( ( int ) $td->innertext );
			$count ++;
		}
	}
	// extract data
	$count = 0;
	$e = $table->find ( 'tr', 2 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			if (( float ) $td->innertext < 20.0) {
				$pkg_b [$count]->set_pkg_data ( (( float ) $td->innertext) * 1024 );
			} else {
				$pkg_b [$count]->set_pkg_data ( ( float ) $td->innertext );
			}
			$count ++;
		}
	}
	// extract over_call
	$count = 0;
	$e = $table->find ( 'tr', 4 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			if (($td->colspan) > 1) {
				for($i = 0; $i < $td->colspan; $i ++) {
					$pkg_b [$count]->set_over_call ( ( float ) $td->innertext );
					$count ++;
				}
			} else {
				$pkg_b [$count]->set_over_call ( ( float ) $td->innertext );
				$count ++;
			}
		}
	}
// 	foreach ( $pkg_b as $p ) {
// 		$p->display ();
// 	}
	return $pkg_b;
}
function extract_c() {
	$url1 = 'http://info.10010.com/database/3gindex/3gfee/C_plan.html';
	$url = 'http://localhost/info_pages/3gfee_C_plan.html';
	$html = file_get_html ( $url1 );
	
	// $pkg_c[] = new Pkg();
	// array_keys($pkg_c);
	$table = $html->find ( 'table', 0 );
	$length = 3;
	for($i = 0; $i < $length; $i ++) {
		$pkg_c [$i] = new Pkg ( '3G套餐C计划', '3G', 'C', 0, 0, 0, 0, 0.2, 0.3, 0.1, 0 );
	}
	// extract cost
	$count = 0;
	$e = $table->find ( 'tr', 0 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			$pkg_c [$count]->set_cost ( ( float ) $td->innertext );
			$count ++;
		}
	}
	// extract call
	$count = 0;
	$e = $table->find ( 'tr', 1 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			$pkg_c [$count]->set_pkg_call ( ( int ) $td->innertext );
			$count ++;
		}
	}
	// extract data
	$count = 0;
	$e = $table->find ( 'tr', 2 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			if (( float ) $td->innertext < 20.0) {
				$pkg_c [$count]->set_pkg_data ( (( float ) $td->innertext) * 1024 );
			} else {
				$pkg_c [$count]->set_pkg_data ( ( float ) $td->innertext );
			}
			$count ++;
		}
	}
	// extract over_call
	$count = 0;
	$e = $table->find ( 'tr', 4 );
	foreach ( $e->find ( 'td' ) as $td ) {
		if (is_numeric ( $td->innertext ) || ( float ) ($td->innertext) != 0) {
			if (($td->colspan) > 1) {
				for($i = 0; $i < $td->colspan; $i ++) {
					$pkg_c [$count]->set_over_call ( ( float ) $td->innertext );
					$count ++;
				}
			} else {
				$pkg_c [$count]->set_over_call ( ( float ) $td->innertext );
				$count ++;
			}
		}
	}
// 	foreach ( $pkg_c as $p ) {
// 		$p->display ();
// 	}
	return $pkg_c;
}
function extract_4n() {
	$url1 = 'http://info.10010.com/database/4gindex/4gfee/4G_plan.html';
	$url = 'http://localhost/info_pages/4g_national.html';
	$html = file_get_html ( $url1 );
	
	// $pkg_4n[] = new Pkg();
	// array_keys($pkg_4n);
	$table = $html->find ( 'table', 0 );
	$length = 8;
	for($i = 0; $i < $length; $i ++) {
		$pkg_4n [$i] = new Pkg ( '4G全国套餐', '4G', 'n', 0, 0, 0, 0, 0.15, 0.3, 0.1, 0 );
	}
	
	for($i = 0; $i < $length; $i ++) {
		$e = $table->find ( 'tr', $i + 2 );
		$pkg_4n [$i]->set_cost ( ( float ) $e->find ( 'td', 0 )->innertext );
		$pkg_4n [$i]->set_pkg_call ( ( float ) $e->find ( 'td', 1 )->innertext );
		if (( int ) $e->find ( 'td', 2 )->innertext < 20) {
			$pkg_4n [$i]->set_pkg_data ( (( int ) $e->find ( 'td', 2 )->innertext) * 1024 );
		} else {
			$pkg_4n [$i]->set_pkg_data ( ( float ) $e->find ( 'td', 2 )->innertext );
		}
	}
// 	foreach ( $pkg_4n as $p ) {
// 		$p->display ();
// 	}
	return $pkg_4n;
}
function extract_wo() {
	$pkg_wo [0] = new Pkg ( '4G沃派校园', '4G', '沃派', 16, 100, 200, 0, 0.15, 0.3, 0.1, 0 );
	$pkg_wo [1] = new Pkg ( '4G沃派校园', '4G', '沃派', 26, 100, 600, 0, 0.15, 0.3, 0.1, 0 );
	$pkg_wo [2] = new Pkg ( '4G沃派校园', '4G', '沃派', 36, 100, 1024, 0, 0.15, 0.3, 0.1, 0 );
	return $pkg_wo;
}
/**
 * *************************************************
 */
// echo 'hello2';
// $pkg = extract_iphone ();
// $pkg = extract_a ();
// $pkg = extract_b ();
// $pkg = extract_c ();
// $pkg = extract_4n ();
// $pkg = extract_wo ();
// $pkg [1]->display ();
// foreach ( $pkg as $p ) {
// 	$p->display ();
// }
?>
