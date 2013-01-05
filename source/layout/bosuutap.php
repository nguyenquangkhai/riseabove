<? include('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width;minimum-scale=0.5,maximum-scale=1.0; user-scalable=1;" />
<title><?=PAGE_TITLE?></title>
<link href="<?=FALVICON_PATH?>" rel="shortcut icon"/> 
<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/style_gallery.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/responsive.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
</head>

<body >
<header>
  <div class="bg_header"></div>
  <nav>
    <ul>
    	<li> <a class="logo"></a></li>
		<li> <a href="trangchu.php"> TRANG CHỦ </a></li>|
		<li> <a href="gioithieu.php"> GIỚI THIỆU </a></li>|
		<li> <a href="sangtao.php"> SÁNG TẠO </a> </li>|
		<li> <a class="active" href="gallery_page.php"> BỘ SƯU TẬP </a></li>
    </ul>
  </nav>
</header>
<section style="height: 656px;">
  <article class="wrapper parallax-viewport" id="parallax">
    <div class="bg_content_1 gallery"></div>
    <div class="bg_content_3 gallery">
      <div class="wrapp_content gallery">
      <div class="title_gallery"><img src="images/new_year/title_martell.png" width="396" height="42"> </div>
      	
      </div>
    </div>    
  </article>
</section>
<footer><div class="bg_content_5 gallery">
        <div class="content_gallery">
            <div class="bottle_gallery 1"><img src="images/common/bottle_ori_1.png" width="111" height="351"><br><span>Design by Ankzu</span></div>
            <div class="bottle_gallery 2"><img src="images/common/bottle_ori_1.png" width="134" height="423"><br><span>Design by Ankzu</span></div>
            <div class="bottle_gallery 3"><img src="images/common/bottle_ori_1.png" width="158" height="499"><br><span>Design by Ankzu</span></div>
            <div class="bottle_gallery 4"><img src="images/common/bottle_ori_1.png" width="134" height="423"><br><span>Design by Ankzu</span></div>
            <div class="bottle_gallery 5"><img src="images/common/bottle_ori_1.png" width="111" height="351"><br><span>Design by Ankzu</span></div>
        </div>
    </div> 
    <div class="wrapp_sns">
    	<a href="#" class="btn_sns"></a><a href="#">SHARE ON</a><a href="#" class="btn_sns_f"></a><a href="#" class="btn_sns_g"></a><a href="#" class="btn_sns_t"></a>
    </div>
    </footer>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script> --> 
<script src="js/jquery.event.frame.js"></script> 
<script src="js/jquery.parallax.js"></script> 
<script>
  jQuery(document).ready(function(){
    jQuery('#parallax .parallax-layer')
    .parallax({
      mouseport: jQuery('#parallax')
    });
  });
  </script> 

</body>
</html>
