<?php
  require('class_feedback.php');
  $feedback = new Feedback('Yuan', '15663403081', 'Excellent');
  $feedback->display();
  
  require('../public_class/class_pkg.php');
  $pkg_3g = new Pkg();
  $pkg_3g->init_all();
  $pkg_3g->display();
 
  $pkg_3g->set_cost(66);
  $pkg_3g->set_pkg_call(160);
  $pkg_3g->set_pkg_data(220);
  $pkg_3g->set_pkg_text(50);
  $pkg_3g->set_over_data(0.3);
  $pkg_3g->set_over_call(0.2);
  $pkg_3g->set_over_text(0.1);
  echo 'The total cost is: '.$pkg_3g->cal(500,200,100);

?>
