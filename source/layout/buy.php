<?
include('database.php');
include('nganluong.php');

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

$flag = true;
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
					`updttime`)
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
					NOW()
					);";
mysql_query($insert_user_info_query, $con);
$last_info_id = mysql_insert_id($con);
$insert_user_payment_query = "INSERT INTO `user_payment`
										(`user_info_id`,
										`amount`,
										`tax`,
										`discount`,
										`addtime`,
										`updttime`)
										VALUES
										(
										$last_info_id,
										$_price,
										$_tax,
										$_discount,
										NOW(),
										NOW()
										);
										";		
mysql_query($insert_user_payment_query, $con);
$_order_code = mysql_insert_id();

$nl = new NL_Checkout();
$url = $nl->buildCheckoutUrlNew($_return_url, $_reciever, $_transaction_info, $_order_code, $_price);
if ($_order_code != 0) {
	echo '<meta http-equiv="refresh" content="0;url='.$url.'">';
}else{
	echo "Error";
}
