<?php
//   require('../public_class/class_pkg.php');
/***** local composition*****/
  function local_compose($call, $data, $text){   
    $pkg_lc = new Pkg('4G本地组合', '4G', '本地组合', 0,0,0,0,0.15,0.3,0.1);
    $call_cost = local_call($call);
    $data_cost = local_data($data);
    $text_cost = local_text($text);
    $pkg_lc->cost = $call_cost[0] + $data_cost[0] + $text_cost[0] ;
    $pkg_lc->pkg_call = $call_cost[1];
    $pkg_lc->pkg_data = $data_cost[1];
    $pkg_lc->pkg_text = $text_cost[1];  
    $pkg_lc->full_cost= $call_cost[2] + $data_cost[2] + $text_cost[2];    
    //$pkg_lc->display(); 
    return $pkg_lc;
   
  }
  // cal local_data
  function local_data($data){
    // three elements cost, amount, actuall_expense
    $data_cost = array(0,0,0);
    if($data < 176){
      $data_cost[0] = 8;
      $data_cost[1] = 150;
    } elseif ($data >= 176 && $data < 476){
      $data_cost[0] = 16;
      $data_cost[1] = 450;
    } elseif ($data >= 476 && $data < 776){
      $data_cost[0] = 24;
      $data_cost[1] = 750;
    } elseif ($data >= 776 && $data <= 1536){
      $data_cost[0] = 48;
      $data_cost[1] = 1536;
    } else {
      $data_cost[0] =  48;
      $data_cost[1] = 1536;
    } 
    if($data_cost[1] < $data){
      $data_cost[2] = $data_cost[0] + 0.3 * ($data-$data_cost[1]);
    } else {
      $data_cost[2] = $data_cost[0];
    }
    return $data_cost;
  }
  // cal local_call
  function local_call($call){
    //$pkg_call = ($call_cost - 8)/8 *300 +150 ;
    $call_cost = array(0,0,0);
    // default have this part
    if($call < 86){
      $call_cost[0] = 6;
      $call_cost[1] = 60;
    } elseif ($call >= 86 && $call < 166){
      $call_cost[0] = 10;
      $call_cost[1] = 100;
    } elseif ($call >= 166 && $call <= 200){
      $call_cost[0] = 20;
      $call_cost[1] = 200;
    } else {
      $call_cost[0] =  20;
      $call_cost[1] = 200;
    } 
    if($call_cost[1] < $call){
      $call_cost[2] = $call_cost[0] + 0.15 * ($call-$call_cost[1]);
    } else {
      $call_cost[2] = $call_cost[0];
    }
    return $call_cost;
  } 
  // cal local_text
  function local_text($text){
    //$pkg_text = ($text_cost - 8)/8 *300 +150 ;
    $text_cost = array(0,0,0);
    if($text < 100){
      $text_cost[0] = 0;
      $text_cost[1] = 0;
    } elseif ($text >= 100 && $text < 300){
      $text_cost[0] = 10;
      $text_cost[1] = 200;
    } elseif ($text >= 300 && $text < 500){
      $text_cost[0] = 20;
      $text_cost[1] = 400;
    } else {
      $text_cost[0] =  30;
      $text_cost[1] = 600;
    } 
    if($text_cost[1] < $text){
      $text_cost[2] = $text_cost[0] + 0.1 * ($text-$text_cost[1]);
    } else {
      $text_cost[2] = $text_cost[0];
    }
    return $text_cost;
  }


