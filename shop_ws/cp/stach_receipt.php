<?php
	$receipt_id=$_GET['reid'];
	$product_id=$_GET['proid'];
	$product_num=$_GET['num'];
	$status=$_POST['receipt'];
?>
<?php if($status=="warning"){?>


<?php 
	$sql="UPDATE receipt SET orders_status='$status' WHERE receipt_id='$receipt_id'";
	$query=mysqli_query($conn,$sql);
	if($query){
		$sqln="UPDATE product SET product_num=product_num+'$product_num' WHERE product_id='$product_id'";
		$queryn=mysqli_query($conn,$sqln);
		alert('Update สถานะของออเดอร์แล้ว');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}else{
		alert('Update ล้มเหลว');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
?>

<?php }else{ ?>

	<?php 
	$sql="UPDATE receipt SET orders_status='$status' WHERE receipt_id='$receipt_id'";
	$query=mysqli_query($conn,$sql);
	if($query){
		alert('Update สถานะของออเดอร์แล้ว');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}?>
	
<?php } ?>