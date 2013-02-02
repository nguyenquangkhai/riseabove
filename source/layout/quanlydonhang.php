<? include('database.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Manager</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width;minimum-scale=0.5,maximum-scale=1.0; user-scalable=1;" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script> 
		<style>
			.head, .body{overflow: hidden; border-bottom: 1px solid #000;}
				.head > div, .body > div{float: left; padding: 10px; margin: 5px 0;}
				.head > div{font-weight: 700;}
			.col-1{min-width: 200px;}
			.col-2{min-width: 500px;}
			.col-3{min-width: 500px;}
				.col-3 > div{display: inline-block; margin: 0 10px;}
			label{display: block; font-weight: 900;}
			.label{display: inline-block; width: 120px; padding: 2px 10px;}
			.text{text-align: center; width: 190px; font-size: 14px;}
		</style>
	</head>

	<body >
		<div>
			<div class="head">
				<div class="col-1">Order ID</div>
				<div class="col-2">Thông tin khách hàng</div>
				<div class="col-3">Mẫu chai rượu</div>
			</div>
				<?
					$query = mysql_query("SELECT * FROM `user_payment` LEFT OUTER JOIN `user_info` ON `user_payment`.`order_id` = `user_info`.`order_id` WHERE `user_payment`.`status` = 4 ORDER BY `user_payment`.`user_payment_id` DESC");
					while($row = mysql_fetch_array($query)){
				?>
					<div class="body">
						<div class="col-1"><?=$row['order_id']?></div>
						<div class="col-2">
							<div>
								<label>From</label>
								<div><span class="label">Tên:</span> <b><?=$row['from_name']?></b></div>
								<div><span class="label">Địa chỉ:</span> <b><?=$row['from_add']?></b></div>
								<div><span class="label">Số điện thoại:</span> <b><?=$row['from_tel']?></b></div>
								<div><span class="label">Email:</span> <b><?=$row['from_mail']?></b></div>
							</div>
							<div>
								<label>To</label>
								<div><span class="label">Tên:</span> <b><?=$row['to_name']?></b></div>
								<div><span class="label">Địa chỉ:</span> <b><?=$row['to_add']?></b></div>
								<div><span class="label">Số điện thoại:</span> <b><?=$row['to_tel']?></b></div>
								<div><span class="label">Email:</span> <b><?=$row['to_mail']?></b></div>
							</div>
							<div>
								<label>Payment</label>
								<div><span class="label">ID:</span> <b><?=$row['payment_id']?></b></div>
								<div><span class="label">Type:</span> <b><?=$row['payment_type']?></b></div>
								<div><span class="label">Số tiền:</span> <b><?=$row['amount']?></b> VND</div>
								<div><span class="label">Ngày tạo:</span> <b><?=$row['addtime']?></b></div>
								<div><span class="label">Ngày thanh toán:</span> <b><?=$row['updttime']?></b></div>
							</div>
						</div>
						<div class="col-3">
							<div title="Template ID: <?=$row['template_id']?>">
								<img alt="Template ID: <?=$row['template_id']?>" src="images/creative/template/template<?=$row['template_id']?>.jpg" />
							</div>
							<div title="Image 1 ID: <?=$row['image_1_id']?>">
								<img alt="Image 1 ID: <?=$row['image_1_id']?>" src="images/creative/images/<?=substr($row['image_1_id'], 0, 1)?>/<?=$row['image_1_id']?>.png" />
							</div>
							<div title="Image 2 ID: <?=$row['image_2_id']?>">
								<img alt="Image 1 ID: <?=$row['image_2_id']?>" src="images/creative/images/<?=substr($row['image_2_id'], 0, 1)?>/<?=$row['image_2_id']?>.png" />
							</div>
							<div class="text">
								<?=$row['text_1']?>
							</div>
							<div class="text">
								<?=$row['text_2']?>
							</div>
						</div>
					</div>
				<? } 
					mysql_close($con);
				?>
		</div>
	</body>
</html>
