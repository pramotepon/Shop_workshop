<?php if($_SESSION['mem_type']!="admin"){
		alert('คุณไม่ใช่ Admin');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
}?>
<div class="admin-frm">
	<a href="?p=admin" style="text-decoration: none; color: white;">จัดการสินค้า</a> | 
	<a href="?p=orderedt" style="text-decoration: none; color: white;">สถานะสินค้า</a> | 
	<a href="?p=useredt" style="text-decoration: none; color: white;">จัดการผู้ใช้งาน</a><br>
	<h1 style="color: white;">ระบบ Admin</h1>
	<div class="i-admin-frm">
	<h2>จัดการสถานะสินค้า</h2>
	<?php
	// แบ่งหน้าแสดงผล
	$perpage = 5;
 	if (isset($_GET['page'])) {
 	$page = $_GET['page'];
 	} else {
 	$page = 1;
 	}
	$start = ($page - 1) * $perpage;

	$sql="SELECT * FROM receipt ORDER BY receipt_id ASC limit {$start} , {$perpage}";
	$query=mysqli_query($conn,$sql);
	//เปลี่ยนหน้า
	$sql2 = "SELECT * FROM receipt";
 	$query2 = mysqli_query($conn, $sql2);
 	$total_record = mysqli_num_rows($query2);
 	$total_page = ceil($total_record / $perpage);
	?>

	<div class="admin-detail">
		<div class="adm-src-pro">
			<form name="frmSearch" method="post" action="">
		Select: 
		<select name="ddlSelect" id="ddlSelect">
          <option>- Select -</option>
          <option value="receipt_id">Receipt_ID</option>
          <option value="mem_fname">Firstname</option>
        </select>
		Keyword: <input type="text" name="txtKeyword">
		<input type="submit" name="btnsrc" value="Search">
			</form>
		</div>
		<?php
		// Search By Name or Email
		
		$strSQL = "SELECT * FROM receipt WHERE 1  ";
		if($_POST["ddlSelect"] != "" and  $_POST["txtKeyword"]  != '')
		{
	  $strSQL .= " AND (".$_POST["ddlSelect"]." LIKE '%".$_POST["txtKeyword"]."%' ) ";
		}	
		$objQuery = mysqli_query($conn,$strSQL);
		?>
		<br>
		<div class="show-product">
<!-- เปลี่ยนหน้า !-->
<div style="text-align: center;">
 <ul class="pagination">หน้า : 
 <li class="cgpage-li">
 <a href="index.php?p=orderedt&page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li class="cgpage-li"><a href="index.php?p=orderedt&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>

 <li class="cgpage-li">
 <a href="index.php?p=orderedt&page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </div>
