<?
include('database.php');
include('chai.php');

$template = addslashes($_POST['template'] == '' ? 1 : $_POST['template']);
$topic = addslashes($_POST['topic'] == '' ? 1 : $_POST['topic']);
$image_1 = addslashes($_POST['image_1'] == '' ? '' : $_POST['image_1']);
$image_2 = addslashes($_POST['image_2'] == '' ? 0 : $_POST['image_2']);
$text_1 = addslashes($_POST['text_1']);
$text_2 = addslashes($_POST['text_2']);
$from = addslashes($_POST['from']);
$to = addslashes($_POST['to']);
$from_name = addslashes($_POST['from_name']);
$from_add = addslashes($_POST['from_add']);
$from_tel = addslashes($_POST['from_tel']);
$from_mail = addslashes($_POST['from_mail']);
$to_name = addslashes($_POST['to_name']);
$to_add = addslashes($_POST['to_add']);
$to_tel = addslashes($_POST['to_tel']);
$to_mail = addslashes($_POST['to_mail']);
$order_id = addslashes($_POST['order_id']);
$save = addslashes($_POST['save']);

$inf_ok = ($from_name!='' || $from_add!='' || $from_tel!='' || $from_mail!='' || $to_name!='' || $to_add!='' || $to_tel!='' || $to_mail!='') ? true : false;
var_dump($inf_ok);
$is_ok = false;
$query = "select * from user_info where order_id = '$order_id'";
$flag = mysql_num_rows(mysql_query($query, $con));
if($flag == 0) {
	$insert_user_info_query = "INSERT INTO `user_info`
						(`template_id`,
						`topic_id`,
						`image_1_id`,
						`image_2_id`,
						`text_1`,
						`text_2`,
						`from`,
						`to`,
						`from_name`,
						`from_add`,
						`from_tel`,
						`from_mail`,
						`to_name`,
						`to_add`,
						`to_tel`,
						`to_mail`,
						`addtime`,
						`updttime`,
						`order_id`)
						VALUES
						(
						$template,
						$topic,
						$image_1,
						$image_2,
						'$text_1',
						'$text_2',
						'$from',
						'$to',
						'$from_name',
						'$from_add',
						'$from_tel',
						'$from_mail',
						'$to_name',
						'$to_add',
						'$to_tel',
						'$to_mail',
						NOW(),
						NOW(),
						'$order_id'
						);";
	mysql_query($insert_user_info_query, $con);
	$last_info_id = mysql_insert_id($con);
	$insert_user_payment_query = "INSERT INTO `user_payment`
											(`user_info_id`,
											`amount`,
											`tax`,
											`discount`,
											`addtime`,
											`updttime`,
											`order_id`)
											VALUES
											(
											$last_info_id,
											$_price,
											$_tax,
											$_discount,
											NOW(),
											NOW(),
											'$order_id'
											);
											";		
	$is_ok = mysql_query($insert_user_payment_query, $con);
	$_order_code = mysql_insert_id();
	if($save == 1 && $inf_ok){
		$gallery_id = create_chai($template, $topic, $image_1, $image_2, $text_1, $text_2, $last_info_id);
		if($gallery_id != NULL){
		 $insert_gallery_query = "INSERT INTO gallery_image (`name_image`, `show`) VALUES ('$gallery_id', $save)";
		 mysql_query($insert_gallery_query, $con);
		}
	}
}
else {
	$obj = mysql_fetch_object(mysql_query($query, $con));
	$query = "
		UPDATE user_info
		SET `template_id` = $template,
			`topic_id` = $topic,
			`image_1_id` = $image_1,
			`image_2_id` = $image_2,
			`text_1` = '$text_1',
			`text_2` = '$text_2',
			`from` = '$from',
			`to` = '$to',
			`from_name` = '$from_name',
			`from_add` = '$from_add',
			`from_tel` = '$from_tel',
			`from_mail` = '$from_mail',
			`to_name` = '$to_name',								
			`to_add` = '$to_add',
			`to_tel` = '$to_tel',
			`to_mail` = '$to_mail',
			`updttime` = NOW()
		WHERE order_id = '$order_id'
	";
	$is_ok = mysql_query($query, $con);
	if($save == 1 && $inf_ok){
		$gallery_id = create_chai($template, $topic, $image_1, $image_2, $text_1, $text_2, $obj->user_info_id);
		if($gallery_id != NULL){
			$query = "select * from gallery_image where name_image = '$gallery_id'";
			$flag_gallery = mysql_num_rows(mysql_query($query, $con));
			if(!$flag_gallery){
				 $insert_gallery_query = "INSERT INTO gallery_image (`name_image`, `show`) VALUES ('$gallery_id', $save)";
				 mysql_query($insert_gallery_query, $con);
			}
		}
	}
}
if ($is_ok) {
	echo 'success';
}
else {
	echo "fail";
}
?>