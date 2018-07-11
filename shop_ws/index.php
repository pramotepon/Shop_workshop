<?php
	session_start();
	require('cp/con_db.php');
	require('function/function.inc.php');
	require('cp/type_num.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shop_ws</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<header class="member">

		<?php 
		if($_SESSION["mem_id"]==""){
		?>
		<p class="memtext"><a href="?p=login">Login |</a> <a href="?p=reg">Register</a></p>
		<?php }else{ ?>
		<p class="memtext"><a href="?p=login">คุณ <?php echo $_SESSION['mem_fname']?> <?php echo $_SESSION['mem_lname']?></a>
		<?php
		if($_SESSION['mem_type']=="admin"){
		?>
		<a href="?p=admin" style="color: red;">ADMIN</a>
		<?php } ?>
		<a href="?p=reg"> | Register</a></p>
		<?php } ?>
		
	</header>

	<header class="banner">
		<h1>Webname</h1>
		
		<!--<div class="ar-src">
		<input type="text" class="box-src" name="src" placeholder="Search..." size="20">
		<button class="btn-src fa fa-search fa-lg"></button>
		</div>!-->
		<div style="position: relative; background-color: black; float: right; width: 35px; margin-top: 275px; margin-right: 20px;">
			<a href=""><i class="fa fa-instagram fa-2x" style="color: white;" aria-hidden="true"></i></a>
		</div>
		<div style="position: relative; background-color: black; float: right; width: 35px; margin-top: 275px; margin-right: 10px;">
			<a href=""><i class="fa fa-facebook fa-2x" style="color: white;" aria-hidden="true"></i></a>
		</div>
	</header>

	<nav class="mynav">
		<h1 class="logo">LOGO</h1>
		<div class="toggle">
			<i class="dropdown fa fa-bars fa-2x" aria-hidden="true"></i>
		</div>
		<ul>
			<a href="index.php"><li>หน้าแรก</li></a>
			<a href="?p=about"><li>เกี่ยวกับเรา</li></a>
			<a href="?p=payment"><li>ชำระเงิน</li></a>
			<a href="?p=contact"><li>ติดต่อเรา</li></a>
			<a href="?p=showcart" class="cart"><li><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i><div class="row-cart"><?php echo $orders;?></div></li></a>
		</ul>
	</nav>
	<!-- Drop Down !-->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="script.js"></script>

	<?php
		switch ($_GET['p']) {
			case login:
				include('page/login.php');
				break;
			case about:
				include('page/about.php');
				break;
			case reg:
				include('page/register.php');
				break;
			case admin:
				require('page/admin.php');
				break;
			case useredt:
				require('page/useredt.php');
				break;
			case showcart:
				require('page/show_cart.php');
				break;
			case orderedt:
				require('page/orders_edt.php');
				break;
			case cpordcon:
				require('page/order_con.php');
				break;
			case chorder:
				include('page/chorder_con.php');
				break;
			case payment:
				include('page/payment.php');
				break;
			case contact:
				include('page/contact.php');
				break;
			case cpreg:
				require('cp/register.php');
				break;
			case cplogin:
				require('cp/login.php');
				break;
			case cplogout:
				require('cp/logout.php');
				break;
			case cpproad:
				require('cp/product_add.php');
				break;
			case cpusadd:
				require('cp/user_edt.php');
				break;
			case cpsuer:
				require('cp/suser_edt.php');
				break;
			case cpreci:
				require('cp/adcart.php');
				break;
			case addreceipt:
				require('cp/add_receipt.php');
				break;
			case starecip:
				require('cp/stach_receipt.php');
				break;
			case numedt:
				require('cp/num_edt.php');
				break;
			case addpost:
				require('cp/add_post.php');
				break;

			default:
				include('page/index.php');
				break;
		}
	?>
	
</body>
</html>