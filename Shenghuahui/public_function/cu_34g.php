<?php
  include "simple_html_dom.php" ;
  require('../public_class/class_pkg.php');
  //include 'cu_composition.php';
  require('insrt.php');
  require('read.php');
  function extract_iphone($call,$data,$text){
	  $url ='http://localhost/info_pages/iPhone_plan.html';  
	  $url6 = 'http://info.10010.com/database/3gindex/3gfee/iPhone_plan.html'; 
	  $html = file_get_html($url);
      
// 	  $pkg_iphone[] = new Pkg();
// 	  array_keys($pkg_iphone);
	  $table = $html->find('table',0);
	  $length = 10;
	  for($i = 0 ; $i <$length; $i++){
	    $pkg_iphone[$i] = new Pkg('3G-iPhone', '3G', 'i', 0, 0, 0, 0, 0.2, 0.3, 0.1, 0);
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
	  foreach($e->find('td') as $td){
	    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
	      if(($td->colspan)>1){
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
//         foreach($pkg_iphone as $pkg){
//           $pkg->cal($call,$data,$text);
//         }
// 	$flag = find_cheapest($pkg_iphone,$call,$data,$text);
// 	return $pkg_iphone[$flag];
	insrt_db($pkg_iphone);
	//return $pkg_iphone;
  }

  function extract_a($call, $data, $text){
	  $url ='http://localhost/info_pages/3gfee_A_plan.html'; 
	  $url2 ='http://info.10010.com/database/3gindex/3gfee/A_plan.html';  
	  $html = file_get_html($url);

// 	  $pkg_a[] = new Pkg();
// 	  array_keys($pkg_a);
	  $table = $html->find('table',0);
	  $length = 11;
	  for($i = 0 ; $i <$length; $i++){
	    $pkg_a[$i] = new Pkg('3G-A', '3G', 'A', 0,0,0,0,0.2,0.3,0.1,0); 
	  }
	  // extract cost
	  $count = 0;
	  $e = $table->find('tr',0);
	  foreach($e->find('td') as $td){
	    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
	      $pkg_a[$count]->set_cost((float)$td->innertext);
	      $count ++;
	    }
	  }
	  //extract call
	  $count = 0 ;
	  $e = $table->find('tr',1);
	  foreach($e->find('td') as $td){
	    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
	      $pkg_a[$count]->set_pkg_call((int)$td->innertext);
	      $count ++;
	    }
	  }
	  //extract data
	  $count = 0;
	  $e = $table->find('tr',2);
	  foreach($e->find('td') as $td){
	    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
	      if((float)$td->innertext <20.0){
		 $pkg_a[$count]->set_pkg_data(((float)$td->innertext)*1024);
	      }else{
		$pkg_a[$count]->set_pkg_data((float)$td->innertext);
	      }
		$count ++;
	    }
	  }
	  //extract text
	  $count = 0;
	  $e = $table->find('tr',3);
	  foreach($e->find('td') as $td){
	    if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
	      $pkg_a[$count]->set_pkg_text((int)$td->innertext);
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
		    $pkg_a[$count]->set_over_call((float)$td->innertext);     
		    $count ++;
		  }
	      }else{
		$pkg_a[$count]->set_over_call((float)$td->innertext);
		$count ++;
	      }
	    }
	  }
     foreach($pkg_a as $pkg){
       $pkg->cal($call,$data,$text);
     }
     $flag = find_cheapest($pkg_a,$call,$data,$text);	 
     return $pkg_a[$flag];
  }

  function extract_b($call, $data, $text){
    $url ='http://localhost/info_pages/3gfee_B_plan.html';  
    $url2 ='http://info.10010.com/database/3gindex/3gfee/B_plan.html';  
    $html = file_get_html($url);

//     $pkg_b[] = new Pkg();
//     array_keys($pkg_b);
    $table = $html->find('table',0);
    //echo count($e->find('td');
    $length = 6;
    for($i = 0 ; $i <$length; $i++){
      $pkg_b[$i] = new Pkg('3G-B', '3G', 'B', 0, 0, 0, 0, 0.2, 0.3, 0.1, 0);
      //$pkg_b[$i]->init_all($i, 3, 'b', 1); 
    }
    // extract cost
    $count = 0;
    $e = $table->find('tr',0);
    foreach($e->find('td') as $td){
      if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
        $pkg_b[$count]->set_cost((float)$td->innertext);
        $count ++;
      }
    }
    //extract call
    $count = 0 ;
    $e = $table->find('tr',1);
    foreach($e->find('td') as $td){
      if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
        //$pkg_b[$count]->set_cost($td->innertext);
        $pkg_b[$count]->set_pkg_call((int)$td->innertext);
        $count ++;
      }
    } 
    //extract data
    $count = 0;
    $e = $table->find('tr',2);
    foreach($e->find('td') as $td){
      if(is_numeric($td->innertext)||(float)($td->innertext)!=0){
        if((float)$td->innertext <20.0){
           $pkg_b[$count]->set_pkg_data(((float)$td->innertext)*1024);
        }else{
          $pkg_b[$count]->set_pkg_data((float)$td->innertext);
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
              $pkg_b[$count]->set_over_call((float)$td->innertext);     
	      $count ++;
            }
        }else{
          $pkg_b[$count]->set_over_call((float)$td->innertext);
          $count ++;
        }
      }
    }
    foreach($pkg_b as $pkg){
       $pkg->cal($call,$data,$text);
    }
    $flag = find_cheapest($pkg_b,$call,$data,$text);
    //echo $flag;	 
    return $pkg_b[$flag];
  }

  function extract_c($call, $data, $text){
    $url6 = 'http://info.10010.com/database/3gindex/3gfee/C_plan.html';   
    $url ='http://localhost/info_pages/3gfee_C_plan.html';  
    $html = file_get_html($url);

//     $pkg_c[] = new Pkg();
//     array_keys($pkg_c);
    $table = $html->find('table',0);
    //echo count($e->find('td');
    $length = 3;
      for($i = 0 ; $i <$length; $i++){
      $pkg_c[$i] = new Pkg('3G-C', '3G', 'C', 0, 0, 0, 0, 0.2, 0.3, 0.1, 0);
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
    foreach($pkg_c as $pkg){
       $pkg->cal($call,$data,$text);
     }
    $flag = find_cheapest($pkg_c,$call,$data,$text);
    //echo $flag;	 
    return $pkg_c[$flag];
  }

  function extract_4n($call, $data, $text){
    $url6 = 'http://info.10010.com/database/4gindex/4gfee/4G_plan.html'; 
    $url = 'http://localhost/info_pages/4g_national.html';
    $html = file_get_html($url);

//     $pkg_4n[] = new Pkg();
//     array_keys($pkg_4n);
    $table = $html->find('table',0);
    //echo count($e->find('td');
    $length = 8;
    //echo $length.'</br>';
    for($i = 0 ; $i <$length; $i++){
      $pkg_4n[$i] = new Pkg('4G-Nation', '4G', 'n', 0, 0, 0, 50, 0.15, 0.3, 0.1, 0);
    }

    for($i = 0; $i < $length; $i++){
      $e = $table->find('tr',$i+2);
      $pkg_4n[$i]->set_cost((float)$e->find('td',0)->innertext);
      $pkg_4n[$i]->set_pkg_call((float)$e->find('td',1)->innertext);
      if((int)$e->find('td',2)->innertext<20){
         $pkg_4n[$i]->set_pkg_data(((int)$e->find('td',2)->innertext)*1024);
      }else{
        $pkg_4n[$i]->set_pkg_data((float)$e->find('td',2)->innertext);
      }
    } 
    foreach($pkg_4n as $pkg){
       $pkg->cal($call,$data,$text);
     }
    $flag = find_cheapest($pkg_4n,$call,$data,$text);
    //echo $flag;	 
    return $pkg_4n[$flag];
  }
/****************************************************/
//   echo 'hello2';
//   $p = extract_iphone(200, 100, 100);
//  $p = extract_a(200, 100, 100);
//   $p = extract_b(200, 100, 100);
//   $p = extract_c(200, 100, 100);
//   $p = extract_4n(200, 100, 100);
//   $p->display();
	extract_iphone(500, 200, 100);
	$pkg = read_db('3G', 'i');
	foreach($pkg as $p){
		$p->display();
	}
?>
