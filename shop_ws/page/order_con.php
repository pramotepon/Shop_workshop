<?php
	if($_SESSION['mem_id']==""){
		alert('กรุณาเข้าสู่ระบบ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if(isset($_GET['del_id'])){
		$sql="DELETE FROM orders WHERE orders_id='".$_GET['del_id']."'";
		$query=mysqli_query($conn, $sql);
		if($query){
		alert('ลบสินค้าออกจากตระกร้าแล้ว');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
		}
	}
?>

<?php if(isset($_GET['con_id'])){ ?>
	<center>
	<div style="padding-top: 20px; padding-bottom: 20px;">
			<button><a href="?p=cpordcon&con_id=<?php echo $_GET['con_id'];?>&uc&numor=<?php echo $_GET['numor'];?>">ตามข้อมูลผู้ใช้</a></button> | 
			<button><a href="?p=cpordcon&con_id=<?php echo $_GET['con_id'];?>&nc&numor=<?php echo $_GET['numor'];?>">กรอกข้อมูลใหม่</a></button>
			<br><br>
			<?php if(isset($_GET['uc'])){?>
			<form name="ordercon" method="POST" action="?p=chorder&con_id=<?php echo $_GET['con_id'];?>&numor=<?php echo $_GET['numor'];?>" style="background-color: #CFCFCF;">
				<table>
				<tr>
				<td>ชื่อ</td>
				<td>:<input type="text" name="fname" value="<?php echo $_SESSION['mem_fname'];?>"></td>
			</tr>
			<tr>
				<td>นามสกุล</td>
				<td>:<input type="text" name="lname" value="<?php echo $_SESSION['mem_lname'];?>"></td>
			</tr>
			<tr>
				<td>เบอร์ติดต่อ</td>
				<td>:<input type="text" name="mtel" value="<?php echo $_SESSION['mem_mtel'];?>"></td>
			</tr>
			<tr>
				<td>อีเมล</td>
				<td>:<input type="email" name="email" value="<?php echo $_SESSION['mem_email'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td>ที่อยู่:<br><textarea rows="5" name="adr" style="min-height: 80px; max-height: 80px; min-width: 95%; max-width: 95%;"><?php echo $_SESSION['mem_address'];?></textarea></td>
			</tr>
			<tr>
				<td>จำนวนเงิน</td>
				<td>:<input type="number" name="amount"></td>
			</tr>
			<tr>
				<td>วันที่</td>
				<td>:<input type="date" name="date"></td>
			</tr>
			<tr>
				<td>เวลา</td>
				<td>:<input type="time" name="time"></td>
			</tr>
				</table>
				<br>
				<input type="submit" name="" value="ยืนยัน">
			</form>
			<?php }else{ ?>
			<form name="ordercon" method="POST" action="?p=chorder&con_id=<?php echo $_GET['con_id'];?>&numor=<?php echo $_GET['numor'];?>" style="background-color: #CFCFCF;">
				<table>
				<tr>
				<td>ชื่อ</td>
				<td>:<input type="text" name="fname"></td>
			</tr>
			<tr>
				<td>นามสกุล</td>
				<td>:<input type="text" name="lname"></td>
			</tr>
			<tr>
				<td>เบอร์ติดต่อ</td>
				<td>:<input type="text" name="mtel"></td>
			</tr>
			<tr>
				<td>อีเมล</td>
				<td>:<input type="email" name="email"></td>
			</tr>
			<tr>
				<td></td>
				<td>ที่อยู่:<br><textarea rows="5" name="adr" style="min-height: 80px; max-height: 80px; min-width: 95%; max-width: 95%;"></textarea></td>
			</tr>
			<tr>
				<td>จำนวนเงิน</td>
				<td>:<input type="number" name="amount"></td>
			</tr>
			<tr>
				<td>วันที่</td>
				<td>:<input type="date" name="date"></td>
			</tr>
			<tr>
				<td>เวลา</td>
				<td>:<input type="time" name="time"></td>
			</tr>
				</table>
				<br>
				<input type="submit" name="" value="ยืนยัน">
			</form>
			<?php }?>
	</div>
	</center>
<?php } ?>