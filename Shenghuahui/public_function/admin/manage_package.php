<?php
//
require_once ("../../public_class/class_pkg.php");
require_once ("../pkg/add_pkg.php"); // add_com($com, '4G_NC_Data');
require_once '../pkg/new_pkg_table.php'; // new_com_table('4G_NC_Data')
require_once ("../pkg/read_pkg.php");
require_once ('drop_table.php');

require_once ("../extract_packages/cu_34g.php");
require_once ("../extract_packages/cu_compose.php");
require_once ("../extract_packages/cm_34_zixuan.php");
require_once ("../extract_packages/cm_34g.php");

include_once "../simple_html_dom.php";


/**
 * ************* control all pkg_tables *************
 */
function set_cu_table() {
	// set pkg table
	new_pkg_table ( '4G全国套餐' );
	new_pkg_table ( '3G套餐A计划' );
	new_pkg_table ( '3G套餐B计划' );
	new_pkg_table ( '3G套餐C计划' );
	new_pkg_table ( 'iPhone套餐' );
	new_pkg_table ( '4G沃派校园' );
// 	new_pkg_table ( '预付费套餐' );
// 	new_pkg_table ( '无线上网卡套餐' );
	// set pkg composition table
	new_com_table ( '4G全国组合_Data' );
	new_com_table ( '4G全国组合_Call' );
	new_com_table ( '4G全国组合_Text' );
	new_com_table ( '4G本地组合_Data' );
	new_com_table ( '4G本地组合_Call' );
	new_com_table ( '4G本地组合_Text' );
	echo 'Ok, ChinaUnicom table set';
}
function set_cm_table() {
	// set pkg table
	new_pkg_table ( '4G升舱套餐' );
	new_pkg_table ( '4G飞享套餐' );
	new_pkg_table ( '全球通商旅套餐' );
// 	new_pkg_table ( '全球通上网套餐' );
// 	new_pkg_table ( '全球通本地套餐' );
	new_pkg_table ( '动感地带上网套餐' );
	// set com table
	new_com_table ( '4G自选套餐_Data' );
	new_com_table ( '4G自选套餐_Call' );
	new_com_table ( '4G自选套餐_Text' );
	new_com_table ( '4G自选套餐_CText' );
	new_com_table ( '3G神州行自选套餐_Data' );
	new_com_table ( '3G神州行自选套餐_Call' );
	new_com_table ( '3G神州行自选套餐_Text' );
	new_com_table ( '3G神州行自选套餐_lCall' );
	echo 'Ok, ChinaMobile table set';
}
function set_ct_table() {
}
/**
 * ************* extract all packages here *************
 */
function add_cu_pkg() {
	/**
	 * composition
	 */
	$com = extract_ncData ();
	add_com ( $com, '4G全国组合_Data' );
	$com = extract_ncCall ();
	add_com ( $com, '4G全国组合_Call' );
	$com = extract_ncText ();
	add_com ( $com, '4G全国组合_Text' );
	$com = extract_lcData ();
	add_com ( $com, '4G本地组合_Data' );
	$com = extract_lcCall ();
	add_com ( $com, '4G本地组合_Call' );
	$com = extract_lcText ();
	add_com ( $com, '4G本地组合_Text' );
	/**
	 * pkg
	 */
	$com = extract_4n ();
	add_pkg ( $com, '4G全国套餐' );
	$com = extract_a ();
	add_pkg ( $com, '3G套餐A计划' );
	$com = extract_b ();
	add_pkg ( $com, '3G套餐B计划' );
	$com = extract_c ();
	add_pkg ( $com, '3G套餐C计划' );
	$com = extract_iphone ();
	add_pkg ( $com, 'iPhone套餐' );
	$com = extract_wo ();
	add_pkg ( $com, '4G沃派校园' );
	// $com = extract_lcText();
	// add_com($com, '预付费套餐');
	// $com = extract_lcText();
	// add_com($com, '预付费套餐');
	echo 'Ok, ChinaUnicom Pkg inserted';
}
function add_cm_pkg() {
	/**
	 * composition
	 */
	$com = extract_cm_4_ncData ();
	add_com ( $com, '4G自选套餐_Data' );
	$com = extract_cm_4_ncCall ();
	add_com ( $com, '4G自选套餐_Call' );
	$com = extract_cm_4_ncText ();
	add_com ( $com, '4G自选套餐_Text' );
	$com = extract_cm_4_ncCText ();
	add_com ( $com, '4G自选套餐_CText' );
	$com = extract_cm_szx_Data ();
	add_com ( $com, '3G神州行自选套餐_Data' );
	$com = extract_cm_szx_nCall ();
	add_com ( $com, '3G神州行自选套餐_Call' );
	$com = extract_cm_szx_Text ();
	add_com ( $com, '3G神州行自选套餐_Text' );
	$com = extract_cm_szx_lCall ();
	add_com ( $com, '3G神州行自选套餐_lCall' );
	/**
	 * pkg
	 */
	$com = extract_cm_4_global ();
	add_pkg ( $com, '4G升舱套餐' );
	$com = extract_cm_4_fei ();
	add_pkg ( $com, '4G飞享套餐' );
	$com = extract_cm_3_global ();
	add_pkg ( $com, '全球通商旅套餐' );
	// $com = extract_cm_3_global();
	// add_pkg ( $com, '全球通上网套餐' );
	// $com = extract_cm_3_global();
	// add_pkg ( $com, '全球通本地套餐' );
	$com = extract_cm_3_zone ();
	add_pkg ( $com, '动感地带上网套餐' );
	echo 'Ok, ChinaMobile Pkg inserted';
}

/**
 * drop all tables & empty all tables
 */
function del_cu_pkg() {
	$table_name = array (
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
	foreach ( $table_name as $tn ) {
		drop_table ( $tn );
	}
	echo "OK! Drop ChinaUnicom table!";
}
function del_cm_pkg() {
	$table_name = array (
			'4G升舱套餐',
			'4G飞享套餐',
			'全球通商旅套餐',
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
	foreach ( $table_name as $tn ) {
		drop_table ( $tn );
	}
	echo "OK! Drop ChinaMobile table!";
}
// function update_pkg(){

// }
function display_all_pkg() {
}

/**
 * **********************************************************
 */
// echo 'hello';
// del_pkg();
// set_cu_table ();
// add_cu_pkg();
// set_cm_table ();
// add_cm_pkg ();

// $pkg = com_query_all ( '4G全国组合_Call' );
// $pkg = pkg_query_tablename ( '4G全国套餐' );
// $pkg = com_query_all ( '4G自选套餐_Data' );
// $pkg = pkg_query_tablename ( '全球通商旅套餐' );
// foreach ( $pkg as $p ) {
// $p->display ();
// }

// $pkg = com_query_tablename('4G自选套餐_Data', 600);
// $pkg = com_query_tablename('4G全国组合_Call', 201);
// $pkg->display();

?>