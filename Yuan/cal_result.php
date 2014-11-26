<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
<?php
  require('func_phoneinfo.php');
  //require('pkg_class.php');
  require('extract_composition.php');
  require('func_set_table.php');
  require('func_get_extract.php');
  // better write to function
  $phonenumber=$_POST['phonenumber'];
  	//echo $phonenumber;
  $is_harbin = phoneinfo($phonenumber);
  // recommend!
  echo $is_harbin;
  
  echo '<hr><hr></br>';  
/** for local people **/ 
  // 4G local composition
  //var_dump( local_data(500)); 
  //var_dump(local_call(150));
  //var_dump(local_text(200));
  $pkg_lc =  local_compose(100, 50, 150);
  setTable_4c($pkg_lc,'4G-本地组合');
  // 3G C local composition 
  $pkg_c = extract_c(150,400,50);
  setTable_4c($pkg_c,'3G-C');
 
  echo '<hr><hr></br>';  
/** for business/travel **/
  // 4G national composition  
  //var_dump(national_data(1024));
  //var_dump(national_call(50));
  $pkg_nc = national_compose(150, 400, 50);
  setTable_4c($pkg_nc,'4G全国组合');
  
  $pkg_4n = extract_4n(150, 400, 50);
  setTable_4c($pkg_4n,'4G全国');
  // Best of 3G A/B
  $pkg_iphone = extract_iphone(150,400,50);
  setTable_4c($pkg_iphone,'3G-iPhone');
  $pkg_a = extract_a(150,400,50);
  setTable_4c($pkg_a,'3G-A');

  $pkg_b = extract_b(150,400,50);
  setTable_4c($pkg_b,'3G-B');
  // Best of 4G national pkg


  echo '<hr><hr></br>';  
/** for students **/
  // 4G wopai campus
  //require('extract_wo.php');
  //echo 'hello'; 
  $pkg_wopai = get_wo(100,50,150);
  setTable_4c($pkg_wopai,'4Gwopai');
  
?>
  </body>
</html>

