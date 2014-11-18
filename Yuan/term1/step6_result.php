<?php
	echo 'All right';
	$db = mysql_connect('localhost','root','20081010') or
           die ('Unable to connect. Check your connection parameters.');
        mysql_select_db('Service',$db) or die (mysql_error($db));

        $query = 'SELECT * FROM chinaunicom';
        $result = mysql_query($query, $db) or die (mysql_error($db));     
	echo '<table>';
	while ($row = mysql_fetch_array($result)) {
	  echo '<tr>';
	  echo '<td>'.$row[pkgID].'</td>';
	  echo '<td>';
	  echo '<a href="'.$row[1].'">';
          echo '<img src="'.$row[2].'">';
          echo '</a>';
	  echo '</td>';
	  // post $ is all right
	   //echo ($_POST['Call0']+0);
	  $_POST['Data1'] += 0;
	  $_POST['Message1'] += 0;
	  $_POST['Call1'] += 0;
          
	  echo 'You have Data:'.' '.$_POST['Data1'].'</br>';
	  echo 'You have Messages:'.' '.$_POST['Message1'].'</br>';
	  echo 'You have Calls:'.' '.$_POST['Call1'].'</br>';
	  $money = 0 ;
	  echo $money;
	  for($i=3;$i<10;$i++){
	  	echo '<td>'.$row[$i].'</td>';
	  }
	  $money = ($_POST['Data1']-$row['pkgData'])*$row['extraData'] +
		 ($_POST['Message1']-$row['pkgMessage'])*$row['extraMessage'] +
		 ($_POST['Call1']-$row['pkgCall'])*$row['extraCall'] +
		$row['pkgfee'];
	  echo '<td>'.$money.'</td>';
	  echo '</tr>';
	}
	echo '</table>';
?>
