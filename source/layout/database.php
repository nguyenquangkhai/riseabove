<? 
include('config.php');
$con = mysql_connect($_host,$_username,$_password);
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}else{
	mysql_select_db($_database, $con);
	mysql_query("SET character_set_results=utf8", $con);
	mb_language('uni');
	mb_internal_encoding('UTF-8');
	mysql_query("set names 'utf8'",$con);
}
