<?php
	if($_GET['type']=="ring"){
		$type="แหวน";
	}
	if($_GET['type']=="bracelet"){
		$type="กำไลและสร้อยข้อมือ";
	}
	if($_GET['type']=="necklace"){
		$type="สร้อย";
	}
	if($_GET['type']=="belt"){
		$type="เข็มขัด";
	}
	if($_GET['type']=="watch"){
		$type="นาฬิกา";
	}
	if($_GET['type']=="bag"){
		$type="กระเป๋า";
	}
	if($_GET['type']=="hat"){
		$type="หมวก";
	}
	// แบ่งหน้าแสดงผล
	$perpage = 50;
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
<div class="content">
		<h1>
		<?php 
		if($type!=""){
		echo $type;
		}
		if($_GET['gender']!=""){
			if($_GET['gender']=="all"){
				$gender="ทุกเพศ";
			}
			if($_GET['gender']=="male"){
				$gender="ผู้ชาย";
			}
			if($_GET['gender']=="female"){
				$gender="ผู้หญิง";
			}
			echo "สำหรับ",$gender;
		}else{
		echo "สินค้าทั้งหมด";
		}
		?>
		</h1>
		<div class="cgpage">
 <ul class="pagination">หน้า : 
 <li class="cgpage-li">
 <a href="index.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li class="cgpage-li"><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>

 <li class="cgpage-li">
 <a href="index.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </div><br>
 	<?php
 	if($_GET['gender']!=""&&$type!=""){
 		$strSQL = "SELECT * FROM product WHERE product_gender='".$_GET['gender']."'";
	  $strSQL .= " AND (product_type LIKE '%".$_GET["type"]."%' ) ";
		$objQuery = mysqli_query($conn,$strSQL);
		while($objResult = mysqli_fetch_array($objQuery)){
					?>
		<div class="item">
			<img src="prod_img/<?php echo $objResult['product_pic'];?>" width="100%">
			<h3><?php echo $objResult['product_name'];?></h3>
			<?php echo $objResult['product_detail'];?><br>
			<?php if($objResult['product_num']=="0"){?>
			<font style="color: red;font-size: 15px;">Sold Out!!</font><br>
			<?php }else{ ?>
			<font style="color: gray;font-size: 15px;">คงเหลือ:<?php echo $objResult['product_num'];?></font><br>
			<?php } ?>
			<font style="color: red; font-weight: bold;"><?php echo $objResult['product_price'];?> ฿</font><br><br>
			<button><a href="?p=cpreci&mem_id=<?php echo $_SESSION['mem_id']?>&product_id=<?php echo $objResult['product_id'];?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add cart</a></button>
		</div>
	<?php }}else{ ?>
 	<?php
 	if($_GET['gender']!=""){
 		$strSQL = "SELECT * FROM product WHERE product_gender='".$_GET['gender']."'";
	  $strSQL .= " AND (product_gender LIKE '%".$_GET["gender"]."%' ) ";
		$objQuery = mysqli_query($conn,$strSQL);
		while($objResult = mysqli_fetch_array($objQuery)){
					?>
		<div class="item">
			<img src="prod_img/<?php echo $objResult['product_pic'];?>" width="100%">
			<h3><?php echo $objResult['product_name'];?></h3>
			<?php echo $objResult['product_detail'];?><br>
			<?php if($objResult['product_num']=="0"){?>
			<font style="color: red;font-size: 15px;">Sold Out!!</font><br>
			<?php }else{ ?>
			<font style="color: gray;font-size: 15px;">คงเหลือ:<?php echo $objResult['product_num'];?></font><br>
			<?php } ?>
			<font style="color: red; font-weight: bold;"><?php echo $objResult['product_price'];?> ฿</font><br><br>
			<button><a href="?p=cpreci&mem_id=<?php echo $_SESSION['mem_id']?>&product_id=<?php echo $objResult['product_id'];?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add cart</a></button>
		</div>
	<?php }}else{ ?>
	<?php
 	if($type!=""){
 		$strSQL = "SELECT * FROM product WHERE product_type='".$_GET["type"]."'";
	  $strSQL .= " AND (product_type LIKE '%".$_GET["type"]."%' ) ";
		$objQuery = mysqli_query($conn,$strSQL);
		while($objResult = mysqli_fetch_array($objQuery)){
					?>
		<div class="item">
			<img src="prod_img/<?php echo $objResult['product_pic'];?>" width="100%">
			<h3><?php echo $objResult['product_name'];?></h3>
			<?php echo $objResult['product_detail'];?><br>
			<?php if($objResult['product_num']=="0"){?>
			<font style="color: red;font-size: 15px;">Sold Out!!</font><br>
			<?php }else{ ?>
			<font style="color: gray;font-size: 15px;">คงเหลือ:<?php echo $objResult['product_num'];?></font><br>
			<?php } ?>
			<font style="color: red; font-weight: bold;"><?php echo $objResult['product_price'];?> ฿</font><br><br>
			<button><a href="?p=cpreci&mem_id=<?php echo $_SESSION['mem_id']?>&product_id=<?php echo $objResult['product_id'];?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add cart</a></button>
		</div>

	<?php }}else{ ?>

 		<?php
		while($result=mysqli_fetch_assoc($query)) {
		?>
		<div class="item">
			<a href="?pro_id=<?php echo $result['product_id'];?>"><img src="prod_img/<?php echo $result['product_pic'];?>" width="100%"></a>
			<h3><?php echo $result['product_name'];?></h3>
			<?php echo $result['product_detail'];?><br>
			<?php if($result['product_num']=="0"){?>
			<font style="color: red;font-size: 15px;">Sold Out!!</font><br>
			<?php }else{ ?>
			<font style="color: gray;font-size: 15px;">คงเหลือ:<?php echo $result['product_num'];?></font><br>
			<?php } ?>
			<font style="color: red; font-weight: bold;"><?php echo $result['product_price'];?> ฿</font><br><br>
			<button><a href="?p=cpreci&mem_id=<?php echo $_SESSION['mem_id']?>&product_id=<?php echo $result['product_id'];?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add cart</a></button>
		</div>
		<?php }}}} ?>
</div>