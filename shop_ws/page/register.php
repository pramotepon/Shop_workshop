<div class="reg-frm">
	<h1 style="text-align: center;">Register</h1>
	<font color="red">***กรุณากรอกข้อมูลตามความจริงเพื่อความสะดวก</font>
<form name="regis" method="POST" action="?p=cpreg">
	<div class="reg">
	<label class="l-reg">Username:</label>
	<input type="text" name="username" class="i-reg" placeholder="Username">
	<label class="l-reg">Password:</label>
	<input type="password" name="password" class="i-reg" placeholder="Password">
	<label class="l-reg">ชื่อ:</label>
	<input type="text" name="fname" class="i-reg" placeholder="FirstName">
	<label class="l-reg">นามสกุล:</label>
	<input type="text" name="lname" class="i-reg" placeholder="LastName">
	<label class="l-reg">วันเกิด:</label>
	<input type="date" name="bd" class="i-reg">
	<label class="l-reg">ที่อยู่:</label><br>
	<textarea rows="5" name="adr" style="min-height: 80px; max-height: 80px; min-width: 95%; max-width: 95%;" class="i-reg"></textarea><br>
	<label class="l-reg">เบอร์โทร:</label>
	<input type="number" name="tel" class="i-reg" placeholder="02xxxxxxx">
	<label class="l-reg">มือถือ:</label><br>
	<input type="number" name="mtel" class="i-reg" placeholder="0xxxxxxxxx">
	<label class="l-reg">อีเมล:</label><br>
	<input type="email" name="email" class="i-reg" placeholder="Examp@email.com">
	<label class="l-reg">รหัส Admin:<font color="red">***ไม่จำเป็น</font></label><br>
	<input type="password" name="admin" class="i-reg" placeholder="Code">
	</div><br>
	<center>
	<input type="submit" name="regis" value="สมัครสมาชิก">
	</center>
</form>
</div><br><br>
