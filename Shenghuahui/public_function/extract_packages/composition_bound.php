<?php
/**
 * 计算上下区间()
 * @param unknown $pkg_cdt
 */
function cal_UpLow($pkg_cdt) {
	$len = count ( $pkg_cdt );
	// i-1 upper i lower
	for($i = 1; $i < $len; $i ++) {
		$upper = ($pkg_cdt [$i]->price - $pkg_cdt [$i - 1]->price) / $pkg_cdt [$i - 1]->over_cost + $pkg_cdt [$i - 1]->volume;
		$pkg_cdt [$i - 1]->upper = ( int ) $upper;
		$pkg_cdt [$i]->lower = $pkg_cdt [$i - 1]->upper;
	}
}
?>