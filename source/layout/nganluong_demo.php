<?php
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
class NL_Checkout 
{
	// URL chheckout của nganluong.vn
	private $nganluong_url = 'https://www.nganluong.vn/checkout.php';

	// Mã merchante site 
	private $merchant_site_code = '17185';	// Biến này được nganluong.vn cung cấp khi bạn đăng ký merchant site

	// Mật khẩu bảo mật
	private $secure_pass= '123456789'; // Biến này được nganluong.vn cung cấp khi bạn đăng ký merchant site

	
	public function buildCheckoutUrlNew($return_url, $receiver, $transaction_info, $order_code, $price, $currency = 'vnd', $quantity = 1, $tax = 0, $discount = 0, $fee_cal = 0, $fee_shipping = 0, $order_description = '', $buyer_info = '', $affiliate_code = '')
	{	
		$arr_param = array(
			'merchant_site_code'=>	strval($this->merchant_site_code),
			'return_url'		=>	strval(strtolower($return_url)),
			'receiver'			=>	strval($receiver),
			'transaction_info'	=>	strval($transaction_info),
			'order_code'		=>	strval($order_code),
			'price'				=>	strval($price),
			'currency'			=>	strval($currency),
			'quantity'			=>	strval($quantity),
			'tax'				=>	strval($tax),
			'discount'			=>	strval($discount),
			'fee_cal'			=>	strval($fee_cal),
			'fee_shipping'		=>	strval($fee_shipping),
			'order_description'	=>	strval($order_description),
			'buyer_info'		=>	strval($buyer_info),
			'affiliate_code'	=>	strval($affiliate_code)
		);
		$secure_code ='';
		$secure_code = implode(' ', $arr_param) . ' ' . $this->secure_pass;
		$arr_param['secure_code'] = md5($secure_code);
		/* */
		$redirect_url = $this->nganluong_url;
		if (strpos($redirect_url, '?') === false) {
			$redirect_url .= '?';
		} else if (substr($redirect_url, strlen($redirect_url)-1, 1) != '?' && strpos($redirect_url, '&') === false) {
			$redirect_url .= '&';			
		}
				
		/* */
		$url = '';
		foreach ($arr_param as $key=>$value) {
			$value = urlencode($value);
			if ($url == '') {
				$url .= $key . '=' . $value;
			} else {
				$url .= '&' . $key . '=' . $value;
			}
		}
		
		return $redirect_url.$url;
	}
	
	
	
	/*Hàm thực hiện xác minh tính đúng đắn của các tham số trả về từ nganluong.vn*/
	
	public function verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code)
	{
		// Tạo mã xác thực từ chủ web
		$str = '';
		$str .= ' ' . strval($transaction_info);
		$str .= ' ' . strval($order_code);
		$str .= ' ' . strval($price);
		$str .= ' ' . strval($payment_id);
		$str .= ' ' . strval($payment_type);
		$str .= ' ' . strval($error_text);
		$str .= ' ' . strval($this->merchant_site_code);
		$str .= ' ' . strval($this->secure_pass);

        // Mã hóa các tham số
		$verify_secure_code = '';
		$verify_secure_code = md5($str);
		
		// Xác thực mã của chủ web với mã trả về từ nganluong.vn
		if ($verify_secure_code === $secure_code) return true;
		
		return false;
	}
}

if (isset($_POST['submit'])) {
	// Lấy các tham số để chuyển sang Ngânlượng thanh toán:

 //$ten= $_POST["txt_test"];
    $receiver="kieunghia.luckystar@gmail.com";
	//Khai báo url trả về 
	$return_url="http://hungmarketing.net/im-coaching-confirmation-now";
	//Giá của cả giỏ hàng 
	$price=$_POST["txt_gia"];
	//Mã đơn hàng 
	$order_code=$_POST["txt_madonhang"];
	//Thông tin giao dịch
	$transaction_info="Thanh toan dang ky thanh vien";
	$currency= "vnd";
	$quantity=1;
	$tax=0;
	$discount=0;
	$fee_cal=0;
	$fee_shipping=0;
	$order_description="Ghi chú đơn hàng";
	$buyer_info="Ghi chú người mua hàng";
	$affiliate_code="";
    //Khai báo đối tượng của lớp NL_Checkout
	$nl= new NL_Checkout();
	//Tạo link thanh toán đến nganluong.vn
	$url= $nl->buildCheckoutUrlNew($return_url, $receiver, $transaction_info, $order_code, $price, $currency, $quantity, $tax, $discount , $fee_cal,    $fee_shipping, $order_description, $buyer_info , $affiliate_code);
	
    if ($order_code != "") {
	//die($url);
		echo '<meta http-equiv="refresh" content="0;url='.$url.'">';
	}
	
}
?>
<script type="text/javascript">
function check(){
		var price = document.Test.txt_gia.value;
		
		if (price < 2000) {
		
		alert('Số tiền tối thiểu lớn hơn 2000 VNĐ');
		return false;
		}
		
	return true;
}
</script>

<body>
<form name="Test"  method="post" action="" onsubmit="return check();">
<label><strong>Mã đơn hàng:</strong></label>
<input  type="text" name="txt_madonhang" size="28" />
<br />
<label><strong>Đơn giá:</strong></label>
<input name="txt_gia" type="text" size="28" />
<br />
<input  type="submit" name="submit" value="Thanh toán">
</form>


</body>
</html>

