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
		<h2>จัดการข้อมูลผู้ใช้งาน</h2>
		<?php
		$uid=$_GET['uid'];
		if($uid!=""){
			$sql="SELECT * FROM member WHERE mem_id='$uid'";
			$query=mysqli_query($conn,$sql);
			$result=mysqli_fetch_array($query);
		?>
		<form name="edtu" method="POST" action="?p=cpusadd&uid=<?php echo $result['mem_id'];?>" enctype="multipart/form-data">
			<div class="admin-div">
			<label class="l-admin">ID:<?php echo $result['mem_id'];?></label>
			</div>
			<div class="admin-div">
			<label class="l-admin">Username:</label>
			<input type="text" name="uusername" class="i-admin" value="<?php echo $result['mem_username'];?>">
			</div>
			<div class="admin-div">
			<label class="l-admin">Password:</label>
			<input type="text" name="upassword" class="i-admin" value="<?php echo $result['mem_password'];?>">
			</div>
			<div class="admin-div">
			<label class="l-admin">Firstname:</label>
			<input type="text" name="ufname" class="i-admin" value="<?php echo $result['mem_fname'];?>">
			</div>
			<div class="admin-div">
			<label class="l-admin">Lastname:</label>
			<input type="text" name="ulname" class="i-admin" value="<?php echo $result['mem_lname'];?>">
			</div>
			<div class="admin-div">
			<label class="l-admin">Birthday:</label>
			<input type="date" name="ubd" class="i-admin" value="<?php echo $result['mem_bd'];?>">
			</div>
			<div class="admin-div">
			<label class="l-admin">Address:</label>
			<textarea name="uadr" class="i-admin" style="min-height: 60px;max-height: 60px;"><?php echo $result['mem_address'];?></textarea>
			</div>
			<div class="admin-div">
			<label class="l-admin">Tel:</label>
			<input type="text" name="utel" class="i-admin" value="<?php echo $result['mem_tel'];?>">
			</div>
			<div class="admin-div">
			<label class="l-admin">Mobile:</label>
			<input type="text" name="umtel" class="i-admin" value="<?php echo $result['mem_mtel'];?>">
			</div>
			<div class="admin-div">
			<label class="l-admin">Email:</label>
			<input type="text" name="uemail" class="i-admin" value="<?php echo $result['mem_email'];?>">
			</div><br><br>
			<div class="admin-div">
			<label class="l-admin">User Type:</label>
			<?php
			if($result['mem_type']=="user"){ 
			?>
			<select name="utype">
				<option value="user">User</option>
				<option value="admin">Admin</option>
			</select>
			<?php }else{ ?>
			<select name="utype">
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
			<?php }?>
			</div><br><br>
			<center>
			<input type="submit" name="edtu" value="ยืนยัน">
			<button><a href="?p=useredt" style="text-decoration: none; color: black;">ยกเลิก</a></button>
			</center>
		</form><br>
		<?php } ?>
	<?php
	// แบ่งหน้าแสดงผล
	$perpage = 5;
 	if (isset($_GET['page'])) {
 	$page = $_GET['page'];
 	} else {
 	$page = 1;
 	}
	$start = ($page - 1) * $perpage;

	$sql="SELECT * FROM member limit {$start} , {$perpage}";
	$query=mysqli_query($conn,$sql);
	//เปลี่ยนหน้า
	$sql2 = "SELECT * FROM member ";
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
          <option value="mem_id">ID</option>
          <option value="mem_username">Username</option>
          <option value="mem_fname">FirstName</option>
          <option value="mem_pass">Lastname</option>
          <option value="mem_tel">Tel</option>
          <option value="mem_mtel">Mobile</option>
          <option value="mem_type">Status</option>
        </select>
		Keyword: <input type="text" name="txtKeyword">
		<input type="submit" name="btnsrc" value="Search">
			</form>
		</div>
		<?php
		// Search By Name or Email
		
		$strSQL = "SELECT * FROM member WHERE 1  ";
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
 <a href="index.php?p=useredt&page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li class="cgpage-li"><a href="index.php?p=useredt&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>

 <li class="cgpage-li">
 <a href="index.php?p=useredt&page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </div>
<br>
		<table class="show-user" border="2">
			<thead>
				<tr>
					<th class="show-user-th" style="width: auto;">ID</th>
					<th class="show-user-th" style="width: auto;">Username</th>
					<th class="show-user-th disn">Password</th>
					<th class="show-user-th disn">Firstname</th>
					<th class="show-user-th disn">Lastname</th>
					<th class="show-user-th disn">Address</th>
					<th class="show-user-th disn">Tel</th>
					<th class="show-user-th disnm">Email</th>
					<th class="show-user-th disnm" style="width: auto;">Status</th>
					<th class="show-user-th" style="text-align: right;">Edit</th>
				</tr>
			</thead>
			<tbody style="background-color: #CFCFCF;">
				<?php if(isset($_POST['btnsrc'])){ ?>
						<?php if($_POST["txtKeyword"]==""){
						alert('กรุณาใส่ Keyword!!!');
						echo"<script language='javascript'>history.back(1);</script>";
						exit();
					} ?>
					<?php if($_POST["ddlSelect"]=="- Select -"){
						alert('กรุณาเลือกหัวข้อการค้นหา');
						echo"<script language='javascript'>history.back(1);</script>";
						exit();
					} ?>
					<?php
						$row = mysqli_num_rows($objQuery); 
						if($row=="0"){
						alert('ไม่พบข้อมูลที่ค้นหา');
						echo"<script language='javascript'>history.back(1);</script>";
						exit();
						}
					?>
					<?
					while($objResult = mysqli_fetch_array($objQuery)){
					?>
					<tr>
						<td><?php echo $objResult['mem_id'];?></td>
						<td><?php echo $objResult['mem_username'];?></td>
						<td class="disn"><?php echo $objResult['mem_password'];?></td>
						<td class="disn"><?php echo $objResult['mem_fname'];?></td>
						<td class="disn"><?php echo $objResult['mem_lname'];?></td>
						<td class="disn"><?php echo $objResult['mem_address'];?></td>
						<td class="disn"><?php echo $objResult['mem_tel'];?>,<?php echo $objResult['mem_mtel'];?></td>
						<td class="disnm"><?php echo $objResult['mem_email'];?></td>
						<td class="disnm"><?php echo $objResult['memtype'];?></td>
						<td><a href="">Edit</a>|<a href="">Delete</a></td>
					</tr>
					<?php }}else{ ?>
					<?php
					while($result=mysqli_fetch_assoc($query)) {
					?>
				<tr>
					<td><?php echo $result['mem_id'];?></td>
					<td><?php echo $result['mem_username'];?></td>
					<td class="disn"><?php echo $result['mem_password'];?></td>
					<td class="disn"><?php echo $result['mem_fname'];?></td>
					<td class="disn"><?php echo $result['mem_lname'];?></td>
					<td class="disn"><?php echo $result['mem_address'];?></td>
					<td class="disn"><?php echo $result['mem_tel'];?>,<?php echo $result['mem_mtel'];?></td>
					<td class="disnm"><?php echo $result['mem_email'];?></td>
					<td class="disnm"><?php echo $result['mem_type'];?></td>
					<td style="text-align: right;"><a href="?p=useredt&uid=<?php echo $result['mem_id'];?>">Edit</a>|<a href="">Delete</a></td>
				</tr>
				<?php }} ?>
			</tbody>
		</table>
	</div>
</div>
</div>
</div>