<?php 
	$pro_id=$_GET['pro_id'];
	$sql="SELECT * FROM product WHERE product_id='$pro_id'";
	$query=mysqli_query($conn,$sql);
	$result=mysqli_fetch_array($query);
?>
<div class="pro_selet">
	<div class="pro_img">
		<img src="prod_img/<?php echo $result['product_pic'];?>" width="100%">
	</div><br>
	<button><a href="?p=cpreci&mem_id=<?php echo $_SESSION['mem_id']?>&product_id=<?php echo $result['product_id'];?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add cart</a></button>
	<hr>
	<div class="detail_row">
		<table>
			<tr>
				<td>
					ID
				</td>
				<td>
					:<?php echo $result['product_id'];?>
				</td>
			</tr>
			<tr>
				<td>
					Name
				</td>
				<td>
					:<?php echo $result['product_name'];?>
				</td>
			</tr>
			<tr>
				<td>
					Brand
				</td>
				<td>
					:<?php echo $result['product_brand'];?>
				</td>
			</tr>
			<tr>
				<td>
					Generation
				</td>
				<td>
					:<?php echo $result['product_gen'];?>
				</td>
			</tr>
		</table>
	</div>
	<div class="detail_row">
		<table>
			<tr>
				<td>
					คงเหลือ
				</td>
				<td>
					:<?php echo $result['product_num'];?>
				</td>
			</tr>
			<tr>
				<td>
					ราคา
				</td>
				<td>
					:<?php echo $result['product_price'];?>
				</td>
			</tr>
			<tr>
				<td>
					รายละเอียด
				</td>
				<td>
					:<?php echo $result['product_detail'];?>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					
				</td>
			</tr>
		</table>
	</div>
</div>
