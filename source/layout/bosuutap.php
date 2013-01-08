<? include('database.php'); ?>
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
<link rel="stylesheet" type="text/css" media="all" href="css/jcoverflip.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
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
    <div class="bg_content_3 gallery" style="width: 396px; height:42px;">
      <div class="wrapp_content gallery" style="width: 0px;">
		<div class="title_gallery" style="left: 280px;"><img src="images/new_year/title_martell.png" width="396" height="42"> </div>
      	
      </div>
    </div>    
  </article>
</section>
<footer>
	<div class="bg_content_5 gallery">        
		<div class="content_gallery">
			<ul id="flip" class="carousel">
			<? $gallery_list = mysql_query("SELECT * FROM gallery_image");
				while($row = mysql_fetch_array($gallery_list)){
			?>
			  <li><img src="images/gallery/<?=$row['name_image']?>" /></li>
			<? }?>
			</ul>
        </div>
		<a href="#" class="prev"></a>
		<a href="#" class="next"></a>
    </div> 
    <div class="wrapp_sns">
    	<a href="#" class="btn_sns"></a><a href="#">SHARE ON</a><a href="#" class="btn_sns_f"></a><a href="#" class="btn_sns_g"></a><a href="#" class="btn_sns_t"></a>
    </div>
</footer>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script> --> 
<script src="js/jquery.event.frame.js"></script> 
<script src="js/jquery.parallax.js"></script> 
<script src="js/jquery.carousel.js"></script> 
<script>
  jQuery(document).ready(function(){
    jQuery('#parallax .parallax-layer')
    .parallax({
      mouseport: jQuery('#parallax')
    });
	$('#flip').carousel({
		autoplay        : false,
		autoplayInterval: 400,
		carouselWidth   : 960, 
		carouselHeight  : 460, 
		directionNav    : true,
		slidesPerScroll : 3,
		frontWidth      : 386,
		frontHeight     : 460,
		backZoom        : 0.6,
		hMargin         : 1.1
	});
  });
  </script> 

</body>
</html>
