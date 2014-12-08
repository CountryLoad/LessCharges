<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
<?php
require('public_function/func_phoneinfo.php');
//require('pkg_class.php');
require('public_function/extract_composition.php');
require('public_function/func_set_table.php');
require('public_function/func_get_extract.php');
// better write to function
$phonenumber=$_POST['phonenumber'];
$data = $_POST['data'];
$call = $_POST['call'];
$text = $_POST['message'];
$is_harbin = phoneinfo($phonenumber);
// recommend!
echo '您的套餐需求为：电话--'.$call.'分钟 流量--'.$data.'M 短信--'.$text.'条'; 
if(is_harbin==1){
  echo '  系统推荐您使用本地套餐</br>';
} else {
  echo '  系统推荐您使用全国套餐</br>';
}
echo '<hr><hr></br>';  
/** for local people **/ 
// 4G local composition
//var_dump( local_data(500)); 
//var_dump(local_call(150));
//var_dump(local_text(200));
$pkg_lc =  local_compose($call, $data, $text);
//setTable_4c($pkg_lc,'4G-本地组合');
// 3G C local composition 
$pkg_c = extract_c($call,$data,$text);
//setTable_4c($pkg_c,'3G-C');

$pkg_local = array($pkg_lc, $pkg_c);
setTable_4c($pkg_local[find_cheapest($pkg_local)],'本地');
echo '适合人群:本地居民'; 

echo '<hr><hr></br></br>';  
/** for business/travel **/
// 4G national composition  
//var_dump(national_data(1024));
//var_dump(national_call(50));
$pkg_nc = national_compose($call, $data, $text);
//setTable_4c($pkg_nc,'4G全国组合');

$pkg_4n = extract_4n($call, $data, $text);
//setTable_4c($pkg_4n,'4G全国');
// Best of 3G A/B
$pkg_iphone = extract_iphone($call,$data,$text);
//setTable_4c($pkg_iphone,'3G-iPhone');
$pkg_a = extract_a($call, $data, $text);
//setTable_4c($pkg_a,'3G-A');

$pkg_b = extract_b($call, $data, $text);
//setTable_4c($pkg_b,'3G-B');
$pkg_national = array($pkg_nc, $pkg_4n, $pkg_iphone, $pkg_a, $pkg_b);
setTable_4c($pkg_national[find_cheapest($pkg_national)],'全国'); 
echo '适合人群:商务人士/教师（经常需要出差）'; 

echo '<hr><hr></br>';  
/** for students **/
// 4G wopai campus
//require('extract_wo.php');
//echo 'hello'; 
$pkg_wopai = get_wo($call, $data, $text);
//setTable_4c($pkg_wopai,'4Gwopai');
setTable_4c($pkg_wopai,'学生');
echo '适合人群:学生'; 
?>
  </body>
</html>

