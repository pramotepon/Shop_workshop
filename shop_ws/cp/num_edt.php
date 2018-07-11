<?php
	$product_id=$_GET['edt'];
	if(isset($_GET['del'])){
		$sql="UPDATE product SET product_num=product_num-1 WHERE product_id='$product_id'";
		$query=mysqli_query($conn,$sql);
		if($query){
		alert('ลบจำนวนสินค้าแล้ว');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
		}
	}
	if(isset($_GET['plus'])){
		$sql="UPDATE product SET product_num=product_num+1 WHERE product_id='$product_id'";
		$query=mysqli_query($conn,$sql);
		if($query){
		alert('เพิ่มจำนวนสินค้าแล้ว');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
		}
	} 
?>

<!-- Orders Num !-->
<?php
	$orders_id=$_GET['ordid'];
	if(isset($_GET['ordel'])){
		$chsql="SELECT product_num FROM orders WHERE orders_id=$orders_id";
		$chquery=mysqli_query($conn,$chsql);
		$chresult=mysqli_fetch_array($chquery);

		if($chresult['product_num']-"1"<="0"){
		$zesql="DELETE FROM orders WHERE orders_id=$orders_id";
		$zaquery=mysqli_query($conn,$zesql);
		}

		if($zaquery){
		alert('ลบสินค้านี้จากตระกร้าคุณแล้ว');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
		}

		$sql="UPDATE orders SET product_num=product_num-1 WHERE orders_id='$orders_id'";
		$query=mysqli_query($conn,$sql);

		if($query){
		alert('ลบจำนวนสินค้าแล้ว');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
		}
	}
	if(isset($_GET['orplus'])){
		$sql="UPDATE orders SET product_num=product_num+1 WHERE orders_id='$orders_id'";
		$query=mysqli_query($conn,$sql);
		if($query){
		alert('เพิ่มจำนวนสินค้าแล้ว');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
		}
	} 
?>