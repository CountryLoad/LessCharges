<?php
	require("read.php");
	echo 'hehe';
  	$feedback = new Feedback();
	//$feedback = query_feed_time('2014/12/09');
	//var_dump($feedback);
	$feedback = query_phonenumber('13515924846');
	var_dump($feedback);

?>
