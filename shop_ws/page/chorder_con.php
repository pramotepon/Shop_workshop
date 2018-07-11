<?php 
	if($_SESSION['mem_id']==""){
		alert('กรุณาเข้าสู่ระบบ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
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
	if (trim($fname)=="") {
		alert('กรุณากรอกข้อมูลให้ครบ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($lname)=="") {
		alert('กรุณากรอกข้อมูลให้ครบ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($mtel)=="") {
		alert('กรุณากรอกข้อมูลให้ครบ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($email)=="") {
		alert('กรุณากรอกข้อมูลให้ครบ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($adr)=="") {
		alert('กรุณากรอกข้อมูลให้ครบ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($amount)=="") {
		alert('กรุณากรอกข้อมูลให้ครบ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($date)=="") {
		alert('กรุณากรอกข้อมูลให้ครบ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($time)=="") {
		alert('กรุณากรอกข้อมูลให้ครบ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
?>
<?php
	$sql="SELECT * FROM orders WHERE orders_id='".$_GET['con_id']."'";
	$query=mysqli_query($conn, $sql);
	$result=mysqli_fetch_array($query);
	
	$sql="SELECT * FROM product WHERE product_id='".$result['product_id']."'";
	$query=mysqli_query($conn, $sql);
	$proresult=mysqli_fetch_array($query);
?>
<div align="center">
			<form name="orderchk" method="POST" action="?p=addreceipt" style="padding-bottom: 20px;">
			<table border="1" style="background-color: #CFCFCF;">
				<h1 style="color: red;">**กรุณาตรวจสอบข้อมูลของคุณ</h1>
				<h2>ข้อมูลสินค้า</h2>
				<tr width="50%"><img src="prod_img/<?php echo $proresult['product_pic'];?>" width="60%"></tr>
				<tr>
					<td>
						รหัสออเดอร์
					</td>
					<td>
						:<input type="text" name="orders_id" value="<?php echo $result['orders_id'];?>" readonly="" />
					</td>
				</tr>
				<tr>
					<td>
						รหัสสินค้า
					</td>
					<td>
						:<input type="text" name="product_id" value="<?php echo $proresult['product_id'];?>" readonly="" />
					</td>
				</tr>
				<tr>
					<td>
						ชื่อสินค้า
					</td>
					<td>
						:<input type="text" name="product_name" value="<?php echo $proresult['product_name'];?>" readonly="" />
					</td>
				</tr>
				<tr>
					<td>
						ราคาชิ้นละ
					</td>
					<td>
						:<input type="text" name="product_price" value="<?php echo $proresult['product_price'];?>" readonly="" />
					</td>
				</tr>
				<tr>
					<td>
						จำนวน
					</td>
					<td>
						:<input type="text" name="orders_num" value="<?php echo $_GET['numor'];?>" readonly="" />
					</td>
				</tr>
				<?php $total=$proresult['product_price']*$_GET['numor'];?>
				<tr>
					<td>
						ราคารวม
					</td>
					<td>
						:<input type="text" name="total" value="<?php echo $total;?>" readonly="" />
					</td>
				</tr>
			</table>
				<h2 style="color: white;">ข้อมูลผู้ใช้</h2>
				<table style="background-color: #CFCFCF;">
				
				<tr>
				<td>ชื่อ</td>
				<td>:<input type="text" name="fname" value="<?php echo $_POST['fname'];?>" readonly="" /></td>
			</tr>
			<tr>
				<td>นามสกุล</td>
				<td>:<input type="text" name="lname" value="<?php echo $_POST['lname'];?>" readonly="" /></td>
			</tr>
			<tr>
				<td>เบอร์ติดต่อ</td>
				<td>:<input type="text" name="mtel" value="<?php echo $_POST['mtel'];?>" readonly="" /></td>
			</tr>
			<tr>
				<td>อีเมล</td>
				<td>:<input type="text" name="email" value="<?php echo $_POST['email'];?>" readonly="" /></td>
			</tr>
			<tr>
				<td></td>
				<td>ที่อยู่:<br><textarea rows="5" name="adr" style="min-height: 80px; max-height: 80px; min-width: 175px; max-width: 175px;" readonly="" /><?php echo $_POST['adr'];?></textarea></td>
			</tr>
			<tr>
				<td>จำนวนเงิน</td>
				<td>:<input type="text" name="amount" value="<?php echo $_POST['amount'];?>" readonly="" /></td>
			</tr>
			<tr>
				<td>วันที่</td>
				<td>:<input type="text" name="date" value="<?php echo $_POST['date'];?>" readonly="" /></td>
			</tr>
			<tr>
				<td>เวลา</td>
				<td>:<input type="text" name="time" value="<?php echo $_POST['time'];?>" readonly="" /></td>
			</tr>
				</table>
				<br>
				<input type="submit" name="" value="ยืนยัน">
				<button><a href="?p=showcart">ยกเลิก</a></button>

			</form>
</div>