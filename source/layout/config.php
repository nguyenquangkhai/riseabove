<?

$_host = "localhost";
$_username = "root";
$_password = "123456";
$_database = "riseabove";

$_reciever = "pikqilee@gmail.com";
$_price = 1000000;
$_transaction_info="Thanh toan hoa don mua ruou Martell";
$_order_description="Ghi chú đơn hàng";
$_buyer_info="Ghi chú người mua hàng";
$_currency= "vnd";
$_quantity=1;
$_tax=0;
$_discount=0;
$_fee_cal=0;
$_fee_shipping=0;
$_return_url = "http://quatang.riseabove.vn/verify_transaction.php";
$_cancel_url = "http://quatang.riseabove.vn/trangchu.php";
$_items = array(
	array(
		'item_name'		=> 'Rượu Martell',
		'item_quanty'	=> 1,
		'item_amount'	=> $_price)
);

define('MERCHANT_ID', '26275');// Biến này được cấp khi đăng ký merchantsite( đăng ký website trên Ngân Lượng)
define('MERCHANT_PASS', 'nganluong456');// Biến này là mật khẩu giao tiếp khi đăng ký merchantsite bạn nhập vào
define('RECEIVER', $_reciever);// Email chính đăng ký trên Ngân Lượng

define('URL_WS', 'https://www.nganluong.vn/micro_checkout_api.php?wsdl');

define('PAGE_TITLE', 'Quà tặng tết');
define('FALVICON_PATH', 'images/favicon.png');
/*
$_host = "db.hostvn.net";
$_username = "fasia_riseabove";
$_password = "#bi$7g##";
$_database = "fasia_riseabove";
*/

?>