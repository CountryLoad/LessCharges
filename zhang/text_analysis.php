<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
	function analysis_text($text) {
	//echo $text;		//打印短信
	preg_match_all('/(\d+)(\.?)(\d*)/is', $text, $arr);  //文本解析
	var_dump($arr[0]);	//输出匹配结果
	$call =  (int)$arr[0][1];		//目前打电话时长
	$data = (float)$arr[0][4];		//目前花费流量
	$text = (int)$arr[0][7];		//目前发送短信
	$date = (int)date('d',$time);	//今天日期
	$use[0] = (int)($call * 30 / $date);	//预计当月打电话时长
	$use[1] = $data * 30 / $date;			//预计当月花费流量
	$use[2] = (int)($text * 30 / $data);	//预计当月发送短信
	//var_export($use);						//打印预计消费情况
	return $use;							//返回预计消费情况
}
?>

