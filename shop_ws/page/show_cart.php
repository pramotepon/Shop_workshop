<?php
	if($_SESSION['mem_id']==""){
		alert('กรุณาเข้าสู่ระบบก่อน');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	$sql="SELECT * FROM orders WHERE mem_id='".$_SESSION['mem_id']."'";
	$query=mysqli_query($conn,$sql);
?>
<div class="order-frm">
	<h1 style="text-align: center; padding-top: 20px; padding-bottom: 20px;">ตระกร้าสินค้าของคุณ</h1>
<table class="order-t">
	<thead>
		<tr>
			<th style="width: auto;">#</th>
			<th style="width: 20%;">Picture</th>
			<th class="order-th" style="width: auto;">Name</th>
			<th style="width: auto;">Num</th>
			<th style="width: auto;">Price</th>
			<th style="width: auto;">Total</th>
			<th style="width: auto;">Status</th>
		</tr>
	</thead>
	<tbody>

<?php while($result=mysqli_fetch_array($query)){
	$product_id=$result['product_id'];
	$prosql="SELECT * FROM product WHERE product_id=$product_id";
	$proquery=mysqli_query($conn,$prosql);
	while($proresult=mysqli_fetch_array($proquery)){

	$numsql="SELECT * FROM orders WHERE product_id='".$proresult['product_id']."'";
	$numquery = mysqli_query($conn, $numsql);
	$numorders = mysqli_num_rows($numquery);
	$total=$proresult['product_price']*$result['product_num'];;

	$resql="SELECT * FROM receipt WHERE orders_id='".$result['orders_id']."'";
	$requery=mysqli_query($conn, $resql);
	$receipt=mysqli_fetch_array($requery);
?>
	<!-- แสดงข้อมูลจ้า!-->
	<?php if($receipt['orders_id']==$result['orders_id']){?>
		<tr>
			<td style="width: auto;">
				<?php echo $receipt['receipt_id'];?>
			</td>
			<td style="width: auto;">
				<img src="prod_img/<?php echo $proresult['product_pic'];?>" style="height: 180px;" width="100%">
			</td>
			<td class="order-th" style="width: auto; padding-top: 80px;">
				<?php echo $receipt['product_name'];?>
			</td>
			<td style="width: auto;">
				<?php echo $receipt['orders_num'];?>
			</td>
			<td style="width: auto;">
				<?php echo $receipt['orders_price'];?>
			</td>
			<td style="width: auto;">
				<?php echo $receipt['orders_total'];?>
			</td>
			<td style="width: auto;">
				<?php if($receipt['orders_status']=="wait"){?>
					<font style="color: orange;">**รอการตรวจสอบ</font>
				<?php } ?>
				<?php if($receipt['orders_status']=="warning"){?>
					<font style="color: red;">**ล้มเหลว</font>
				<?php } ?>
				<?php if($receipt['orders_status']=="confirm"){?>
					<font style="color: green;">**กำลังจัดส่ง</font>
				<?php }?><br>
				<?php echo $receipt['orders_date'];?>
				<?php echo $receipt['orders_time'];?>
			</td>
		</tr>
	<?php }else{ ?>
		<tr>
			<td style="width: auto;">
				<?php echo $result['orders_id'];?>
			</td>
			<td style="width: auto;">
				<img src="prod_img/<?php echo $proresult['product_pic'];?>" style="height: 180px;" width="100%">
			</td>
			<td class="order-th" style="width: auto; padding-top: 80px;">
				<?php echo $proresult['product_name'];?>
			</td>
			<td style="width: auto;">
				<a href="?p=numedt&ordel&ordid=<?php echo $result['orders_id'];?>"> - </a>
				<?php echo $result['product_num'];?>
				<a href="?p=numedt&orplus&ordid=<?php echo $result['orders_id'];?>"> + </a>
			</td>
			<td style="width: auto;">
				<?php echo $proresult['product_price'];?>
			</td>
			<td style="width: auto;">
				<?php echo $total;?>
			</td>
			<td style="width: auto;">
				<?php if($receipt['orders_status']=="wait"){?>
					<font style="color: orange;">**รอการตรวจสอบ</font>
				<?php } ?>
				<?php if($receipt['orders_status']=="warning"){?>
					<font style="color: red;">**ล้มเหลว</font>
				<?php } ?>
				<?php if($receipt['orders_status']=="confirm"){?>
					<font style="color: green;">**กำลังจัดส่ง</font>
				<?php }?>
				<?php if($receipt['orders_status']==""){?>
				<a href="?p=cpordcon&con_id=<?php echo $result['orders_id'];?>&numor=<?php echo $result['product_num'];?>">ยืนยันการซื้อ</a> | 
				<a href="?p=cpordcon&del_id=<?php echo $result['orders_id'];?>">ยกเลิก</a>
				<?php }?>
			</td>
		</tr>
<?php }}}?>

</tbody>
</table>
</div>