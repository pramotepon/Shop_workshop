<?php
	$product_name=$_POST['product_name'];
	$product_brand=$_POST['product_brand'];
	$product_gen=$_POST['product_gen'];
	$product_price=$_POST['product_price'];
	$product_detail=$_POST['product_detail'];
	$product_g=$_POST['product_g'];
	$product_t=$_POST['product_t'];
?>
<?php 
// เมื่อกด Delete สินค้า
if(isset($_GET['del'])){
		$delpro_id=$_GET['del'];
		$sql="DELETE FROM product WHERE product_id='$delpro_id'";
		if(mysqli_query($conn,$sql)){
		alert('ลบสินค้าเรียบร้อย');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
		}
	}
// เมื่อกดปุ้ม แก้ไขข้อมูล
	if(isset($_POST['edt'])){
// ตรวจสอบค่าว่าง
		if (trim($product_name)=="") {
		alert('กรุณากรอกชื่อสินค้า');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($product_brand)=="") {
		alert('กรุณากรอกยี่ห้อ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($product_gen)=="") {
		alert('กรุณากรอกรุ่นหรือ "-" ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($product_price)=="") {
		alert('กรุณากรอกราคาสินค้า');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($product_detail)=="") {
		alert('กรุณากรอกรายละเอียดสินค้า');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	// ถ้ามีการเปลี่ยนค่า เพศ และ ชนิดของสินค้า
		$product_id=$_GET['edt'];
		if($product_g==""){
			$product_g=$_GET['g'];
		}
		if($product_t==""){
			$product_t=$_GET['t'];
		}
// ถ้าไฟล์รูปไม่ใช่ค่าว่างให้จัดทำไฟล์รูปขึ้นมา
	if($_FILES["product_pic"]['name'] != ""){
			// ตรวจสอบไฟล์รูปภาพ
	$jpg="image/jpg";
	$jpeg="image/jpeg";
	$png="image/png";
	$gif="image/gif";
	$bmp="image/bmp";
	if($_FILES['product_pic']['type'] == $jpg){

	}
	elseif($_FILES['product_pic']['type'] == $jpeg){

	}
	elseif($_FILES['product_pic']['type'] == $png){

	}
	elseif($_FILES['product_pic']['type'] == $gif){

	}
	elseif($_FILES['product_pic']['type'] == $bmp){

	}else{
		alert('กรุณาตรวจสอบไฟล์รูปภาพ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	$ext = pathinfo(basename($_FILES['product_pic']['name']), PATHINFO_EXTENSION);
			$new_image_name = 'img_'.uniqid().'.'.$ext;
			$image_path = "prod_img/";
			$upload_path = $image_path.$new_image_name;
			move_uploaded_file($_FILES['product_pic']['tmp_name'],$upload_path);
			$pic = $new_image_name;
// Update แก้ไขข้อมูลสินค้า
		$sql ="UPDATE product SET product_name='$product_name', product_brand='$product_brand', product_gen='$product_gen', product_price='$product_price', product_detail='$product_detail', product_gender='$product_g', product_type='$product_t', product_pic='$pic' WHERE product_id='$product_id'";
		$result=mysqli_query($conn,$sql);
		if($result){
			alert('การแก้ไขเสร็จสิ้น');
			echo"<script language='javascript'>history.back(1);</script>";
			exit();
		}else{
			alert('ERROR');
			echo"<script language='javascript'>history.back(1);</script>";
			exit();
		}
	}
	//ถ้ารูปเป็นค่าว่าง
	if($_FILES["product_pic"]['name'] == ""){
		$sql ="UPDATE product SET product_name='$product_name', product_brand='$product_brand', product_gen='$product_gen', product_price='$product_price', product_detail='$product_detail', product_gender='$product_g', product_type='$product_t' WHERE product_id='$product_id'";
		$result=mysqli_query($conn,$sql);
		if($result){
			alert('การแก้ไขเสร็จสิ้น');
			echo"<script language='javascript'>history.back(1);</script>";
			exit();
		}else{
			alert('ERROR');
			echo"<script language='javascript'>history.back(1);</script>";
			exit();
		}
	}
	}

?>

<?php
// Check ""
	if (trim($product_name)=="") {
		alert('กรุณากรอกชื่อสินค้า');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($product_brand)=="") {
		alert('กรุณากรอกยี่ห้อ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($product_gen)=="") {
		alert('กรุณากรอกรุ่นหรือ "-" ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($product_price)=="") {
		alert('กรุณากรอกราคาสินค้า');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($product_detail)=="") {
		alert('กรุณากรอกรายละเอียดสินค้า');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($product_g)=="") {
		alert('กรุณาเลือกเพศที่เหมาะสม');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($product_t)=="") {
		alert('กรุณาเลือกชนิดของสินค้า');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
// Check Img File
	$jpg="image/jpg";
	$jpeg="image/jpeg";
	$png="image/png";
	$gif="image/gif";
	$bmp="image/bmp";
	if($_FILES['product_pic']['type'] == $jpg){

	}
	elseif($_FILES['product_pic']['type'] == $jpeg){

	}
	elseif($_FILES['product_pic']['type'] == $png){

	}
	elseif($_FILES['product_pic']['type'] == $gif){

	}
	elseif($_FILES['product_pic']['type'] == $bmp){

	}else{
		alert('กรุณาตรวจสอบไฟล์รูปภาพ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
?>

<?php
	if($_FILES["product_pic"] != ""){
	$ext = pathinfo(basename($_FILES['product_pic']['name']), PATHINFO_EXTENSION);
			$new_image_name = 'img_'.uniqid().'.'.$ext;
			$image_path = "prod_img/";
			$upload_path = $image_path.$new_image_name;
			move_uploaded_file($_FILES['product_pic']['tmp_name'],$upload_path);
			$pic = $new_image_name;
			}
	$sql="INSERT into product
	(product_name,product_brand,product_gen,product_price,product_detail,product_gender,product_type,product_pic,product_num) 
	VALUES('$product_name','$product_brand','$product_gen','$product_price','$product_detail','$product_g','$product_t','$pic','1')"; 
	$query=mysqli_query($conn,$sql);
	if($query){
		alert('การลงข้อมูลสินค้าเสร็จสิ้น');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
?>
