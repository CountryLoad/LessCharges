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
  $url ='http://localhost/info_pages/iPhone_plan.html';  
  $url6 = 'http://info.10010.com/database/3gindex/3gfee/iPhone_plan.html'; 
  $html = file_get_html($url);
  // remove all colspan >1 
  /*foreach($html->find('td[colspan]') as $element){
    $count = $element->colspan;
    $two = '<td>'.(float)$element->innertext.'</td>';
    echo $two;    
    $one = &$element;
    $one = '<td>'.(float)$element->innertext.'</td>';
    for($i=0; $i<$count-1; $i++){
      $element = $element.$one;
    }
    //echo $one;
    //$element->outertext = $one;
    echo $element;
    echo '</br>';
  }
  */
  $pkg_iphone[] = new Pkg();
  array_keys($pkg_iphone);
  $table = $html->find('table',0);
  //echo count($e->find('td');
  $length = 10;
  echo $length.'</br>';
  for($i = 0 ; $i <$length; $i++){
    $pkg_iphone[$i] = new Pkg($i, 3, 'i', 0, 0, 0, 0, 0, 0.3, 0.1, 0);
    //$pkg_iphone[$i]->init_all($i, 3, 'i', 0); 
  }
  // extract cost
  $count = 0;
  $e = $table->find('tr',0);
  foreach($e->find('td') as $td){
    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
      $pkg_iphone[$count]->set_cost((float)$td->innertext);
      $count ++;
    }
  }
  //extract call
  $count = 0 ;
  $e = $table->find('tr',1);
  foreach($e->find('td') as $td){
    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
      //$pkg_iphone[$count]->set_cost($td->innertext);
      $pkg_iphone[$count]->set_pkg_call((int)$td->innertext);
      $count ++;
    }
  }
  //extract data
  $count = 0;
  $e = $table->find('tr',2);
  foreach($e->find('td') as $td){
    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
      if((float)$td->innertext <20.0){
         $pkg_iphone[$count]->set_pkg_data(((float)$td->innertext)*1024);
      }else{
        $pkg_iphone[$count]->set_pkg_data((float)$td->innertext);
      }
        $count ++;
    }
  }
  //extract text
  $count = 0;
  $e = $table->find('tr',3);
  foreach($e->find('td') as $td){
    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
      $pkg_iphone[$count]->set_pkg_text((int)$td->innertext);
      $count ++;
    }
  }
  // extract over_call
  $count = 0;
  $e = $table->find('tr',5);
  //echo $e;
  foreach($e->find('td') as $td){
    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
     //echo $td;
     // echo $count.'</br>';
      if(($td->colspan)>1){
          echo 'nihao';
          for($i = 0;$i<$td->colspan; $i++){
            $pkg_iphone[$count]->set_over_call((float)$td->innertext);     
	    $count ++;
          }
      }else{
        $pkg_iphone[$count]->set_over_call((float)$td->innertext);
        $count ++;
      }
    }
  }
  foreach($pkg_iphone as $pkg){
    $pkg->display();
    echo $pkg->cal(500,200,100).'</br>';
  }
  var_dump( $pkg_iphone[5]);//->cal(200,500,200).'</br>';
  echo $pkg_iphone[5]->cal(500,200,100);
  $things = array_keys($html->find('td[colspan]'));
  echo count($things);
?>
  </body>
</html>
