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
<link rel="stylesheet" href="css/imageflow.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/imageflow.js" type="text/javascript"></script>
<script src="js/jquery.slidingGallery-1.2.js" type="text/javascript"></script>
<script src="js/ga.js"></script>
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
		<li> <a class="active"> BỘ SƯU TẬP </a></li>
    </ul>
  </nav>
</header>
<section style="height: 656px;">
  <article class="wrapper parallax-viewport" id="parallax">
    <div class="bg_content_1 gallery"></div> 
	<div class="title_gallery">
		<img src="images/new_year/title_martell.png" width="396" height="42"> 
	</div>	
  </article>
	
	<div class="gallery">  
		<div class="content_gallery">
			<div class="gallery_container" style="left:-50px; width:1000px; height:500px;"> 
			<? $gallery_list = mysql_query("SELECT * FROM gallery_image WHERE `show` = 1 ORDER BY id_image DESC");
				$i = 0;
				while($row = mysql_fetch_array($gallery_list)){
					if ($i == 0) {
			?>
				<img src="images/gallery/<?=$row['name_image']?>" alt="" layout="portrait" class="start"/>
			<? 		}
					else {
			?>
				<img src="images/gallery/<?=$row['name_image']?>" alt="" layout="portrait" />
			<?		}
				$i++;
			}?>
			</div>
		</div>
	</div> 

</section>
<footer>

	
    <div class="wrapp_sns">
		<? include("logoNL.php"); ?>
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
    <script language="javascript" type="text/javascript">
        $(function() {
            var zoomFunc = function(dimension) {
                return dimension * 1.5;
            }
            var shrinkFunc = function(dimension) {
                return dimension * 0.7;
            }
            $('div.gallery_container img').slidingGallery({'slideSpeed':'slow','Lzoom':zoomFunc, 'Pzoom':zoomFunc,'Lshrink':shrinkFunc,'Pshrink':shrinkFunc, container: $('div.gallery_container')});
        });
    </script>
</body>
</html>
