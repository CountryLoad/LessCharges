<?php
	require_once ('../../public_class/class_feedback.php');
	echo 'hehe';
	/*$feedback = fb_query_feed_time('2014/12/12');
	var_dump($feedback);*/
	$feedback = fb_query_all();
	var_dump($feedback);
	/*$feedback = fb_query_all();
	var_dump($feedback);*/

?>
