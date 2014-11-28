<html>
  <head>
   <title>
	try to show img
   </title>
  </head>
  <body>
    <img src="123.jpg"/>
    <?php
	$db = mysql_connect('localhost','root','20081010') or
	   die ('Unable to connect. Check your connection parameters.');
	mysql_select_db('Service',$db) or die (mysql_error($db));
	
	$query = 'INSERT INTO chinaunicom (
		pkgID, pkgLink, picLink,
	        pkgData, pkgMessage, pkgCall,
		extraData, extraMessage, extraCall,
		pkgFee, ccc)
		VALUES
		   ("971408275209",
		"http://www.10010.com/goodsdetail/971408275209.html",
		"http://res.mall.10010.com/mall/res/uploader/temp/201409021416431421093424_160_160.jpg",
		200,100,100,0.3,0.1,0.15,16,"cu")';
	mysql_query($query,$db) or die (mysql_error($db));
	echo 'Data inserted successfully';
    ?>
  </body>
</html>

