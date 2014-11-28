<hmtl>
  <head>
    <title> This is the first step </title>
  </head>
  <body>
    <p>Hello Sus!</p>
	<?php
	  echo 'HelloWorld by Sus!';
	  echo '</br>';
	  echo "<a href=\"test.php\">";
	  echo 'See detail of php!';
	  echo "</a>";
	  echo '</br>';
	  echo 'See the photo below';
	  echo '<img src="/star.jpg">';
	  echo '</img>';
	  $Package = array('Liuliang' => 500,
			    'Call' => 50,
			   'Message' =>100 );
	  echo '<a href="step3.php">';
	  echo 'sent your request';
 	  echo '</a>';
	  echo '</br>';
          $link = 'http://www.10010.com/goodsdetail/971408275210.html';
	  echo '<a href="';
          echo $link;
 	  echo '">';
	  echo 'ChinaUnicom';
          echo '<img src="http://res.mall.10010.com/mall/res/uploader/temp/20140902141712-17909232_310_310.jpg">';
          echo '</a>';

	?> 
  </br>
  <form method="POST" action="step3.php">
	<input value="Liuliang" name="Liuliang" >
	<input value="Message" name="Message" >
	<input type="submit" value="SUBMIT">
  </form>
	<img src="star.png" />
 </body>
</html>
