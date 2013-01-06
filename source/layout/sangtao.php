<?
include("database.php");
include('include/lib/nusoap.php');
include('include/nganluong.microcheckout.class.php');

$order_id = 'MT-'.date('His-dmY').rand(1000, 9999);
	$inputs = array(
		'receiver'		=> RECEIVER,
		'order_code'	=> $order_id,
		'return_url'	=> $_return_url,
		'cancel_url'	=> '',
		'language'		=> 'vn'
	);
	$link_checkout = '';
	$obj = new NL_MicroCheckout(MERCHANT_ID, MERCHANT_PASS, URL_WS);
	$result = $obj->setExpressCheckoutDeposit($inputs);
	if ($result != false) {
		if ($result['result_code'] == '00') {
			$link_checkout = $result['link_checkout'];
			$link_checkout = str_replace('micro_checkout.php?token=', 'index.php?portal=checkout&page=micro_checkout&token_code=', $link_checkout);
		} else {
			die('Ma loi '.$result['result_code'].' ('.$result['result_description'].') ');
		}
	} else {
		die('Loi ket noi toi cong thanh toan ngan luong');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
		<meta http-equiv="EXPIRES" content="0">
		<meta name="viewport" content="width=device-width;minimum-scale=0.5,maximum-scale=1.0; user-scalable=1;" />
		<title><?=PAGE_TITLE?></title>
		<link href="<?=FALVICON_PATH?>" rel="shortcut icon"/> 
		<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/text.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/common.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/bottle_template.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/creative_style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/jquery.jscrollpane.codrops2.css" />
		<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
	</head>

	<body >
		<header>
			<div class="bg_header"></div>
			<nav>
				<ul>
                	<li> <a class="logo"></a></li>
					<li> <a href="trangchu.php"> TRANG CHỦ </a></li>|
			          <li> <a href="gioithieu.php"> GIỚI THIỆU </a></li>|
			          <li> <a  class="active"> SÁNG TẠO </a> </li>|
			          <li> <a href="bosuutap.php"> BỘ SƯU TẬP </a></li>
				</ul>
			</nav>
		</header>
		<section>
			<article class="wrapper parallax-viewport" id="parallax">
				<div class="bottle slider">
					<div class="bottle_template" id="template_1" style="display: none">
						<div data-order="0" class="bottle_template_imglarge bottle_template_img image_holder"></div>
						<div data-limit="120" data-order="0" class="bottle_template_textlarge text">
						</div>
					</div>
					<div class="bottle_template" id="template_2" style="display: none">
						<div data-limit="120" data-order="0" class="bottle_template_textlarge text">
						</div>
						<div data-order="0" class="bottle_template_imglarge bottle_template_img image_holder"></div>
					</div>
					<div class="bottle_template" id="template_3" style="display: none">
						<div data-limit="60" data-order="0" class="bottle_template_textsmall text">
						</div>
						<div data-order="0" class="bottle_template_imglarge bottle_template_img image_holder"></div>
						<div data-limit="60" data-order="1" class="bottle_template_textsmall text">
						</div>
					</div>
					<div class="bottle_template" id="template_4" style="display: none">
						<div data-order="0" class="bottle_template_imgsmall bottle_template_img image_holder"></div>
						<div data-limit="60" data-order="0" class="bottle_template_textsmall text">
						</div>
						<div data-order="1" class="bottle_template_imgsmall bottle_template_img image_holder"></div>
					</div>
					<div class="bottle_template" id="template_5" style="display: none">
						<div data-limit="220" data-order="0" class="bottle_template_textfull text">
						</div>
					</div>
					<div class="bottle_template" id="template_6" style="display: none">
						<div data-order="0" class="bottle_template_imgfull bottle_template_img image_holder"></div>
					</div>
				</div>
				<div class="bg_content_1_holder">
					<div class="bg_content_1_slider slider">
						<div class="bg_content_1 step1"></div>
						<div class="bg_content_1 step2"></div>
						<div class="bg_content_1 step3"></div>
					</div>
				</div>
				<div class="bg_content_3_holder">
					<div id="content1" class="bg_content_3 step1" >
						<div class="wrapp_creative_content">
							<a id="arrow_from1_to2" class="arrow_creative"></a>
							<div class="title_creative">
            	<img src="images/new_year/title_creative.png" width="491" height="97"/>
            </div>
							<ul id="template_chosen" class="content_creative">
								<?
									$i = 1;
									$template_list = mysql_query("SELECT * FROM template_master");
									while($row = mysql_fetch_array($template_list)){
								?>
									<li data-templateId="<?= $row['id_template_master'] ?>" rel="#template_<?= $row['id_template_master'] ?>">
										<img src="images/creative/template/<?= $row['template_name'] ?>.jpg" width="119" height="183"/>
										<img src="images/creative/template/bc<?=$i?>.png" width="119" height="183" style="top: 183px;"/>
									</li>			
								<?
									$i++;
									}
								?>
							</ul>
						</div>
					</div>
					<div id="content2" class="bg_content_3 step2" style="display: none">
						<div class="wrapp_creative_content_sub">
							<a id="arrow_from2_to3" class="arrow_creative_sub"></a>
							<a id="arrow_from2_to1" class="arrow_creative_sub_1"></a>
							<ol class="creative_left_sub">
								<li>
									<div class="title_left_sub">
										<h1>1. Chọn chủ đề Tết&Valetine 2013</h1>
									</div>
									<ul id="topic_chosen" class="content_creative_sub">
										<?
											$topic_list = mysql_query("SELECT * FROM topic_master");
											
											while($row = mysql_fetch_array($topic_list)){
										?>
										<li data-topic-id="<?= $row['id_topic_master'] ?>">
											<img src="images/creative/topic/<?= $row['topic_name'] ?>.png" width="72" height="73" title="<?= $row['topic_description'] ?>" alt="<?= $row['topic_description'] ?>" />
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
										<h1>3. Chọn hình ảnh đi theo chủ đề</h1>
									</div>
									
									<ul id="image_chosen" class="content_creative_sub_1">
										<!-- div class="loader" style="display:none;position: absolute;top: 0; left: 0; width: 400px; height: 210px;background-color: #EEE;opacity: 0.8; border-radius: 5px" >
											<img style="margin-top: 100px;" src="images/loader.gif" />
										</div -->
										<?
											$image_list = mysql_query("SELECT * FROM image_master WHERE id_topic_master = 1");
											$length = mysql_num_rows ($image_list);
											if($length > 6){
										?>
											<!-- div class="ar_sub_1"></div>
											<div class="ar_sub_2"></div -->
										<?
											}
											while($row = mysql_fetch_array($image_list)){
										?>
											<li data-image-id="<?= $row['id_image_master'] ?>">
												<img class="decor_img" src="images/creative/images/<?= $row['id_topic_master'] ?>/<?= $row['id_image_master'] ?>.png" />
											</li>
										<?
											}
										?>
									</ul>
								</li>
							</ol>
							<ol class="creative_right_sub">
								<li>
									<div class="title_martell"></div>
									<div class="title_left_sub">
										<h1>2. Tự sáng tạo lời chúc</h1>
									</div>
									<form class="form_right_sub">
										<div id="wish" contenteditable="true" class="textarea" style="background-color: #fff; text-align: left">
											From Martell with love
										</div>
										<span id="counter_master" style="display:none; position: absolute; margin: -20px 0 0 275px; color:#BE3636">Limit <span id="counter_cur"></span>/<span id="counter_hold"></span></span>
									</form>
								</li>
								<div class="clear"></div>
								<div class="space10"></div>
								<li>
									<div class="title_left_sub">
										<h1>4. Chọn câu chúc đi theo chủ đề</h1>
									</div>
									<ul id="quote" class="content_creative_sub_4 scroll_bar" style="width:400px; height: 160px;">
										<?
											$quote_list = mysql_query("SELECT * FROM quote_master WHERE id_topic_master = 1");
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
						<div class="title_contact"></div>
						<div class="wrapp_content contact">
							<a id="arrow_from3_to2" class="arrow_creative_sub_1"></a>
								<!-- input class="contact_form" type="text" value=""/-->
								<input id="from_name" class="contact_name" type="text" value=""/>
								<div id="from_add" contenteditable="true" class="contact_address"></div>
								<input id="from_tel" class="contact_tell" type="text" value=""/>
								<div></div>
								<input id="from_mail" class="contact_email" type="text" value=""/>
								<div id="same_from_to">
									<input type="checkbox" name="copy" />
								</div>
								<input id="to_name" class="contact_name_1" type="text" value=""/>
								<div id="to_add" contenteditable="true" class="contact_address_1"></div>
								<input id="to_tel" class="contact_tel_1" type="text" value=""/>
								<input id="to_mail" class="contact_email_1" type="text" value=""/>
								<button class="contact_submit gallery_save" value="" style="bottom: 50px; left: 400px; cursor: pointer;"></button>
								<button id="do_transaction" class="contact_submit" value="" style="bottom: 50px; cursor: pointer;"></button>
						</div>
					</div>
				</div>
			</article>
		</section>
		<section style="display: none">
			<form id="master_form" action="buy.php" method="post">
				<input type="hidden" id="master_template" name="template"/>
				<input type="hidden" id="master_topic" name="topic" value="4"/>
				<input type="hidden" id="master_image0" name="image_1"/>
				<input type="hidden" id="master_image1" name="image_2"/>
				<input type="hidden" id="master_text0" name="text_1"/>
				<input type="hidden" id="master_text1" name="text_2"/>
				<input type="hidden" id="master_from" name="from"/>
				<input type="hidden" id="master_to" name="to"/>
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
		<footer><div class="wrapp_sns">
    	<a href="#" class="btn_sns"></a><a href="#">SHARE ON</a><a href="#" class="btn_sns_f"></a><a href="#" class="btn_sns_g"></a><a href="#" class="btn_sns_t"></a>
    </div> </footer>
		<!-- script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script -->
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/jquery.event.frame.js"></script>
		<script src="js/jquery.parallax.js"></script>
		<!-- script src="js/jquery.mCustomScrollbar.js"></script -->
		<script src="js/jquery.form.js"></script>
		<!-- the mousewheel plugin -->
		<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" src="js/scroll-startstop.events.jquery.js"></script>
		<script type="text/javascript">
			function addScrollBar1(){
			
				// the element we want to apply the jScrollPane
				var $el					= $('#quote').show().jScrollPane({
					verticalGutter 	: -16
				}),
						
				// the extension functions and options 	
					extensionPlugin 	= {
						
						extPluginOpts	: {
							// speed for the fadeOut animation
							mouseLeaveFadeSpeed	: 500,
							// scrollbar fades out after hovertimeout_t milliseconds
							hovertimeout_t		: 1000,
							// if set to false, the scrollbar will be shown on mouseenter and hidden on mouseleave
							// if set to true, the same will happen, but the scrollbar will be also hidden on mouseenter after "hovertimeout_t" ms
							// also, it will be shown when we start to scroll and hidden when stopping
							useTimeout			: false,
							// the extension only applies for devices with width > deviceWidth
							deviceWidth			: 980
						},
						hovertimeout	: null, // timeout to hide the scrollbar
						isScrollbarHover: false,// true if the mouse is over the scrollbar
						elementtimeout	: null,	// avoids showing the scrollbar when moving from inside the element to outside, passing over the scrollbar
						isScrolling		: false,// true if scrolling
						addHoverFunc	: function() {
							
							// run only if the window has a width bigger than deviceWidth
							if( $(window).width() <= this.extPluginOpts.deviceWidth ) return false;
							
							var instance		= this;
							
							// functions to show / hide the scrollbar
							$.fn.jspmouseenter 	= $.fn.show;
							$.fn.jspmouseleave 	= $.fn.fadeOut;
							
							// hide the jScrollPane vertical bar
							var $vBar			= this.getContentPane().siblings('.jspVerticalBar').hide();
							
							/*
							 * mouseenter / mouseleave events on the main element
							 * also scrollstart / scrollstop - @James Padolsey : http://james.padolsey.com/javascript/special-scroll-events-for-jquery/
							 */
							$el.bind('mouseenter.jsp',function() {
								
								// show the scrollbar
								$vBar.stop( true, true ).jspmouseenter();
								
								if( !instance.extPluginOpts.useTimeout ) return false;
								
								// hide the scrollbar after hovertimeout_t ms
								clearTimeout( instance.hovertimeout );
								instance.hovertimeout 	= setTimeout(function() {
									// if scrolling at the moment don't hide it
									if( !instance.isScrolling )
										$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
								}, instance.extPluginOpts.hovertimeout_t );
								
								
							}).bind('mouseleave.jsp',function() {
								
								// hide the scrollbar
								if( !instance.extPluginOpts.useTimeout )
									$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
								else {
								clearTimeout( instance.elementtimeout );
								if( !instance.isScrolling )
										$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
								}
								
							});
							
							if( this.extPluginOpts.useTimeout ) {
								
								$el.bind('scrollstart.jsp', function() {
								
									// when scrolling show the scrollbar
									clearTimeout( instance.hovertimeout );
									instance.isScrolling	= true;
									$vBar.stop( true, true ).jspmouseenter();
									
								}).bind('scrollstop.jsp', function() {
									
									// when stop scrolling hide the scrollbar (if not hovering it at the moment)
									clearTimeout( instance.hovertimeout );
									instance.isScrolling	= false;
									instance.hovertimeout 	= setTimeout(function() {
										if( !instance.isScrollbarHover )
											$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
									}, instance.extPluginOpts.hovertimeout_t );
									
								});
								
								// wrap the scrollbar
								// we need this to be able to add the mouseenter / mouseleave events to the scrollbar
								var $vBarWrapper	= $('<div/>').css({
									position	: 'absolute',
									left		: $vBar.css('left'),
									top			: $vBar.css('top'),
									right		: $vBar.css('right'),
									bottom		: $vBar.css('bottom'),
									width		: $vBar.width(),
									height		: $vBar.height()
								}).bind('mouseenter.jsp',function() {
									
									clearTimeout( instance.hovertimeout );
									clearTimeout( instance.elementtimeout );
									
									instance.isScrollbarHover	= true;
									
									// show the scrollbar after 100 ms.
									// avoids showing the scrollbar when moving from inside the element to outside, passing over the scrollbar								
									instance.elementtimeout	= setTimeout(function() {
										$vBar.stop( true, true ).jspmouseenter();
									}, 100 );	
									
								}).bind('mouseleave.jsp',function() {
									
									// hide the scrollbar after hovertimeout_t
									clearTimeout( instance.hovertimeout );
									instance.isScrollbarHover	= false;
									instance.hovertimeout = setTimeout(function() {
										// if scrolling at the moment don't hide it
										if( !instance.isScrolling )
											$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
									}, instance.extPluginOpts.hovertimeout_t );
									
								});
								
								$vBar.wrap( $vBarWrapper );
							
							}
						
						}
						
					},
					
					// the jScrollPane instance
					jspapi 			= $el.data('jsp');
					
				// extend the jScollPane by merging	
				$.extend( true, jspapi, extensionPlugin );
				jspapi.addHoverFunc();
			
			};
			
			function addScrollBar2(){
			
				// the element we want to apply the jScrollPane
				var $el					= $('#image_chosen').show().jScrollPane({
					verticalGutter 	: -16
				}),
						
				// the extension functions and options 	
					extensionPlugin 	= {
						
						extPluginOpts	: {
							// speed for the fadeOut animation
							mouseLeaveFadeSpeed	: 500,
							// scrollbar fades out after hovertimeout_t milliseconds
							hovertimeout_t		: 1000,
							// if set to false, the scrollbar will be shown on mouseenter and hidden on mouseleave
							// if set to true, the same will happen, but the scrollbar will be also hidden on mouseenter after "hovertimeout_t" ms
							// also, it will be shown when we start to scroll and hidden when stopping
							useTimeout			: false,
							// the extension only applies for devices with width > deviceWidth
							deviceWidth			: 980
						},
						hovertimeout	: null, // timeout to hide the scrollbar
						isScrollbarHover: false,// true if the mouse is over the scrollbar
						elementtimeout	: null,	// avoids showing the scrollbar when moving from inside the element to outside, passing over the scrollbar
						isScrolling		: false,// true if scrolling
						addHoverFunc	: function() {
							
							// run only if the window has a width bigger than deviceWidth
							if( $(window).width() <= this.extPluginOpts.deviceWidth ) return false;
							
							var instance		= this;
							
							// functions to show / hide the scrollbar
							$.fn.jspmouseenter 	= $.fn.show;
							$.fn.jspmouseleave 	= $.fn.fadeOut;
							
							// hide the jScrollPane vertical bar
							var $vBar			= this.getContentPane().siblings('.jspVerticalBar').hide();
							
							/*
							 * mouseenter / mouseleave events on the main element
							 * also scrollstart / scrollstop - @James Padolsey : http://james.padolsey.com/javascript/special-scroll-events-for-jquery/
							 */
							$el.bind('mouseenter.jsp',function() {
								
								// show the scrollbar
								$vBar.stop( true, true ).jspmouseenter();
								
								if( !instance.extPluginOpts.useTimeout ) return false;
								
								// hide the scrollbar after hovertimeout_t ms
								clearTimeout( instance.hovertimeout );
								instance.hovertimeout 	= setTimeout(function() {
									// if scrolling at the moment don't hide it
									if( !instance.isScrolling )
										$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
								}, instance.extPluginOpts.hovertimeout_t );
								
								
							}).bind('mouseleave.jsp',function() {
								
								// hide the scrollbar
								if( !instance.extPluginOpts.useTimeout )
									$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
								else {
								clearTimeout( instance.elementtimeout );
								if( !instance.isScrolling )
										$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
								}
								
							});
							
							if( this.extPluginOpts.useTimeout ) {
								
								$el.bind('scrollstart.jsp', function() {
								
									// when scrolling show the scrollbar
									clearTimeout( instance.hovertimeout );
									instance.isScrolling	= true;
									$vBar.stop( true, true ).jspmouseenter();
									
								}).bind('scrollstop.jsp', function() {
									
									// when stop scrolling hide the scrollbar (if not hovering it at the moment)
									clearTimeout( instance.hovertimeout );
									instance.isScrolling	= false;
									instance.hovertimeout 	= setTimeout(function() {
										if( !instance.isScrollbarHover )
											$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
									}, instance.extPluginOpts.hovertimeout_t );
									
								});
								
								// wrap the scrollbar
								// we need this to be able to add the mouseenter / mouseleave events to the scrollbar
								var $vBarWrapper	= $('<div/>').css({
									position	: 'absolute',
									left		: $vBar.css('left'),
									top			: $vBar.css('top'),
									right		: $vBar.css('right'),
									bottom		: $vBar.css('bottom'),
									width		: $vBar.width(),
									height		: $vBar.height()
								}).bind('mouseenter.jsp',function() {
									
									clearTimeout( instance.hovertimeout );
									clearTimeout( instance.elementtimeout );
									
									instance.isScrollbarHover	= true;
									
									// show the scrollbar after 100 ms.
									// avoids showing the scrollbar when moving from inside the element to outside, passing over the scrollbar								
									instance.elementtimeout	= setTimeout(function() {
										$vBar.stop( true, true ).jspmouseenter();
									}, 100 );	
									
								}).bind('mouseleave.jsp',function() {
									
									// hide the scrollbar after hovertimeout_t
									clearTimeout( instance.hovertimeout );
									instance.isScrollbarHover	= false;
									instance.hovertimeout = setTimeout(function() {
										// if scrolling at the moment don't hide it
										if( !instance.isScrolling )
											$vBar.stop( true, true ).jspmouseleave( instance.extPluginOpts.mouseLeaveFadeSpeed || 0 );
									}, instance.extPluginOpts.hovertimeout_t );
									
								});
								
								$vBar.wrap( $vBarWrapper );
							
							}
						
						}
						
					},
					
					// the jScrollPane instance
					jspapi 			= $el.data('jsp');
					
				// extend the jScollPane by merging	
				$.extend( true, jspapi, extensionPlugin );
				jspapi.addHoverFunc();
			
			};
		</script>
		<script language="javascript" src="include/nganluong.apps.mcflow.js"></script>
		<script language="javascript">
			var mc_flow = new NGANLUONG.apps.MCFlow({trigger:'do_transaction',url:'<?php echo @$link_checkout;?>'});
		</script>
		<script>
		function ajax_insert_user() {
			$.ajax({
				url: "buy.php",
				type: "POST",
				data: {
					template: $("#master_template").val(),
					topic: $("#master_topic").val(),
					image_1: $("#master_image0").val(),
					image_2: $("#master_image1").val(),
					text_1: $("#master_text0").val(),
					text_2: $("#master_text1").val(),
					from: $("#master_from").val(),
					to: $("#master_to").val(),
					from_name: $("#master_from_name").val(),
					from_add: $("#master_from_add").val(),
					from_tel: $("#master_from_tel").val(),
					from_mail: $("#master_from_mail").val(),
					to_name: $("#master_to_name").val(),
					to_add: $("#master_to_add").val(),
					to_tel: $("#master_to_tel").val(),
					to_mail: $("#master_to_mail").val(),
					order_id: '<?=$order_id?>'
				},
				success: function(data){
					console.log(data);
				}
			});
		}
		
		var anim = (function() {
			var i = 0.5;
			var step = 0.1;
			var up = true;
			var timer = null;

			var next = function($selector) {
				if (up) {
					i += step;
				}
				else {
					i -= step;
				}
				if(i<0.5){i=0.5; up=true;}
				if(i>1){i=1; up=false;}
				update($selector);
			};

			var update = function($selector) {
				$selector.css("opacity", i);
			};

			var go = function($selector) {
				next($selector);
				timer = window.setTimeout(function(){anim.go($selector);}, 30);
			};

			var stop = function($selector) {
				if (timer) {
					window.clearTimeout(timer);
					timer = null;
					$selector.css("opacity", 1);
				}
			};

			var addClickHandler = function($selector) {
				$selector.click(function() {
					if(timer){
						anim.stop();
					}
					else{
						anim.go($selector);
					}

				});
			};



			return {
				go: go,
				stop: stop,
				addClickHandler: addClickHandler 
			};
		}());
	
			$(function() {
				$(".loader").ajaxStart(function(){
					$(this).show();
				});
				$(".loader").ajaxStop(function(){
					$(this).hide();
				});
				/*$('#parallax .parallax-layer').parallax({
					mouseport : jQuery('#parallax')
				});*/
				$('#master_form').resetForm();
				$content1 = $("#content1");
				$content2 = $("#content2");
				$content3 = $("#content3");

				/*$(".scroll_bar").mCustomScrollbar({
					scrollEasing : "easeOutQuint",
					autoDraggerLength : false
				});*/

				$("#arrow_from2_to1").click(function() {
					$content1.fadeIn();
					$content2.fadeOut();
					$content3.fadeOut();
					$(".slider").removeClass("step2");
					//reset param
					$(".text");
					$(".bottle_template_img").unbind("click");
					$("#master_text_num").val(0);
					$("#master_image_num").val(0);
					var bottle_template = $(".bottle_template").not(":hidden");
					bottle_template.children(".bottle_template_img,.text").unbind("click").text("").removeClass("no-image");
				});
				
				$("#arrow_from2_to3").click(function() {
					$content2.fadeOut("slow");
					$content3.fadeIn("slow");
					$(".slider").addClass("step3");
				});
				
				$("#arrow_from3_to2").click(function() {
					$content2.fadeIn("slow");
					$content3.fadeOut("slow");
					$(".slider").removeClass("step3");
				});
				
				$("#template_chosen li").click(function(){
					var obj = $(this).attr("rel");
					$(".bottle_template").hide();
					$(obj).show();
					var tempId = $(this).data("templateid");
					$(".text").click(function(){
						var val = $(this).data("order");
						$("#wish").html($("#master_text" + val).val()).focus();
						$("#master_text_num").val(val);
					});
					
					$(".bottle_template_img").click(function(){
						var val = $(this).data("order");
						$("#master_image_num").val(val);
					});
					
					
					$("#arrow_from1_to2").unbind("click").bind("click", function(){
						$content1.fadeOut("slow");
						$content2.fadeIn("slow");
						$(".slider").addClass("step2");
						addScrollBar1();
						addScrollBar2();
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
							var images = data.images;
							var quotes = data.quotes;
							var image_holder = $("#image_chosen .jspPane");
							image_holder.children("li").remove();
							images.forEach(function(obj,index){
								var li = $('<li>',{'data-image-id':obj.id});
								var img = $('<img>',{'src':"images/creative/images/"+obj.topic_id+"/"+obj.id+".png",
													'class':"decor_img"}).appendTo(li);
								image_holder.append(li);
							});
							var quotes_holder = $("#quote .jspPane");
							quotes_holder.children("li").remove();
							quotes.forEach(function(obj, index){
								var li = $('<li>');
								var span = $('<span>').html(obj.content).appendTo(li);
								li.appendTo(quotes_holder);
								li.data('')
							});
							addScrollBar1();
							addScrollBar2();
						}
					});
				});
				
				$("#image_chosen li").live("click",function(){
					var obj = $(this);
					var image_id = obj.data("image-id");
					$("#master_image").val(image_id);
					var image_num = $("#master_image_num").val();
					var bottle_template = $(".bottle_template").not(":hidden");
					var bottle_template_img = bottle_template.children(".bottle_template_img").eq(image_num);
					bottle_template_img.addClass("no-image");
					var img = $("<img>",{'src':obj.children("img").attr("src")});
					bottle_template_img.html("").append(img);
					$("#master_image" + image_num).val(image_id);
				});
				
				$("#quote li").live('click',function(){
					var html = $(this).children('span').html();
					$("#wish").html(html).focus();
					
					$("#wish").trigger("keyup");
				});
				
				$("#wish").keyup(function (){
					var text = $.trim($(this).text());
					var html = $(this).html();
					var text_current = $("#master_text_num").val();
					var bottle_template_text = $(".bottle_template").not(":hidden").children(".text").eq(text_current);
					var limit = bottle_template_text.data("limit");
					$("#counter_hold").text(limit);
					$("#counter_cur").text(text.length);
					if($("#counter_master").is(":hidden")){
						$("#counter_master").show().delay(1000).fadeOut("slow");
					}
					if(text.length > 0 && text.length <= limit){
						bottle_template_text.html(html);
					}else if(text.length > limit){
						text = text.substring(0,limit);
						$(this).html(text);
					}
					if(text.length != 0)
						bottle_template_text.addClass("no-image");
					else
						bottle_template_text.removeClass("no-image");
					bottle_template_text.html(html);
					$("#master_text"+text_current).val(html);
				});
				
				$("#from_name").keyup(function(){
					var obj = $(this);
					$("#master_from_name").val(obj.val());
				});
				
				$("#from_add").keyup(function(){
					var obj = $(this);
					$("#master_from_add").val(obj.text());
				});
				
				$("#from_tel").keyup(function(){
					var obj = $(this);
					$("#master_from_tel").val(obj.val());
				});
				
				$("#from_mail").keyup(function(){
					var obj = $(this);
					$("#master_from_mail").val(obj.val());
				});
				
				$("#to_name").keyup(function(){
					var obj = $(this);
					$("#master_to_name").val(obj.val());
				});
				
				$("#to_add").keyup(function(){
					var obj = $(this);
					$("#master_to_add").val(obj.text());
				});
				
				$("#to_tel").keyup(function(){
					var obj = $(this);
					$("#master_to_tel").val(obj.val());
				});
				
				$("#to_mail").keyup(function(){
					var obj = $(this);
					$("#master_to_mail").val(obj.val());
				});
				
				$("#same_from_to > :checkbox").change(function(){
					if($(this).is(":checked")){
						$("#to_name").val($("#from_name").val()).trigger("keyup");
						$("#to_add").text($("#from_add").text()).trigger("keyup");
						$("#to_tel").val($("#from_tel").val()).trigger("keyup")
						$("#to_mail").val($("#from_mail").val()).trigger("keyup")
					}
				});
				$("#same_from_to").click(function(){
					if(!$(this).children(":checkbox").is(":checked")){
						$(this).children(":checkbox").prop("checked",true).trigger("change");
					}else{
						$(this).children(":checkbox").prop("checked",false);
					};
				});
				
				$("#do_transaction").click(function(){
			       //$('#master_form').submit();
				   ajax_insert_user();
				});
				
				$('#template_chosen li').hover(
					function(e){
						$('img', $(e.target).parent()).stop().animate({
							top: -183
						},200);
					},
					function(e){
						$('img', $(e.target).parent()).stop().animate({
							top: 0
						},200);
						return false;
					}
				);
				
				$('.bottle_template .image_holder, .bottle_template .text').hover(
					function(e){
						anim.go($(e.target));
					},
					function(e){
						anim.stop($(e.target));
					}
				);
			});
		</script>
	</body>
</html>
