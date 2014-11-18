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
  $url ='http://localhost/info_pages/iPhone_plan.html';  
  $url1 ='http://localhost/info_pages/3gfee_A_plan.html';  
  $url2 ='http://localhost/info_pages/3gfee_B_plan.html';  
  $url3 ='http://localhost/info_pages/3gfee_C_plan.html';  
  $url4 ='http://localhost/info_pages/yu_plan.html';  
  $html = file_get_html($url);
  
  foreach($html->find('td[colspan]') as $element){
    $count = $element->colspan;
    echo $count;
    echo '----'.$element->innertext;
    $element->colspan=1;
    $one = $element;
    //echo $one; 
    for($i=0; $i<$count-1; $i++){
      $one = $element.$one;
    }
    echo $one;
    $element->outertext = $one;
    echo '</br>';

  }
  foreach($html->find('table') as $element){
    echo $element.'</br>';
  }
?>
  </body>
</html>