/***** national composition*****/  
  function national_compose($call, $data, $text){   
    $pkg_nc = new Pkg('4g全国组合', '4G', '全国组合', 0,0,0,0,0.15,0.2,0.1);
    $call_cost = national_call($call);
    $data_cost = national_data($data);
    $text_cost = national_text($text);
    $pkg_nc->cost = $call_cost[0] + $data_cost[0] + $text_cost[0] ;
    $pkg_nc->pkg_call = $call_cost[1];
    $pkg_nc->pkg_data = $data_cost[1];
    $pkg_nc->pkg_text = $text_cost[1]; 
    $pkg_nc->full_cost= $call_cost[2] + $data_cost[2] + $text_cost[2];     
    //$pkg_nc->display(); 
    return $pkg_nc;
   
  }
  
  function national_data($data){
    $data_cost = array(0,0,0);
    if($data < 140){
      $data_cost[0] = 8;
      $data_cost[1] = 100;
    } elseif ($data >= 140 && $data < 340){
      $data_cost[0] = 16;
      $data_cost[1] = 300;
    } elseif ($data >= 340 && $data < 620){
      $data_cost[0] = 24;
      $data_cost[1] = 500;
    } elseif ($data >= 620 && $data < 1144){
      $data_cost[0] = 48;
      $data_cost[1] = 1024*1;
    } elseif ($data >= 1144 && $data < 2168){
      $data_cost[0] = 72;
      $data_cost[1] = 1024*2;
    } elseif ($data >= 2168 && $data < 3192){
      $data_cost[0] = 96;
      $data_cost[1] = 1024*3;
    } elseif ($data >= 3192 && $data < 4256){
      $data_cost[0] = 120;
      $data_cost[1] = 1024*4;
    } elseif ($data >= 4256 && $data < 6544){
      $data_cost[0] = 152;
      $data_cost[1] = 1024*6;
    } elseif ($data >= 6544 && $data < 11*1024){
      $data_cost[0] = 232;
      $data_cost[1] = 1024*11;
    } else {
      $data_cost[0] =  232;
      $data_cost[1] = 1024*11;
    } 
    if($data_cost[1] < $data){
      $data_cost[2] = $data_cost[0] + 0.2 * ($data-$data_cost[1]);
    } else {
      $data_cost[2] = $data_cost[0];
    }
    return $data_cost;
  }


  function national_call($call){
    $call_cost = array(0,0,0);
    // default have this part only for businness people
    if($call < 130){
      $call_cost[0] = $call*0.2+6;
      $call_cost[1] = $call;
    } elseif ($call >= 130 && $call < 253){
      $call_cost[0] = 32;
      $call_cost[1] = 200;
    } elseif ($call >= 253 && $call <= 406){
      $call_cost[0] = 40;
      $call_cost[1] = 300;
    } elseif ($call >= 406 && $call <= 873){
      $call_cost[0] = 56;
      $call_cost[1] = 500;
    } elseif ($call >= 873 && $call <= 1320){
      $call_cost[0] = 112;
      $call_cost[1] = 1000;
    } elseif ($call >= 1320 && $call <= 2533){
      $call_cost[0] = 160;
      $call_cost[1] = 2000;
    } elseif ($call >= 2533 && $call <= 3000){
      $call_cost[0] = 240;
      $call_cost[1] = 3000;
    } else {
      $call_cost[0] =  240;
      $call_cost[1] = 3000;
    } 
    // default choose call part
    // if not choose laidianxianshi
    if($call_cost[1] < $call){
      $call_cost[2] = $call_cost[0] + 0.15 * ($call-$call_cost[1]);
    } else {
      $call_cost[2] = $call_cost[0];
    }
    return $call_cost;
  } 

  function national_text($text){
    $text_cost = array(0,0,0);
    if($text < 100){
      $text_cost[0] = 0;
      $text_cost[1] = 0;
    } elseif ($text >= 100 && $text < 300){
      $text_cost[0] = 10;
      $text_cost[1] = 200;
    } elseif ($text >= 300 && $text < 500){
      $text_cost[0] = 20;
      $text_cost[1] = 400;
    } else {
      $text_cost[0] =  30;
      $text_cost[1] = 600;
    } 
    if($text_cost[1] < $text){
      $text_cost[2] = $text_cost[0] + 0.1 * ($text-$text_cost[1]);
    } else {
      $text_cost[2] = $text_cost[0];
    }
    return $text_cost;
  }
/***** wopai *****/
   function find_cheapest($pkgs,$call,$data,$text){
   $flag = 0;
   $count= 0;
   $cheap = 100000.0;
   foreach($pkgs as $pkg){
     // cal full_cost
     //$now = $pkg->cal($call,$data,$text);
     $now = $pkg->full_cost;
     if($now < $cheap){
	$cheap = $now ;
        $flag = $count;
     }  
     $count++;
   }
   return $flag;
 }
 
 function get_wo($call, $data, $text){
   $pkg_wo[0] = new Pkg('4G沃派校园','4G', '沃派', 16,100,200,0,0.15,0.3,0.1,0);
   $pkg_wo[1] = new Pkg('4G沃派校园','4G', '沃派', 26,100,600,0,0.15,0.3,0.1,0);
   $pkg_wo[2] = new Pkg('4G沃派校园','4G', '沃派', 36,100,1024,0,0.15,0.3,0.1,0);
   foreach($pkg_wo as $pkg){
       $pkg->cal($call,$data,$text);
   }
   $flag = find_cheapest($pkg_wo, $call, $data, $text);
   //$pkg_wo[$flag]->cost = $pkg_wo[$flag]->cal($call,$data,$text);
   return $pkg_wo[$flag]; 
 }
/****test composition ****/
//  echo 'nihao';
//  $p = get_wo(200, 100, 100);
//  $p = local_compose(200, 100, 100);
//  $p = national_compose(200, 100, 100);
//  $p->display();
 
?>
