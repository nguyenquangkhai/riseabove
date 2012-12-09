<? 
include('config.php');
$con = mysql_connect($_host,$_username,$_password);
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}else{
	mysql_select_db($_database, $con);
}
