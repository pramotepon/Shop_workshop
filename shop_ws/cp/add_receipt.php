<?php
	if($_POST['total']>$_POST['amount']){
		alert('เงินคุณไม่พอจะซื้อสิ่งนี้');
		echo"<script language='javascript'>history.back(1);</script>";
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
?>
<?php
	$orders_id=$_POST['orders_id'];
	$product_id=$_POST['product_id'];
	$product_name=$_POST['product_name'];
	$product_price=$_POST['product_price'];
	$orders_num=$_POST['orders_num'];
	$total=$_POST['total'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mtel=$_POST['mtel'];
	$email=$_POST['email'];
	$adr=$_POST['adr'];
	$amount=$_POST['amount'];
	$date=$_POST['date'];
	$time=$_POST['time'];
?>
<?php
	$sql="SELECT product_id,product_num FROM product WHERE product_id='$product_id'";
	$query=mysqli_query($conn,$sql);
	$result=mysqli_fetch_array($query);
	if($result['product_num']-$orders_num<"0"){
		alert('มีสินค้าไม่พอสำหรับออเดอร์นี้');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
?>
<?php 
	$sql="INSERT INTO
	receipt(orders_id,product_id,product_name,orders_price,orders_num,orders_total,mem_fname,mem_lname,mem_mtel,mem_email,mem_address,orders_amount,orders_date,orders_time,orders_status)VALUES
	('$orders_id','$product_id','$product_name','$product_price','$orders_num','$total','$fname','$lname','$mtel','$email','$adr','$amount','$date','$time','wait')";
	$query=mysqli_query($conn, $sql);
	if($query){
		$sqln="UPDATE product SET product_num=product_num-'$orders_num' WHERE product_id='$product_id'";
		$queryn=mysqli_query($conn,$sqln);
		alert('สั่งซื้อเสร็จสิ้นกรุณาตรวจสอบสถานะ');
		echo"<script language='javascript'>history.back(1);</script>";
		echo"<script language='javascript'>history.back(1);</script>";
		echo"<script language='javascript'>history.back(1);</script>";
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
?>