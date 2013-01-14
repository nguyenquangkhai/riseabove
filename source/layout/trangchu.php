<? include('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width;minimum-scale=0.5,maximum-scale=1.0; user-scalable=1;" />
	<meta name="description" content="Website cung cấp quà Tết 2013 và Valentine 2013 dành cho sản phẩm rượu Martell VSOP. Sản phẩm rượu cognac nổi tiếng từ Pháp.Website Risabove">
	<meta name="keywords" content="Martell, Martell VSOP, Riseabove, rượu cognac, VSOP, quà xuân, quà tết quà Valentine 2013. Quà độc đáo, quà handmade, quà tặng Tết Nguyên Đán, Túi quà">
	<title><?=PAGE_TITLE?></title>
	<link href="<?=FALVICON_PATH?>" rel="shortcut icon"/> 
	<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/text.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
    
    <link rel="stylesheet" type="text/css" media="all" href="css/responsive.css" />
	<style type="text/css" media="screen, projection">

</style>
<script src="js/ga.js"></script> 
	</head>

	<body >
<header>
      <div class="bg_header"></div>
      <nav>
    <ul>
    	<li> <a class="logo"></a></li>
		<li> <a class="active"> TRANG CHỦ </a></li>|
		<li> <a href="gioithieu.php"> GIỚI THIỆU </a></li>|
		<li> <a href="sangtao.php"> SÁNG TẠO </a> </li>|
		<li> <a href="bosuutap.php"> BỘ SƯU TẬP </a></li>
     </ul>
  </nav>
    </header>
<section style="height:100%">
      <article class="wrapper parallax-viewport" id="parallax">
    <div class="bg_content_1"></div>
    <div class="bottle home"><a href="sangtao.php" class="btn_creative"></a></div>
  </article>
    </section>
<footer>
	<style>
		#nganluongframe26275{margin: -200px 0 0 400px;}
		#tt_nganluong26275{width: 130px;}
	</style>
	<div style="padding-top:200px; padding-left:200px;">
		<script src="https://www.nganluong.vn/tooltip_nbdb/nldb_tootip.js"></script>
		<script type="text/javascript">
			var merchantID=<?=MERCHANT_ID?>; // 22287 là Mã merchant site( hay mã website dăng ky trên Ngân Lượng)
			var uesrID=<?=USER_ID?>; //  là Mã tài khoản NgânLượng.vn của bạn
			var imageType=<?=IMAGE_TYPE?>; // 230 là kích thước logo rộng 230px
			ngaluongloadframe(merchantID,uesrID,imageType);	
		</script>
	</div>
	<div class="wrapp_sns">
    	<a href="#" class="btn_sns"></a><a href="#">SHARE ON</a><a href="http://www.facebook.com/riseabovefashion" class="btn_sns_f"></a><a href="#" class="btn_sns_g"></a><a href="#" class="btn_sns_t"></a>
    </div>
</footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script> 
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
