<?php
	$username=$_POST['username'];
	$pass=$_POST['password'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$adr=$_POST['adr'];
	$tel=$_POST['tel'];
	$mtel=$_POST['mtel'];
	$email=$_POST['email'];
	$cfpass=$_POST['cfpass'];
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
    if($_SESSION['mem_password']!=$cfpass){
    	alert('การยืนยันรหัสผ่านไม่ตรงกัน');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
    }
?>
<?php
	$sql="UPDATE member SET mem_username='$username', mem_password='$pass', mem_fname='$fname', mem_lname='$lname', mem_address='$adr', mem_tel='$tel', mem_mtel='$mtel', mem_email='$email' WHERE mem_id='".$_SESSION['mem_id']."'";
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
?>