<?php
  require("insert.php");
	//echo 'haha';
	$feedback = new Feedback("小张", "13515924846", "good job");
	$feedback->display();
    //var_dump($feedback);
	add_feedback($feedback);
	//echo 'hehe';
?>
