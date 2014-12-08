<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="./iPhone_plan_files/table.css" rel="stylesheet" type="text/css">
<link href="./iPhone_plan_files/head.css" rel="stylesheet" type="text/css">
<script language="javascript" src="./iPhone_plan_files/basic.js"></script>
<meta charset="utf-8">
  </head>
  <body>
<?php
  include "simple_html_dom.php" ;
  require('pkg_class.php');

  $url6 = 'http://info.10010.com/database/4gindex/4gfee/4G_plan.html'; 
  $url = 'http://localhost/info_pages/4g_national.html';
  $html = file_get_html($url);

  $pkg_4n[] = new Pkg();
  array_keys($pkg_4n);
  $table = $html->find('table',0);
  //echo count($e->find('td');
  $length = 8;
  echo $length.'</br>';
  for($i = 0 ; $i <$length; $i++){
    $pkg_4n[$i] = new Pkg($i, 4, 'n', 0, 0, 0, 300, 0.15, 0.3, 0.1, 0);
    //$pkg_4n[$i]->init_all($i, 4, 'n', 1); 
  }

  for($i = 0; $i < $length; $i++){
    $e = $table->find('tr',$i+2);
    $pkg_4n[$i]->set_cost((float)$e->find('td',0)->innertext);
    $pkg_4n[$i]->set_pkg_call((float)$e->find('td',1)->innertext);
    if((int)$e->find('td',2)->innertext<20){
       $pkg_4n[$i]->set_pkg_data(((int)$e->find('td',2)->innertext)*1024);
       echo $pkg_4n[$i]->pkg_data;
    }else{
      $pkg_4n[$i]->set_pkg_data((float)$e->find('td',2)->innertext);
    }
  } 

  foreach($pkg_4n as $pkg){
    $pkg->display();
    echo $pkg->cal(500,200,100).'</br>';
  }
?>
  </body>
</html>
