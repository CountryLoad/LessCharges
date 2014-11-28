   <?php
        $db = mysql_connect('localhost','root','20081010') or
           die ('Unable to connect. Check your connection parameters.');
        mysql_select_db('Service',$db) or die (mysql_error($db));

        $query = 'SELECT * FROM chinaunicom';
        $result = mysql_query($query, $db) or die (mysql_error($db));
	
	echo '<table >';
        while ($row = mysql_fetch_array($result)) {
         // extract($row);
         // echo $pkgID.'-'.$pkgLink.$picLink.'-'.
         //       $pkgData.'-'.$pkgMessage.'-'.$pkgCall.'-'.
         //       $extraData.'-'.$extraMessage.'-'.$extraCall.'-'.
         //      $pkgFee.'-'.$ccc;
	   
	 //   echo '<tr>' ;	    
	 //   foreach ($row as $value) {
       	 //	echo '<td>'.$value.'</td>';
	 //   }
	 //   echo '</tr>';

	
	  echo '<tr>';
	  echo '<td>'.$row[pkgID].'</td>';
	  echo '<td>';
	  echo '<a href="'.$row[1].'">';
          echo '<img src="'.$row[2].'">';
          echo '</a>';
	  echo '</td>';
	  for($i=3;$i<10;$i++){
	  	echo '<td>'.$row[$i].'</td>';
	  }
	  //$i=0;
	  //while($i<9){
	  //	echo '<td>'.$row[$i].'</td'>;
	  //	$i++;
          //}
	  echo '</tr>';
        }
	echo '</table>';
	echo '</br>';
	echo 'Read data successfully!';
   ?>

