<?php
  //require("pkg_class.php");
  require("insrt.php");
/*  $pkg_3g = new Pkg();
  $pkg_3g->init_all('55555', '4G', 'A', 1);
  $pkg_3g->display();
     var_dump($pkg_3g);
  $pkg_3g->set_cost(66);
  $pkg_3g->set_pkg_call(160);
  $pkg_3g->set_pkg_data(220);
  $pkg_3g->set_pkg_text(50);
  $pkg_3g->set_over_data(0.3);
  $pkg_3g->set_over_call(0.2);
  $pkg_3g->set_over_text(0.1);
  echo 'The total cost is: '.$pkg_3g->cal(500,200,100);*/


$pkg0 = new Pkg();
    //$pkg0->init_all();
    
	$pkg0->id = '1';
	$pkg0->type1 = '3G';		
	$pkg0->type2 = 'A';		
	$pkg0->cost = 46;			
	$pkg0->pkg_call = 50;	
	$pkg0->pkg_data = 150; 	
	$pkg0->pkg_text = 0;
	$pkg0->over_call = 0.25;	
	$pkg0->over_data = 0.0003;	
	$pkg0->over_text = 0.10;	
	$pkg0->extra = 2; 
	$pkg1 = new Pkg();
	$pkg1->id = '2';		
	$pkg1->type1 = '4G';		
	$pkg1->type2 = '10';		
	$pkg1->cost = 76;			
	$pkg1->pkg_call = 200;	
	$pkg1->pkg_data = 400; 	
	$pkg1->pkg_text = 0;
	$pkg1->over_call = 0.15;	
	$pkg1->over_data = 60;	
	$pkg1->over_text = 0.10;	
	$pkg1->extra = 1;	
	$pkg = new Pkg();
    $pkg = array($pkg0, $pkg1);
	insrt_db($pkg);
	echo 'hehe';
?>
