<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">
		<title>First Ajax</title>
		<link rel="stylesheet" type="text/css" href="ajaxStyle.css"/>
		<script type ="text/javascript" src="ajax_creat.js"></script>
		<script type="text/javascript">
			function goAjax(setAdd){
				var ajaxRequest = GetXmlHttpObject();
				if(ajaxRequest != false){
					ajaxRequest.onreadystatechange = function (){
						if(ajaxRequest.readyState==4){
							if(ajaxRequest.status==200){
								if(setAdd==0 ||setAdd==1 || setAdd==21 ||setAdd==22){
									document.getElementById("state").innerHTML=
									ajaxRequest.responseText;
								} else {
									document.getElementById("pkg_table").innerHTML=
										ajaxRequest.responseText;
								}
							}
						}
					}
// 					addpkg settable
					tablename = document.getElementById("pkgtable").value;
					ajaxRequest.open("GET",
							"http://localhost/Shenghuahui/public_function/admin/ajax_set.php?setAdd="+setAdd+
							"&tablename="+tablename+"&random="+Math.random()	
					);
					ajaxRequest.send(null);
				}
				else{
					alert("Browser problems!");
				}
			}
			function queryPkgAjax(){
				var ajaxRequest = GetXmlHttpObject();
				if(ajaxRequest != false){
					ajaxRequest.onreadystatechange = function (){
						if(ajaxRequest.readyState==4){
							if(ajaxRequest.status==200){
								document.getElementById("pkg_table").innerHTML=
									ajaxRequest.responseText;
							}
						}
					}
					tablename1 = document.getElementById("pkgtable").value;
					tablename2 = document.getElementById("comtable").value;
					ajaxRequest.open("GET",
							"http://localhost/Shenghuahui/public_function/admin/ajax_text.php?name1="+tablename1+
							"&name2="+tablename2+"&random="+Math.random()	
					);
					ajaxRequest.send(null);
				}
				else{
					alert("Browser problems!");
				}
			}
		</script>
	</head>
	<body>
		
		<form name="myForm">
		<h2>初始化套餐表</h2>
	   	    <input type="button" onClick="goAjax(1);" value ="初始化所有套餐表" name ="settable" id ="settable"/>
	   	<h2>清空套餐表</h2>
	   	    <input type="button" onClick="goAjax(0);" value ="清空所有套餐表" name ="emptytable" id ="emptytable"/>
		<h2>抓取套餐</h2>
			<input type="button" onClick="goAjax(21);" value ="抓取CM套餐" name ="addcmpkg" id ="addcmpkg"/>
			<input type="button" onClick="goAjax(22);" value ="抓取CU套餐" name ="addcupkg" id ="addcupkg"/>
			<p>
				<div id="state" class="divStyle">			
				</div>
			</p>
		</form>
		<h2>显示套餐</h2>
		<form name="myForm">
			<input type="text" placeholder ="一般套餐" name ="pkgtable" id ="pkgtable"/>
			<input type="button" onClick="goAjax(3);" value ="查询一般套餐" name ="pkgbutton" id ="pkgbutton"/>
			<input type="button" onClick="goAjax(4);" value ="查询组合套餐" name ="combutton" id ="combutton"/>
			<p>
				<div id="pkg_table" class="divStyle">
				
				</div>
			</p>
		</form>
	</body>
</html>