<?php
	$username=$_POST['username'];
	$password=$_POST['pass'];
?>
<?php
	if (trim($username)=="") {
		alert('กรุณากรอกชื่อผู้ใช้');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($password)=="") {
		alert('กรุณากรอกรหัสผ่าน');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	$sql="SELECT mem_username FROM member WHERE mem_username = '".mysqli_escape_string($conn,$username)."'";
	$objQuery=mysqli_query($conn,$sql);
	$objResult=mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult){
		alert('กรอกชื่อผู้ใช้ให้ถูกต้อง!!');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	$sql="SELECT mem_password FROM member WHERE mem_password = '".mysqli_escape_string($conn,$password)."'";
	$objQuery=mysqli_query($conn,$sql);
	$objResult=mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult){
		alert('กรอกรหัสผ่านของคุณ '.$username.' ให้ถูกต้อง!!');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}else{

		$sql="SELECT * FROM member WHERE mem_username = '".mysqli_escape_string($conn,$username)."' 
		and mem_password = '".mysqli_escape_string($conn,$password)."'";
		$objQuery=mysqli_query($conn,$sql);
		$objResult=mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

		$_SESSION["mem_id"]=$objResult["mem_id"];
		$_SESSION["mem_username"]=$objResult["mem_username"];
		$_SESSION["mem_password"]=$objResult["mem_password"];
		$_SESSION["mem_fname"]=$objResult["mem_fname"];
		$_SESSION["mem_lname"]=$objResult["mem_lname"];
		$_SESSION["mem_bd"]=$objResult["mem_bd"];
		$_SESSION["mem_address"]=$objResult["mem_address"];
		$_SESSION["mem_tel"]=$objResult["mem_tel"];
		$_SESSION["mem_mtel"]=$objResult["mem_mtel"];
		$_SESSION["mem_email"]=$objResult["mem_email"];
		$_SESSION["mem_type"]=$objResult["mem_type"];

		alert('เข้าสู่ระบบเรียบร้อย');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}

?>