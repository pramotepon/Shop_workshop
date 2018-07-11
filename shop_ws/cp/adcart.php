<?php
	if($_SESSION['mem_id']==""){
		alert('กรุณาลงชื่อเข้าสู่ระบบก่อน');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
?>
<?php
	$mem_id=$_GET['mem_id'];
	$product_id=$_GET['product_id'];
	$sql="INSERT INTO orders(mem_id,product_id,product_num)VALUES('$mem_id','$product_id','1')";
	$query=mysqli_query($conn,$sql);
	alert('จัดสินค้าใส่ตะกร้าสินค้าของคุณแล้ว');
	echo"<script language='javascript'>history.back(1);</script>";
		exit();
?>