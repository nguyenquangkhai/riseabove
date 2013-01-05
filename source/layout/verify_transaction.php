<?
include('nganluong.php');
include('database.php');

$transaction_info = $_REQUEST['transaction_info'];
$order_code = $_REQUEST['order_code'];
$price = $_REQUEST['price'];
$payment_id = $_REQUEST['payment_id'];
$payment_type = $_REQUEST['payment_type'];
$error_text = $_REQUEST['error_text'];
$secure_code = $_REQUEST['secure_code'];

$nl = new NL_Checkout();
if($nl->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code)){
	$query = "UPDATE user_payment SET status = 1, payment_id = $payment_id, payment_type = $payment_type, secure_code = $secure_code, updttime = NOW()";
	mysql_query($query);
};
