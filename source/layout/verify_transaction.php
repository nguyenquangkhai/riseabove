<?
include('database.php');
include('include/lib/nusoap.php');
include('include/nganluong.microcheckout.class.php');

//khai bao
$obj = new NL_MicroCheckout(MERCHANT_ID, MERCHANT_PASS, URL_WS);

if ($obj->checkReturnUrlAuto()) {
	$inputs = array(
		'token'		=> $obj->getTokenCode(),//$token_code,
	);
	$result = $obj->getExpressCheckout($inputs);
	if ($result != false) {
		if ($result['result_code'] != '00') {
			die('Mã lỗi '.$result['result_code'].' ('.$result['result_description'].') ');
		}
	} else {
		die('Lỗi kết nối tới cổng thanh toán Ngân Lượng');
	}
} else {
	die('Tham số truyền không đúng');
}

if (isset($result) && !empty($result)) {
	if ($result['result_code'] == '00') {

		$transaction_info = $result['method_payment_name'];
		$order_code = @$_GET['order_code'];
		$payment_id = $result['transaction_id'];
		$payment_type = $result['transaction_type'];
		$status = $result['transaction_status'];
	
		$query = "UPDATE user_payment SET status = '$status', payment_id = $payment_id, payment_type = $payment_type, updttime = NOW() WHERE order_id='$order_code'";
		$r = mysql_query($query);
		if ($r) {
			header('Location: gioithieu.php');
		}
		else {
			header('Location: trangchu.php');
		}

	} else {
		echo $result['result_description'];
	}
}
