<?php
	require_once("read_bill.php");
	echo 'hehe';
  	$bill = new BillAnalysis();
	$bill = bill_query_phonenumber('13515924846');
	$bill = bill_query_phonenumber('18345197824');
	$bill = bill_query_all();
	var_dump($bill);

?>
