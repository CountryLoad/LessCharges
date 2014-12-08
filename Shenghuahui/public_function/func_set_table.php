<?php
      function setTable_4c($pkg,$pkg_info){ 
        echo ' <div style="text-align: center;">';
        //echo '<h2>中国联通-哈尔滨-'.$pkg_info.'套餐</h2>';
	echo '<table border="1" >';
        echo '<tr>';
        echo '<td>套餐名称</td>';
	echo '<td>套餐类型1</td>';
	echo '<td>套餐类型2</td>';
	echo '<td>套餐花费</td>';
	echo '<td>套餐内国内通话/分钟</td>';
	echo '<td>套餐内国内数据流量/MB</td>';
	echo '<td>套餐内短信/条</td>';		
	echo '<td>套餐外国内通话(元/分钟)</td>';
	echo '<td>套餐外国内数据流量(元/KB)</td>';
	echo '<td>套餐外短信/条</td>';
	echo '<td>预期总花费</td>';
	echo '</tr>';
	
        echo '<tr>';
	echo '<td>'.$pkg->id.'</td>';
	echo '<td>'.$pkg->type1.'</td>';
	echo '<td>'.$pkg->type2.'</td>';
	echo '<td>'.$pkg->cost.'</td>';
	echo '<td>'.$pkg->pkg_call.'</td>';
	echo '<td>'.$pkg->pkg_data.'</td>';
	echo '<td>'.$pkg->pkg_text.'</td>';		
	echo '<td>'.$pkg->over_call.'</td>';
	echo '<td>'.$pkg->over_data.'</td>';
	echo '<td>'.$pkg->over_text.'</td>';
	echo '<td>'.$pkg->full_cost.'</td>';
	echo '</tr>';
	
        echo '</table>';
        echo '</div>';
        echo '<p style="color:red;">加入3G/4G网龄升级计划，次月起逐月多赠送50条短信，最多每月赠送300条,可抵扣短信费用哦 </p>';
	if($pkg->type2 == '沃派'){
	   echo '<p style="color:green;">4G沃派校园套餐需在校园基站范围内使用！</p>';       
	}
     }
?>
