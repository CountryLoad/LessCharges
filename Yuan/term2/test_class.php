<?php
  require('pkg_class.php');

  $pkg_3g = new Pkg();
  $pkg_3g->init_all();
  $pkg_3g->set_cost(66);
  $pkg_3g->set_pkg_call(50);
  $pkg_3g->set_pkg_data(300);
  $pkg_3g->set_pkg_text(240);
  $pkg_3g->set_over_data(0.3);
  $pkg_3g->set_over_call(0.2);
  $pkg_3g->set_over_text(0.1);
  echo 'The total cost is: '.$pkg_3g->cal(200,500,200);


?>
