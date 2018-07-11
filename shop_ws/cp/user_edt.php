<?php
	$username=$_POST['uusername'];
	$pass=$_POST['upassword'];
	$fname=$_POST['ufname'];
	$lname=$_POST['ulname'];
	$bd=$_POST['ubd'];
	$adr=$_POST['uadr'];
	$tel=$_POST['utel'];
	$mtel=$_POST['umtel'];
	$email=$_POST['uemail'];
	$type=$_POST['utype'];
	$uid=$_GET['uid'];

	if($type=="admin"){
		$acc="2";
	}
	if($type=="user"){
		$acc="1";
	}
	if($_SESSION['mem_type']=="admin"){
		$sacc="2";
	}
	if($_SESSION['mem_type']=="user"){
		$sacc="1";
	}
	if($sacc<=$acc){
		alert('คุณไม่มีสิทธิเปลี่ยนแปลงข้อมูลผู้ใช้นี้');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
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
	$result = mysqli_query($con,$check);
	$num=mysqli_num_rows($result); 
        if($num > 0)   		
        {
        alert('มีชื่อผู้ใช้นี้แล้วในระบบ');
		echo"<script language='javascript'>history.back(1);</script>";
		exit();
        }
    $sql="UPDATE member SET mem_username='$username', mem_password='$pass', mem_fname='$fname', mem_lname='$lname', mem_bd='$bd', mem_address='$adr', mem_tel='$tel', mem_mtel='$mtel', mem_email='$email', mem_type='$type' WHERE mem_id='$uid'";
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