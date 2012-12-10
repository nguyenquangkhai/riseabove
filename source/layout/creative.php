<? 
include("database.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width;minimum-scale=0.5,maximum-scale=1.0; user-scalable=1;" />
		<title>RiseAbove - Sáng tạo</title>
		<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/text.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/common.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/bottle_template.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/creative_style.css" />
		<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
	</head>

	<body >
		<header>
			<div class="bg_header"></div>
			<nav>
				<ul>
					<li> <a href="home_page.html"> TRANG CHỦ </a></li>
			          <li> <a href="about_page.html"> GIỚI THIỆU </a></li>
			          <li> <a class="logo"></a></li>
			          <li> <a  class="active"> SÁNG TẠO </a> </li>
			          <li> <a href="gallery_page.html"> BỘ SƯU TẬP </a></li>
				</ul>
			</nav>
		</header>
		<section>
			<article class="wrapper parallax-viewport" id="parallax">
				<div class="bottle slider">
					<div class="bottle_template" id="template_1" style="display: none">
						<div data-order="0" class="bottle_template_imglarge bottle_template_img"></div>
						<div data-limit="40" data-order="0" class="bottle_template_textlarge text"></div>
					</div>
					<div class="bottle_template" id="template_2" style="display: none">
						<div data-limit="40" data-order="0" class="bottle_template_textlarge text"></div>
						<div data-order="0" class="bottle_template_imglarge bottle_template_img"></div>
					</div>
					<div class="bottle_template" id="template_3" style="display: none">
						<div data-limit="20" style="height: 85px;" data-order="0" class="bottle_template_textsmall text"></div>
						<div data-order="0" style="height: 75px;" class="bottle_template_imglarge bottle_template_img"></div>
						<div data-limit="20" style="height: 85px;" data-order="1" class="bottle_template_textsmall text"></div>
					</div>
					<div class="bottle_template" id="template_4" style="display: none">
						<div data-order="0" class="bottle_template_imgsmall bottle_template_img"></div>
						<div data-limit="20" data-order="0" class="bottle_template_textsmall text"></div>
						<div data-order="1" class="bottle_template_imgsmall bottle_template_img"></div>
					</div>
					<div class="bottle_template" id="template_5" style="display: none">
						<div data-limit="80" data-order="0" class="bottle_template_textfull text"></div>
					</div>
					<div class="bottle_template" id="template_6" style="display: none">
						<div data-order="0" class="bottle_template_imgfull bottle_template_img"></div>
					</div>
				</div>
				<div class="bg_content_1_holder">
					<div class="bg_content_1_slider slider">
						<div class="bg_content_1 step1"></div>
						<div class="bg_content_1 step2"></div>
						<div class="bg_content_1 step3"></div>
					</div>
				</div>
				<div class="bg_content_2_holder parallax-layer">
					<div class="bg_content_2_slider slider">
						<div class="bg_content_2"></div>
						<div class="bg_content_2"></div>
						<div class="bg_content_2"></div>
					</div>
				</div>
				<div class="bg_content_4_holder parallax-layer">
					<div class="bg_content_4_slider slider">
						<div class="bg_content_4 step1"></div>
						<div class="bg_content_4 step2"></div>
						<div class="bg_content_4 step3"></div>
					</div>
				</div>
				<div class="bg_content_3_holder">
					<div id="content1" class="bg_content_3 step1">
						<div class="wrapp_creative_content">
							<a id="arrow_from1_to2" class="arrow_creative"></a>
							<div class="title_creative">
								<img src="images/creative/title_creative.png" width="465" height="45"/>
							</div>
							<ul id="template_chosen" class="content_creative">
								<?
									$template_list = mysql_query("SELECT * FROM template_master");
									while($row = mysql_fetch_array($template_list)){
								?>
									<li data-templateId="<?= $row['id_template_master'] ?>" rel="#template_<?= $row['id_template_master'] ?>">
										<img src="images/creative/template/<?= $row['template_name'] ?>.jpg" width="119" height="183"/>
									</li>			
								<?
									}
								?>
							</ul>
							<div class="info_creative">

							</div>
						</div>
					</div>
					<div id="content2" class="bg_content_3 step2" style="display: none">
						<div class="wrapp_creative_content_sub">
							<a id="arrow_from2_to3" class="arrow_creative_sub"></a>
							<a id="arrow_from2_to1" class="arrow_creative_sub_1"></a>
							<div class="title_creative_sub">
								<img src="images/creative/title_creative_sub.png" width="465" height="45"/>
							</div>
							<ol class="creative_left_sub">
								<li>
									<div class="title_left_sub">
										<h1>CHỌN CHỦ ĐỀ</h1>
									</div>
									<ul id="topic_chosen" class="content_creative_sub">
										<?
											$topic_list = mysql_query("SELECT * FROM topic_master");
											
											while($row = mysql_fetch_array($topic_list)){
										?>
										<li data-topic-id="<?= $row['id_topic_master'] ?>">
											<img src="images/creative/topic/<?= $row['topic_name'] ?>.png" width="87" height="86"/>
										</li>
										<?
											}
										?>
									</ul>
								</li>
								<div class="space30"></div>
								<div class="clear"></div>
								<li>
									<div class="title_left_sub">
										<h1>CHỌN HÌNH</h1>
									</div>
									
									<ul id="image_chosen" class="content_creative_sub_1">
										<div class="ar_sub_1"></div>
										<div class="ar_sub_2"></div>
										<?
											$image_list = mysql_query("SELECT * FROM image_master WHERE id_topic_master = 1 LIMIT 0,6");
											$length = mysql_fetch_lengths($image_list);
											echo $length;
											if($length > 6){
										?>
											
										<?
											}
											while($row = mysql_fetch_array($image_list)){
										?>
											<li data-image-id="<?= $row['id_image_master'] ?>">
												<img class="decor_img" src="images/creative/images/<?= $row['id_topic_master']?>_<?= $row['id_image_master'] ?>.png" />
											</li>
										<?
											}
										?>
									</ul>
								</li>
							</ol>
							<ol class="creative_right_sub">
								<li>
									<div class="title_left_sub">
										<h1>LỜI CHÚC CỦA BẠN</h1>
									</div>
									<form class="form_right_sub">
										<div id="wish" contenteditable="true" class="textarea" style="background-color: #fff; text-align: left">
											
										</div>
										<!-- textarea name="" title="" maxlength="30" placeholder="Type your text here...."></textarea -->
										<button type="button" value="Submit" title="" ></button>
									</form>
								</li>
								<div class="clear"></div>
								<div class="space30"></div>
								<style type="text/css">
								</style>
								<li>
									<div class="title_left_sub">
										<h1>CHỌN MẪU LỜI CHÚC CÓ SẴN</h1>
									</div>
									<ul id="quote" class="content_creative_sub_4 scroll_bar">
										<?
											$quote_list = mysql_query("SELECT * FROM quote_master LIMIT 0,6");
											while($row = mysql_fetch_array($quote_list)){
										?>
										<li>
											<span><?= $row['quote_content'] ?></span>
										</li>
										<?
											}
											mysql_close($con);
										?>
									</ul>
								</li>
							</ol>
							<div class="clear"></div>
						</div>
					</div>
					<div id="content3" class="bg_content_3 step3" style="display: none">
						<div class="wrapp_content contact">
							<a id="arrow_from3_to2" class="arrow_creative_sub_1"></a>
							<form action="" method="" name="">
								<input class="contact_form" type="text" value="" name=""/>
								<input class="contact_name" type="text" value="" name=""/>
								<textarea class="contact_address" type="text" maxlength="63" value="" name=""></textarea>
								<input class="contact_tell" type="text" value="" name=""/>
								<input class="contact_email" type="text" value="" name=""/>
								<input class="contact_to" type="text" value="" name=""/>
								<input class="contact_name_1" type="text" value="" name=""/>
								<textarea class="contact_address_1" type="text" maxlength="63" value="" name=""></textarea>
								<input class="contact_tell_1" type="text" value="" name=""/>
								<input class="contact_email_1" type="text" value="" name=""/>
								<button class="contact_submit" type="submit" value="" name=""></button>
							</form>
						</div>
					</div>
				</div>
			</article>
		</section>
		<section style="display: none">
			<form id="master_form">
				<input type="hidden" id="master_template" name="template"/>
				<input type="hidden" id="master_topic" name="topic"/>
				<input type="hidden" id="master_image0" name="image"/>
				<input type="hidden" id="master_image1" name="image"/>
				<input type="hidden" id="master_text0" name="text_1"/>
				<input type="hidden" id="master_text1" name="text_2"/>
				<input type="hidden" id="master_from_name" name="from_name"/>
				<input type="hidden" id="master_from_add" name="from_add"/>
				<input type="hidden" id="master_from_tel" name="from_tel"/>
				<input type="hidden" id="master_from_mail" name="from_mail"/>
				<input type="hidden" id="master_to_name" name="to_name"/>
				<input type="hidden" id="master_to_add" name="to_add"/>
				<input type="hidden" id="master_to_tel" name="to_tel"/>
				<input type="hidden" id="master_to_mail" name="to_mail"/>
			</form>
			<input type="hidden" id="master_text_num" value="0"/>
			<input type="hidden" id="master_image_num" value="0"/>
		</section>
		<footer></footer>
		<!-- script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script -->
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/jquery.event.frame.js"></script>
		<script src="js/jquery.parallax.js"></script>
		<script src="js/jquery.mCustomScrollbar.js"></script>
		<script>
			jQuery(document).ready(function() {
				$('#parallax .parallax-layer').parallax({
					mouseport : jQuery('#parallax')
				});
				$content1 = $("#content1");
				$content2 = $("#content2");
				$content3 = $("#content3");

				$(".scroll_bar").mCustomScrollbar({
					scrollEasing : "easeOutQuint",
					autoDraggerLength : false
				});

				$("#arrow_from2_to1").click(function() {
					$content1.show();
					$content2.hide();
					$content3.hide();
					$(".slider").removeClass("step2");
					//reset param
					$(".text").unbind("click");
					$(".bottle_template_img").unbind("click");
					$("#master_text_num").val(0);
					$("#master_image_num").val(0);
					var bottle_template = $(".bottle_template").not(":hidden");
					var bottle_template_img = bottle_template.children(".bottle_template_img").html("");
					bottle_template.removeClass("no-image");
					$(".text").html("")
				});
				
				$("#arrow_from2_to3").click(function() {
					//if($("#master_image0").val() == "" || $("#master_text0").val() == "")
					//	return;
					$content1.hide();
					$content2.hide();
					$content3.show();
					$(".slider").addClass("step3");
				});
				
				$("#arrow_from3_to2").click(function() {
					$content1.hide();
					$content2.show();
					$content3.hide();
					$(".slider").removeClass("step3");
				});
				
				$("#template_chosen li").click(function(){
					var obj = $(this).attr("rel");
					$(".bottle_template").hide();
					$(obj).show();
					var tempId = $(this).data("templateid");
					$("#arrow_from1_to2").unbind("click").bind("click", function(){
						$content1.hide();
						$content3.hide();
						$content2.show();
						$(".slider").addClass("step2");
					});
					
					$(".text").click(function(){
						var val = $(this).data("order");
						//$(".form_right_sub textarea").val($("#master_text" + val).val()).focus();
						$("#wish").text($("#master_text" + val).val()).focus();
						$("#master_text_num").val(val);
					});
					
					$(".bottle_template_img").click(function(){
						var val = $(this).data("order");
						$("#master_image_num").val(val);
					});
					
					$("#master_template").val(tempId);
				});
				
				$("#topic_chosen li").click(function(){
					var obj = $(this);
					var topic_id = obj.data("topic-id");
					
					$("#master_topic").val(topic_id);
					$.ajax({
						url:"get_topic_images.php",
						data:({topic_id:topic_id}),
						type:"post",
						dataType:"json",
						success:function(data){
							var image_holder = document.getElementById("image_chosen");
							while ( image_holder.firstChild ) image_holder.removeChild( image_holder.firstChild );
							data.forEach(function(obj,index){
								var li = document.createElement('li');
								li.setAttribute("data-image-id",obj.id);
								var img = new Image();
								img.src = "images/creative/images/"+obj.topic_id+"_"+obj.id+".png";
								img.width = 106;
								img.height = 104;
								li.appendChild(img);
								image_holder.appendChild(li);
								console.log(obj.topic_id +"_"+obj.id);
							});
						}
					});
				});
				
				$("#image_chosen li").click(function(){
					var obj = $(this);
					var image_id = obj.data("image-id");
					$("#master_image").val(image_id);
					var image_num = $("#master_image_num").val();
					var bottle_template = $(".bottle_template").not(":hidden");
					var bottle_template_img = bottle_template.children(".bottle_template_img").eq(image_num);
					bottle_template.addClass("no-image");
					var img = new Image();
					img.src = obj.children("img").attr("src");
					bottle_template_img.html("").append(img);
					$("#master_image" + image_num).val(image_id);
				});
				
				$("#quote li").click(function(){
					var text = $(this).text();
					$("#wish").text("").text(text).focus();
					var text_current = $("#master_text_num").val();
					$("#master_text"+text_current).val(text);
					$(".bottle_template").not(":hidden").children(".text").eq(text_current).html(text);
				});
				
				$("#wish").keyup(function(){
					var text = $(this).text();
					var text_current = $("#master_text_num").val();
					$(".bottle_template").not(":hidden").children(".text").eq(text_current).html(text);
					$("#master_text"+text_current).val(text);
				});
				
				/*$(".form_right_sub textarea").keyup(function(){
					var text = $(this).val();
					var text_current = $("#master_text_num").val();
					$(".bottle_template").not(":hidden").children(".text").eq(text_current).html(text);
					$("#master_text"+text_current).val(text);
				});*/
			});
		</script>
	</body>
</html>
