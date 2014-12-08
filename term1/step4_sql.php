<html>
  <head>
    <title>
      We try to save and get details from mysql!
    </title>
  </head>
  <body>
    <?php
      $db = mysql_connect('localhost','root','20081010') or 
            die ('Unable to connect. Check your connection.');
      $query = 'CREATE DATABASE IF NOT EXISTS Service';
      mysql_query($query,$db) or die (mysql_error($db));
      mysql_select_db('Service',$db) or die(mysql_error($db));
      
      $query = 'CREATE TABLE chinaunicom (
		pkgID VARCHAR(255) NOT NULL,
		pkgLink VARCHAR(255) NOT NULL,
		picLink VARCHAR(255) NOT NULL,
		pkgData SMALLINT UNSIGNED NOT NULL DEFAULT 0,
		pkgMessage SMALLINT UNSIGNED NOT NULL DEFAULT 0,
		pkgCall SMALLINT UNSIGNED NOT NULL DEFAULT 0,	
		extraData DOUBLE NOT NULL DEFAULT 0,
		extraMessage DOUBLE NOT NULL DEFAULT 0.00,
		extraCall DOUBLE NOT NULL DEFAULT 0.00,
		pkgFee DOUBLE NOT NULL DEFAULT 0.00,
		ccc VARCHAR(20) NOT NULL,
		PRIMARY KEY (pkgID)
       )
       ENGINE=MyISAM';
      mysql_query($query,$db) or die (mysql_error($db));
     
      echo 'Service and ChinaUnicom successfully created!';
		
    ?>
  </body>
</html>
