<?php
	require_once("read_feedback.php");
	echo 'hehe';
  	$feedback = new Feedback();
	/*$feedback = fb_query_feed_time('2014/12/12');
	var_dump($feedback);*/
	$feedback = fb_query_phonenumber('13515924846');
	var_dump($feedback);
	/*$feedback = fb_query_all();
	var_dump($feedback);*/

?>
