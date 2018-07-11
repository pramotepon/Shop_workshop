<?php
	if(isset($_GET['gender'])){
?>

<?php
	$sql="SELECT product_type FROM product WHERE product_type='ring' AND product_gender='".$_GET['gender']."'";
	$query = mysqli_query($conn, $sql);
 	$ringr = mysqli_num_rows($query);
?>
<?php
	$sql="SELECT product_type FROM product WHERE product_type='bracelet' AND product_gender='".$_GET['gender']."'";
	$query = mysqli_query($conn, $sql);
 	$braceletr = mysqli_num_rows($query);
?>
<?php
	$sql="SELECT product_type FROM product WHERE product_type='necklace' AND product_gender='".$_GET['gender']."'";
	$query = mysqli_query($conn, $sql);
 	$necklacer = mysqli_num_rows($query);
?>
<?php
	$sql="SELECT product_type FROM product WHERE product_type='belt' AND product_gender='".$_GET['gender']."'";
	$query = mysqli_query($conn, $sql);
 	$beltr = mysqli_num_rows($query);
?>
<?php
	$sql="SELECT product_type FROM product WHERE product_type='watch' AND product_gender='".$_GET['gender']."'";
	$query = mysqli_query($conn, $sql);
 	$watchr = mysqli_num_rows($query);
?>
<?php
	$sql="SELECT product_type FROM product WHERE product_type='bag' AND product_gender='".$_GET['gender']."'";
	$query = mysqli_query($conn, $sql);
 	$bagr = mysqli_num_rows($query);
?>
<?php
	$sql="SELECT product_type FROM product WHERE product_type='hat' AND product_gender='".$_GET['gender']."'";
	$query = mysqli_query($conn, $sql);
 	$hatr = mysqli_num_rows($query);
?>

<?php }?>

<?php
	if($_GET['gender']==""){
	$sql="SELECT product_type FROM product WHERE product_type='ring'";
	$query = mysqli_query($conn, $sql);
 	$ringr = mysqli_num_rows($query);
?>
<?php
	$sql="SELECT product_type FROM product WHERE product_type='bracelet'";
	$query = mysqli_query($conn, $sql);
 	$braceletr = mysqli_num_rows($query);
?>
<?php
	$sql="SELECT product_type FROM product WHERE product_type='necklace'";
	$query = mysqli_query($conn, $sql);
 	$necklacer = mysqli_num_rows($query);
?>
<?php
	$sql="SELECT product_type FROM product WHERE product_type='belt'";
	$query = mysqli_query($conn, $sql);
 	$beltr = mysqli_num_rows($query);
?>
<?php
	$sql="SELECT product_type FROM product WHERE product_type='watch'";
	$query = mysqli_query($conn, $sql);
 	$watchr = mysqli_num_rows($query);
?>
<?php
	$sql="SELECT product_type FROM product WHERE product_type='bag'";
	$query = mysqli_query($conn, $sql);
 	$bagr = mysqli_num_rows($query);
?>
<?php
	$sql="SELECT product_type FROM product WHERE product_type='hat'";
	$query = mysqli_query($conn, $sql);
 	$hatr = mysqli_num_rows($query);
?>
<?php } ?>

<?php
/* Add Cart num */
	$sql="SELECT mem_id FROM orders WHERE mem_id='".$_SESSION['mem_id']."'";
	$query = mysqli_query($conn, $sql);
	$orders = mysqli_num_rows($query);
?>