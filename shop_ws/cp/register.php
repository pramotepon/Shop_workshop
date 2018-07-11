<?php
	$username=$_POST['username'];
	$pass=$_POST['password'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$bd=$_POST['bd'];
	$adr=$_POST['adr'];
	$tel=$_POST['tel'];
	$mtel=$_POST['mtel'];
	$email=$_POST['email'];

	if($_POST['admin']=="hiiam@dm1n"){
		$admin="admin";
	}else{
		$admin="user";
	}
?>
<?php
	if (trim($username)=="") {
		alert('กรุณากรอกชื่อผู้ใช้งาน');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}

	if (trim($pass)=="") {
		alert('กรุณากรอกรหัสผ่าน');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}

	if (trim($fname)=="") {
		alert('กรุณากรอกชื่อจริง');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}

	if (trim($lname)=="") {
		alert('กรุณากรอกนามกสุล');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}

	if (trim($bd)=="") {
		alert('กรุณากรอกวันเกิด');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}

	if (trim($adr)=="") {
		alert('กรุณากรอกที่อยู่');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($tel)=="") {
		alert('กรุณากรอกเบอร์โทร');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($mtel)=="") {
		alert('กรุณากรอกเบอร์มือถือ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
	if (trim($email)=="") {
		alert('กรุณากรอกอีเมล');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
?>
<?php
	$check = "SELECT mem_username FROM member WHERE mem_username ='$username'";
	$result = mysqli_query($conn,$check);
	$num=mysqli_num_rows($result); 
        if($num > 0)   		
        {
        alert('มีชื่อผู้ใช้นี้แล้วในระบบ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
        }
	$sql="INSERT into member(mem_username,mem_password,mem_fname,mem_lname,mem_bd,mem_address,mem_tel,mem_mtel,mem_email,mem_type) 
	VALUES('$username','$pass','$fname','$lname','$bd','$adr','$tel','$mtel','$email','$admin')";
	$query=mysqli_query($conn,$sql);
	if($query){
		alert('สมัครสมาชิกเสร็จสิ้น');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
	}
?>
