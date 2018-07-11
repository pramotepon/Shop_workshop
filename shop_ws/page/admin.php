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
		<h2>เพิ่มสินค้าใหม่</h2>

		<?php 
			$edt_id=$_GET['edt'];
			$sql="SELECT * FROM product where product_id='$edt_id'";
			$query=mysqli_query($conn,$sql);
			$edt_result=mysqli_fetch_array($query);
		?>

		<form name="addprod" method="POST" action="?p=cpproad&edt=<?php echo $edt_result['product_id'];?>&g=<?php echo $edt_result['product_gender'];?>&t=<?php echo $edt_result['product_type'];?>" enctype="multipart/form-data">
			<div class="admin-div">
			<label class="l-admin">ชื่อสินค้า:</label>
			<input type="text" name="product_name" class="i-admin" value="<?php echo $edt_result['product_name'];?>">
			</div>
			<div class="admin-div">
			<label class="l-admin">ยี่ห้อ:</label>
			<input type="text" name="product_brand" class="i-admin" value="<?php echo $edt_result['product_brand'];?>">
			</div>
			<div class="admin-div">
			<label class="l-admin">รุ่น:</label>
			<input type="text" name="product_gen" class="i-admin" value="<?php echo $edt_result['product_gen'];?>">
			</div>
			<div class="admin-div">
			<label class="l-admin">ราคา:</label>
			<input type="text" name="product_price" class="i-admin" value="<?php echo $edt_result['product_price'];?>">
			</div>
			<div class="admin-div">
			<label class="l-admin">รูปภาพประกอบ:</label>
			<input type="file" name="product_pic" class="i-admin">
			</div>
			<div class="admin-div">
			<label class="l-admin">รายละเอียด:</label>
			<textarea class="i-admin" name="product_detail" rows="5" style="min-height: 70px; max-height: 70px;"><?php echo $edt_result['product_detail'];?></textarea><br>
			</div>
			<div class="admin-radio">
			เพศ: 
			<input type="radio" name="product_g" value="all">ทั้งหมด
			<input type="radio" name="product_g" value="male">ชาย
			<input type="radio" name="product_g" value="female">หญิง<br>
			ประเภท: 
			<input type="radio" name="product_t" value="ring">แหวน
			<input type="radio" name="product_t" value="bracelet">กำไล&สร้อยข้อมือ
			<input type="radio" name="product_t" value="necklace">สร้อย
			<input type="radio" name="product_t" value="belt">เข็มขัด
			<input type="radio" name="product_t" value="watch">นาฬิกา
			<input type="radio" name="product_t" value="bag">กระเป๋า
			<input type="radio" name="product_t" value="hat">หมวก<br>
			</div>
			<center>
			<input type="submit" name="" value="เพิ่มสินค้า" style="margin-top: 10px;">
			<input type="submit" name="edt" value="แก้ไขข้อมูลสินค้า" style="margin-top: 10px;">
			</center>
		</form>
	</div>
	<hr>
	<?php
	// แบ่งหน้าแสดงผล
	$perpage = 5;
 	if (isset($_GET['page'])) {
 	$page = $_GET['page'];
 	} else {
 	$page = 1;
 	}
	$start = ($page - 1) * $perpage;

	$sql="SELECT * FROM product limit {$start} , {$perpage}";
	$query=mysqli_query($conn,$sql);
	//เปลี่ยนหน้า
	$sql2 = "SELECT * FROM product ";
 	$query2 = mysqli_query($conn, $sql2);
 	$total_record = mysqli_num_rows($query2);
 	$total_page = ceil($total_record / $perpage);
	?>

	<div class="admin-detail">
		<h2 style="color: white;">จัดการข้อมูลสินค้า</h2>
		<div class="adm-src-pro">
			<form name="frmSearch" method="post" action="" style="color: white;">
		Select: 
		<select name="ddlSelect" id="ddlSelect">
          <option>- Select -</option>
          <option value="product_id">Product_ID</option>
          <option value="product_name">Product_Name</option>
          <option value="product_type">Product_Type</option>
        </select>
		Keyword: <input type="text" name="txtKeyword">
		<input type="submit" name="btnsrc" value="Search">
			</form>
		</div>
		<?php
		// Search By Name or Email
		
		$strSQL = "SELECT * FROM product WHERE 1  ";
		if($_POST["ddlSelect"] != "" and  $_POST["txtKeyword"]  != '')
		{
	  $strSQL .= " AND (".$_POST["ddlSelect"]." LIKE '%".$_POST["txtKeyword"]."%' ) ";
		}	
		$objQuery = mysqli_query($conn,$strSQL);
		?>
		<br>
		<div class="show-product">
<!-- เปลี่ยนหน้า !-->
<div class="cgpage">
 <ul class="pagination">หน้า : 
 <li class="cgpage-li">
 <a href="index.php?p=admin&page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li class="cgpage-li"><a href="index.php?p=admin&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>

 <li class="cgpage-li">
 <a href="index.php?p=admin&page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </div>
<br>
			<table class="show-pro">
				<thead>
					<tr>
						<th class="show-pro-th" style="width: auto;">#</th>
						<th class="show-pro-th">Pic</th>
						<th class="show-pro-th">Name</th>
						<th class="show-pro-th">Type</th>
						<th class="show-pro-th">Price</th>
						<th class="show-pro-th">Store</th>
						<th class="show-pro-th">Edit</th>
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
					<?
					while($objResult = mysqli_fetch_array($objQuery)){
					?>
					<tr>
						<td><?php echo $objResult['product_id'];?></td>
						<td><img src="prod_img/<?php echo $objResult['product_pic'];?>" width="100%"></td>
						<td><?php echo $objResult['product_name'];?></td>
						<td><?php echo $objResult['product_type'];?></td>
						<td><?php echo $objResult['product_price'];?></td>
						<td>
							<a href="?p=numedt&edt=<?php echo $result['product_id'];?>&del" style="text-decoration: none;"> - </a>
							<?php echo $objResult['product_num'];?>
							<a href="?p=numedt&edt=<?php echo $result['product_id'];?>&plus" style="text-decoration: none;"> + </a>
						</td>
						<td><a href="index.php?p=admin&edt=<?php echo $result['product_id'];?>">Edit</a> | 
							<a href="?p=cpproad&del=<?php echo $result['product_id'];?>">Delete</a></td>
					</tr>
					<?php }}else{ ?>
					<?php
					while($result=mysqli_fetch_assoc($query)) {
					?>
					<tr>
						<td><?php echo $result['product_id'];?></td>
						<td><img src="prod_img/<?php echo $result['product_pic'];?>" width="100%"></td>
						<td><?php echo $result['product_name'];?></td>
						<td><?php echo $result['product_type'];?></td>
						<td><?php echo $result['product_price'];?></td>
						<td>
							<a href="?p=numedt&edt=<?php echo $result['product_id'];?>&del" style="text-decoration: none;"> - </a>
							<?php echo $result['product_num'];?>
							<a href="?p=numedt&edt=<?php echo $result['product_id'];?>&plus" style="text-decoration: none;"> + </a>
						</td>
						<td><a href="index.php?p=admin&edt=<?php echo $result['product_id'];?>">Edit</a> | 
							<a href="?p=cpproad&del=<?php echo $result['product_id'];?>">Delete</a></td>
					</tr>
					<?php }} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
