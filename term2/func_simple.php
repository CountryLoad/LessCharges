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
  // all important file here!
  include "simple_html_dom.php" ;
  $url ='http://localhost/info_pages/iPhone_plan.html';  
  $url1 ='http://localhost/info_pages/3gfee_A_plan.html';  
  $url2 ='http://localhost/info_pages/3gfee_B_plan.html';  
  $url3 ='http://localhost/info_pages/3gfee_C_plan.html';  
  $url4 ='http://localhost/info_pages/yu_plan.html';  
  $html = file_get_html($url);
  // remove all colspan >1 
  foreach($html->find('td[colspan]') as $element){
    $count = $element->colspan;
    // get length 0f colspan
    //echo $count;
    // get text between tags
    //echo '----'.$element->innertext;
    $element->colspan=1;
    $one = $element;
    //echo $one; 
    for($i=0; $i<$count-1; $i++){
      $one = $element.$one;
    }
    //echo $one;
    $element->outertext = $one;
    //echo '</br>';

  }
  //find all <td><p></p></td>
  // foreach($html->find('td p') as $element){
  // $element->outertext = '<td>'; 
   //echo $element.'</br>';
  //}

  // find all the tables
  foreach($html->find('table',0) as $element){
    echo $element.'</br>';
  }

  //find tr in table0
  $table = $html->find('table',0);
  foreach($table->find('tr') as $e){
    foreach($e->find('td') as $td){
      if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
        echo $td;
      }
    }
    echo '</br>';
  }
?>
  </body>
</html>
