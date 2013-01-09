<?php
include('config.php');
$org_url='';
$redirect_url='';

//get original URL
function selfURL() { $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); return $protocol."://".$_SERVER['SERVER_NAME'].$port.'/trangchu.php'; } function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }
$org_url = selfURL();

//detect if URL has www or not
$mystring = $org_url;
$findme   = 'http://quatang.riseabove.vn';
$pos = strpos($mystring, $findme);
if ($pos !== false) {
   //if exists www 
   $redirect_url = $org_url;   
} else {
	//if not exists --> add www
   $redirect_url = str_replace("www.quatang.riseabove.vn","quatang.riseabove.vn",$org_url);
}

//replace string
//$redirect_url = str_replace("www.riseabove.vn","fashion2012.riseabove.vn",$redirect_url);

session_start();
if ($_SESSION['over_age'] == 1)	
	header('Location:'.$redirect_url);	

// handle POST here
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  	
	$_SESSION['over_age']=1;
	header('Location:'.$redirect_url);
} 
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=PAGE_TITLE?></title>
<link href="preload/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?=FALVICON_PATH?>" type="image/x-icon" />
<meta name="description" content="Rise Above">
<meta name="DC.Title" content="Rise Above">
<meta name="DC.Description" content="Rise Above">
<meta property="og:title" content="Rise Above" />
<meta property="og:description" content="Rise Above" />
<meta property="og:image" content="/images/logo.png" />
<script src="js/ga.js"></script> 

</head>

<body>
<form id="birthdayform" name="birthdayform" method="post" action="index.php">
<div id="container">
	<div id="logo"><!--<img src="images/logo.png" border="0" />--></div>
    <div id="box_content">
    	<h2><img src="images/over18_h2.png" border="0" /></h2>
        <div class="yesno">			
			<input type="image" src="images/yes_btn.png" id="over18" value="over18"/>
			<img src="images/slat.png" border="0" />
            <a href="#"><img src="images/no_btn.png" border="0"/></a>
            <input type="hidden" name="postback" value="postback2" />			
        </div>
    </div>
    <!--<p class="legal"><a href="javascript:popUp('legal.php')">Legal Term</a></p> -->
</div>
<!--div id="circle"><img src="images/circle.png" border="0" /></div-->
</form>
</body>
</html>

<script type="text/javascript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=600,height=500,left = 383,top = 134');");
}
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16166011-5']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