<br>
		<table class="show-user" border="2">
			<thead>
				<tr>
					<th class="show-user-th" style="width: auto;">R_ID</th>
					<th class="show-user-th disnm" style="width: auto;">Product_name</th>
					<th class="show-user-th disn" style="width: auto;">amount</th>
					<th class="show-user-th disn" style="width: auto;">num</th>
					<th class="show-user-th disn" style="width: auto;">total</th>
					<th class="show-user-th disn" style="width: auto;">Firstname</th>
					<th class="show-user-th disn" style="width: auto;">Lastname</th>
					<th class="show-user-th disn" style="width: auto;">Address</th>
					<th class="show-user-th disn" style="width: auto;">Tel</th>
					<th class="show-user-th disnm" style="width: auto;">Email</th>
					<th class="show-user-th" style="width: auto;">Date_time</th>
					<th class="show-user-th" style="width: auto;">Edit</th>
				</tr>
			</thead>
			<tbody style="background-color: #CFCFCF;">
				<?php if(isset($_POST['btnsrc'])){ ?>
						<?php if($_POST["txtKeyword"]==""){
						alert('กรุณาใส่ Keyword!!!');
						echo"<script language='javascript'>history.back(1);</script>";
						echo"<script language='javascript'>history.back(1);</script>";
						exit();
					} ?>
					<?php if($_POST["ddlSelect"]=="- Select -"){
						alert('กรุณาเลือกหัวข้อการค้นหา');
						echo"<script language='javascript'>history.back(1);</script>";
						echo"<script language='javascript'>history.back(1);</script>";
						exit();
					} ?>
					<?php
						$row = mysqli_num_rows($objQuery); 
						if($row=="0"){
						alert('ไม่พบข้อมูลที่ค้นหา');
						echo"<script language='javascript'>history.back(1);</script>";
						echo"<script language='javascript'>history.back(1);</script>";
						exit();
						}
					?>
					<?
					while($objResult = mysqli_fetch_array($objQuery)){
					?>
					<tr>
						<td><?php echo $objResult['receipt_id'];?></td>
						<td class="disnm"><?php echo $objResult['product_name'];?></td>
						<td class="disn"><?php echo $objResult['orders_price'];?></td>
						<td class="disn"><?php echo $objResult['orders_num'];?></td>
						<td class="disn"><?php echo $objResult['orders_total'];?></td>
						<td class="disn"><?php echo $objResult['mem_fname'];?></td>
						<td class="disn"><?php echo $objResult['mem_lname'];?></td>
						<td class="disn"><?php echo $objResult['mem_address'];?></td>
						<td class="disn"><?php echo $objResult['mem_mtel'];?></td>
						<td class="disnm"><?php echo $objResult['mem_email'];?></td>
						<td>
						<?php echo $objResult['orders_date'];?>
						<?php echo $objResult['orders_time'];?>
						</td>
						<td>
						<?php if($result['orders_status']=="wait"){?>
						<form name="receipt_status" method="POST" action="?p=starecip&reid=<?php echo $objResult['receipt_id'];?>">
						<select name="receipt">
          				<option value="wait">รอการตรวจสอบ</option>
          				<option value="confirm">ตรวจสอบแล้ว</option>
          				<option value="warning">ผิดพลาด</option>
        				</select>
        				<input type="submit" name="chrestatus" value="ยืนยัน">
        				</form>
        				<?php } ?>
        				<?php if($result['orders_status']=="warning"){?>
						<form name="receipt_status" method="POST" action="?p=starecip&reid=<?php echo $objResult['receipt_id'];?>">
						<select name="receipt">
						<option value="warning">ผิดพลาด</option>
          				<option value="wait">รอการตรวจสอบ</option>
          				<option value="confirm">ตรวจสอบแล้ว</option>
        				</select>
        				<input type="submit" name="chrestatus" value="ยืนยัน">
        				</form>
        				<?php } ?>
        				<?php if($result['orders_status']=="confirm"){ ?>
        				<form name="receipt_status" method="POST" action="?p=starecip&reid=<?php echo $objResult['receipt_id'];?>">
						<select name="receipt">
          				<option value="confirm">ตรวจสอบแล้ว</option>
          				<option value="wait">รอการตรวจสอบ</option>
          				<option value="warning">ผิดพลาด</option>
        				</select>
        				<input type="submit" name="chrestatus" value="ยืนยัน">
        			</form>
        			<?php } ?>
        				</td>
						</tr>
					<?php }}else{ ?>
					<?php
					while($result=mysqli_fetch_assoc($query)) {
					?>
				<tr>
					<td><?php echo $result['receipt_id'];?></td>
					<td class="disnm"><?php echo $result['product_name'];?></td>
					<td class="disn"><?php echo $result['orders_price'];?></td>
					<td class="disn"><?php echo $result['orders_num'];?></td>
					<td class="disn"><?php echo $result['orders_total'];?></td>
					<td class="disn"><?php echo $result['mem_fname'];?></td>
					<td class="disn"><?php echo $result['mem_lname'];?></td>
					<td class="disn"><?php echo $result['mem_address'];?></td>
					<td class="disn"><?php echo $result['mem_mtel'];?></td>
					<td class="disnm"><?php echo $result['mem_email'];?></td>
					<td>
						<?php echo $result['orders_date'];?>
						<?php echo $result['orders_time'];?>
					</td>
					<td>
					<?php if($result['orders_status']=="wait"){?>
					<form name="receipt_status" method="POST" action="?p=starecip&reid=<?php echo $result['receipt_id'];?>
					&proid=<?php echo $result['product_id'];?>&num=<?php echo $result['orders_num'];?>">
						<select name="receipt">
          				<option value="wait">รอการตรวจสอบ</option>
          				<option value="confirm">ตรวจสอบแล้ว</option>
          				<option value="warning">ผิดพลาด</option>
        				</select>
        				<input type="submit" name="chrestatus" value="ยืนยัน">
        			</form>
        			<?php } ?>
        			<?php if($result['orders_status']=="warning"){?>
					<form name="receipt_status" method="POST" action="?p=starecip&reid=<?php echo $result['receipt_id'];?>
					&proid=<?php echo $result['product_id'];?>&num=<?php echo $result['orders_num'];?>">
						<select name="receipt">
						<option value="warning">ผิดพลาด</option>
          				<option value="wait">รอการตรวจสอบ</option>
          				<option value="confirm">ตรวจสอบแล้ว</option>
        				</select>
        				<input type="submit" name="chrestatus" value="ยืนยัน">
        			</form>
        			<?php } ?>
        			<?php if($result['orders_status']=="confirm"){ ?>
        			<form name="receipt_status" method="POST" action="?p=starecip&reid=<?php echo $result['receipt_id'];?>
        			&proid=<?php echo $result['product_id'];?>&num=<?php echo $result['orders_num'];?>">
						<select name="receipt">
          				<option value="confirm">ตรวจสอบแล้ว</option>
          				<option value="wait">รอการตรวจสอบ</option>
          				<option value="warning">ผิดพลาด</option>
        				</select>
        				<input type="submit" name="chrestatus" value="ยืนยัน">
        			</form>
        			<?php } ?>
	        		</td>
					</tr>
				<?php }} ?>
			</tbody>
		</table>
	</div>
</div>
</div>
</div>