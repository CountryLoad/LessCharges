<?php
	require_once ('public_class/class_feedback.php');
	require_once ('public_function/feedback/add_feedback.php');
	require_once ('public_function/feedback/read_feedback.php');
	echo 'feedback here!';
	$user = $_POST ['user'];
	$phone = $_POST ['phone'];
	$feed_info = $_POST ['feed_info'];
	$feed = new Feedback($user, $phone, $feed_info);
	add_feedback($feed);
	$feed1=fb_query_all();
	$feed1->display();
?>