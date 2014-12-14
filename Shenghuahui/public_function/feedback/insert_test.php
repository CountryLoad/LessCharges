<?php
  	require_once("add_feedback.php");
	//echo 'haha';
	$feedback1 = new Feedback("小张", "13515924846", "good job");
	$feedback2 = new Feedback("小袁", "13515924846", "haha");
	$feedback = array($feedback1, $feedback2);
    var_dump($feedback);
	add_feedback($feedback);
	//echo 'hehe';
?>
