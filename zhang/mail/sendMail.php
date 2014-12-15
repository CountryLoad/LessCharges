<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd";>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
require_once('sendEmail.class.php');

if((isset($_POST["send"]))&&($_POST["send"]=="form1"))
{

  //获取收件人地址
  $sendto=$_POST['txt1']; 
  $sendfrom="shenghuahui2014@163.com";
  $mailpass="xyz2014";
  $mailserver="smtp.163.com";
  $subject=$_POST['txt3'];
  $message =$_POST['textarea'];
	$sm = new smail( $sendfrom, $mailpass, $mailserver);
	$end = $sm->send( $sendto, $sendfrom, $subject, $message );
	if( $end ) echo $end;
	else echo "<script>alert('发送成功');</script>";

}
?>

<body>
<center>
<form style="width:524px; height:107px;"  method="post" name="form1" id="form1" action="">
<table width="524" height="107" border="0" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td height="60" colspan="2" align="center" valign="middle" bgcolor="#999999"><font color="#339933" size="+4" face="隶书"><strong>发送电子邮件</strong></font></td>
  </tr>
  <tr>
    <td width="109" height="44" align="left" valign="middle" bgcolor="#CCCC99"><strong><font size="5">收件人：</font></strong></td>
    <td width="405" align="left" valign="middle" bgcolor="#CCCC99"><input type="text" name="txt1"/></td>
  </tr>
  <tr>
    <td height="44" align="left" valign="middle" bgcolor="#99CCFF"><strong><font size="5">主题：</font></strong></td>
    <td valign="middle" bgcolor="#99CCFF"><input type="text" name="txt3""/></td>
  </tr>
  <tr>
    <td height="163" align="left" valign="middle" bgcolor="#66CCFF"><strong><font size="5">内容：</font></strong></td>
    <td valign="top" bgcolor="#66CCFF"><textarea name="textarea" style="width:405px; height:163px"></textarea></td>
  </tr>
 
  <tr>
    <td height="37" colspan="2" align="center" valign="middle" bgcolor="#6699CC"><input type="submit" value="发送"/></td>
  </tr>
</table>
<input type="hidden" name="send" value="form1"/>
<Br>
<a href="http://www.baidu.com"><button type="button">去百度</button></a>
</form>
</center>
</body>
</html>

