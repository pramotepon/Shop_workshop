<div class="maincon">

	<div class="menu" style="height: auto;">
			<ul class="gen-ul">
				<li class="gen-li"><a href="?gender=all" class="gen-a"><i class="fa fa-venus-mars fa-lg" aria-hidden="true"></i></a></li>
				<li class="gen-li"><a href="?gender=male" class="gen-a"><i class="fa fa-mars fa-lg" aria-hidden="true"></i></a></li>
				<li class="gen-li"><a href="?gender=female" class="gen-a"><i class="fa fa-venus fa-lg" aria-hidden="true"></i></a></li>
			</ul>
			
			<ul class="type-ul">
				<li class="type-li"><a href="?gender=<?php echo$_GET['gender'];?>&type=ring" class="type-a">แหวน<div class="row-type"><?php echo $ringr;?></div></a></li>
				<li class="type-li"><a href="?gender=<?php echo$_GET['gender'];?>&type=bracelet" class="type-a">กำไล&สร้อยข้อมือ<div class="row-type"><?php echo $braceletr;?></div></a></li>
				<li class="type-li"><a href="?gender=<?php echo$_GET['gender'];?>&type=necklace" class="type-a">สร้อย<div class="row-type"><?php echo $necklacer;?></div></a></li>
				<li class="type-li"><a href="?gender=<?php echo$_GET['gender'];?>&type=belt" class="type-a">เข็มขัด<div class="row-type"><?php echo $beltr;?></div></a></li>
				<li class="type-li"><a href="?gender=<?php echo$_GET['gender'];?>&type=watch" class="type-a">นาฬิกา<div class="row-type"><?php echo $watchr;?></div></a></li>
				<li class="type-li"><a href="?gender=<?php echo$_GET['gender'];?>&type=bag" class="type-a">กระเป๋า<div class="row-type"><?php echo $bagr;?></div></a></li>
				<li class="type-li"><a href="?gender=<?php echo$_GET['gender'];?>&type=hat" class="type-a">หมวก<div class="row-type"><?php echo $hatr;?></div></a></li>
			</ul>

	</div>

	<?php
	if($_GET['pro_id']!=""){
	require('pro_selet.php');
	}else{
	require('show_pro.php');
	}
	?>

</div>