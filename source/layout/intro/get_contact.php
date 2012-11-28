<?php
$con = mysql_connect("localhost","root","");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
if($_POST['phone'] != null && $_POST['email'] != null){
	mysql_select_db("riseabove", $con);

	$sql="INSERT INTO order_contact (phone, email, addtime)	VALUES	('$_POST[phone]','$_POST[email]',NOW())";
	
	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
	  mysql_close($con);
	echo "ok";
}else{
	echo "fail";
}
?>