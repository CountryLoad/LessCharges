<?php
 	 require_once("add_bill.php");
	//echo 'haha';
	$bill1 = new BillAnalysis("13515924846", "移动3G36元A套餐", 300, 300, 68);
	$bill2 = new BillAnalysis("18345197824", "移动3G36元A套餐", 300, 60, 68);
	$bill = new BillAnalysis();
	$bill = array($bill1, $bill2);
    var_dump($bill);
	add_bill($bill);
	//echo 'hehe';
?>
