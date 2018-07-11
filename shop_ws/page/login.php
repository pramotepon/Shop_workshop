<div class="login-frm">

		<?php
		if(isset($_GET['suid'])){
		?>

		<form name="regis" method="POST" action="?p=cpsuer">
		<div class="login-s">
			<label>Username :</label><input type="text" name="username" value="<?php echo $_SESSION['mem_username']?>"><br>
			<label>Password :</label><input type="password" name="password" value="<?php echo $_SESSION['mem_password']?>">
		</div>
		<div class="login-s">
			<label>ชื่อ :</label><input type="text" name="fname" value="<?php echo $_SESSION['mem_fname']?>"><br>
			<label>สกุล :</label><input type="text" name="lname" value="<?php echo $_SESSION['mem_lname']?>">
		</div>
		<div class="login-s">
			<label>ที่อยู่ :</label><br>
			<label><textarea name="adr" class="i-admin" style="min-height: 60px;max-height: 60px;"><?php echo $_SESSION['mem_address'];?></textarea></label>
		</div>
		<div class="login-s">
			<label>เบอร์โทร :</label>
			</label><input type="number" name="tel" value="<?php echo $_SESSION['mem_tel']?>"></label>
		</div>
		<div class="login-s">
			<label>มือถือ :</label>
			</label><input type="number" name="mtel" value="<?php echo $_SESSION['mem_mtel']?>"></label>
		</div>
		<div class="login-s">
			<label>อีเมล :</label>
			</label><input type="text" name="email" value="<?php echo $_SESSION['mem_email']?>"></label>
		</div>
		<div class="login-s">
			<label>ยืนยัน Password :</label>
			</label><input type="password" name="cfpass"></label>
		</div>
			<input type="submit" name="login" value="ยืนยัน">
			<button><a href="?p=login" style="text-decoration: none; color: black;">ยกเลิก</a></button>
		</form>

		<?php exit();} ?>
		<?php 
			if($_SESSION["mem_id"]==""){
		?>
		<h1>Login</h1>
		<form name="regis" method="POST" action="?p=cplogin">
			<input type="text" name="username" placeholder="Username" class="i-login">
			<input type="password" name="pass" placeholder="Password" class="i-login">
			<input type="submit" name="login" value="Login">
		</form>

		<?php }else{ ?>

		<h1>ยินดีต้อนรับ!</h1>
			
		<form name="regis" method="POST" action="?p=cplogout">
		<div class="login-s">
			<label class="fname">คุณ <?php echo $_SESSION['mem_fname']?></label>
			<label class="lname"><?php echo $_SESSION['mem_lname']?></label>
		</div>
		<div class="login-s">
			<label>ที่อยู่ :</label>
			<label><?php echo $_SESSION['mem_address'];?></label>
		</div>
		<div class="login-s">
			<label>เบอร์โทร :</label>
			</label><?php echo $_SESSION['mem_tel'];?></label>
		</div>
		<div class="login-s">
			<label>มือถือ :</label>
			</label><?php echo $_SESSION['mem_mtel'];?></label>
		</div>
		<div class="login-s">
			<label>อีเมล :</label>
			</label><?php echo $_SESSION['mem_email'];?></label>
		</div>
			<button><a href="?p=login&suid=<?php echo $_SESSION['mem_id'];?>" style="text-decoration: none; color: black;">แก้ไข</a></button>
			<input type="submit" name="login" value="Logout">
		</form>
			
		<?php } ?>
	
</div>