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
  
  $url6 = 'http://info.10010.com/database/3gindex/3gfee/C_plan.html';   
  $url ='http://localhost/info_pages/3gfee_C_plan.html';  
  $html = file_get_html($url);

  $pkg_c[] = new Pkg();
  array_keys($pkg_c);
  $table = $html->find('table',0);
  //echo count($e->find('td');
  $length = 3;
  echo $length.'</br>';
  for($i = 0 ; $i <$length; $i++){
    $pkg_c[$i] = new Pkg($i, 3, 'c', 0, 0, 0, 0, 0, 0.3, 0.1, 0);
    //$pkg_c[$i]->init_all($i, 3, 'c', 1); 
  }
  // extract cost
  $count = 0;
  $e = $table->find('tr',0);
  foreach($e->find('td') as $td){
    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
      $pkg_c[$count]->set_cost((float)$td->innertext);
      $count ++;
    }
  }
  //extract call
  $count = 0 ;
  $e = $table->find('tr',1);
  foreach($e->find('td') as $td){
    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
      //$pkg_c[$count]->set_cost($td->innertext);
      $pkg_c[$count]->set_pkg_call((int)$td->innertext);
      $count ++;
    }
  }
  //extract data
  $count = 0;
  $e = $table->find('tr',2);
  foreach($e->find('td') as $td){
    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
      if((float)$td->innertext <20.0){
         $pkg_c[$count]->set_pkg_data(((float)$td->innertext)*1024);
      }else{
        $pkg_c[$count]->set_pkg_data((float)$td->innertext);
      }
        $count ++;
    }
  }

  // extract over_call
  $count = 0;
  $e = $table->find('tr',4);
  foreach($e->find('td') as $td){
    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
      if(($td->colspan)>1){
          for($i = 0;$i<$td->colspan; $i++){
            $pkg_c[$count]->set_over_call((float)$td->innertext);     
	    $count ++;
          }
      }else{
        $pkg_c[$count]->set_over_call((float)$td->innertext);
        $count ++;
      }
    }
  }
   // extract over_data
  /*
  $count = 0;
  $e = $table->find('tr',5);
  foreach($e->find('td') as $td){
    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
      if(($td->colspan)>1){
          for($i = 0;$i<$td->colspan; $i++){
            $pkg_c[$count]->set_over_call((float)$td->innertext);     
	    $count ++;
          }
      }else{
        $pkg_c[$count]->set_over_call((float)$td->innertext);
        $count ++;
      }
    }
  }
  */

  foreach($pkg_c as $pkg){
    $pkg->display();
    echo $pkg->cal(500,200,100).'</br>';
  }
?>
  </body>
</html>
