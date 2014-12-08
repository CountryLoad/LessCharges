<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">

</head>
<body>
<?php
// http://localhost/info_pages/4g_national.html
require ('public_function/api_phoneinfo.php');
require('public_class/class_pkg.php');
require ('public_function/cu_composition.php');
require ('public_function/func_set_table.php');
// require('http://localhost/Shenghuahui/public_function/cu_34g.php');
require ('public_function/cu_34g.php');
//better write to function
$phonenumber = $_POST ['phonenumber'];
$data = $_POST ['data'];
$call = $_POST ['call'];
$text = $_POST ['message'];
$is_harbin = phoneinfo ( $phonenumber );
// recommend!
echo '您的套餐需求为：电话--' . $call . '分钟 流量--' . $data . 'M 短信--' . $text . '条';
echo '</br>';
if (is_harbin == 1) {
	echo '  系统推荐您使用本地套餐</br>';
} else {
	echo '您处于漫游状态，系统推荐您使用全国套餐</br>';
}
echo '<hr><hr></br>';
/**
 * for local people *
 */
echo '适合人群:本地居民';
$pkg_lc = local_compose ( $call, $data, $text );
$pkg_c = extract_c ( $call, $data, $text );
$pkg_local = array (
		$pkg_lc,
		$pkg_c 
);
setTable_4c ( $pkg_local [find_cheapest ( $pkg_local )], '本地' );

echo '<hr><hr></br>';
/**
 * for business/travel *
 */
echo '适合人群:商务人士/教师（经常需要出差）';
$pkg_nc = national_compose ( $call, $data, $text );
$pkg_4n = extract_4n ( $call, $data, $text );
$pkg_iphone = extract_iphone ( $call, $data, $text );
$pkg_a = extract_a ( $call, $data, $text );
$pkg_b = extract_b ( $call, $data, $text );
$pkg_national = array (
		$pkg_nc,
		$pkg_4n,
		$pkg_iphone,
		$pkg_a,
		$pkg_b 
);
setTable_4c ( $pkg_national [find_cheapest ( $pkg_national )], '全国' );

echo '<hr><hr></br>';
/**
 * for students *
 */
echo '适合人群:学生';
$pkg_wopai = get_wo ( $call, $data, $text );
setTable_4c ( $pkg_wopai, '学生' );

?>
  </body>
</html>

