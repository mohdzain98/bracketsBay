
<div class="navbar-collapse collapse right" id="navigations">



<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		<h3 class="panel-title">Product Categories</h3>	
	</div>

	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked category-menu">
			<?php
		    $get_p_cats="select * from product_categories";
		    $run_p_cats=mysqli_query($con,$get_p_cats);
			    while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
			    	$p_cat_id=$row_p_cats['p_cat_id'];
			    	$p_cat_title=$row_p_cats['p_cat_title'];
			?>
			<li>
				<a href='shop.php?p_cat=<?php echo $p_cat_id ?>'><?php echo $p_cat_title ?></a>
			</li>
		<?php } ?>
		</ul>
		
	</div>
	
</div>

<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		<h3 class="panel-title">Firms</h3>	
	</div>

	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked category-menu">
			<li><a href="#">Shan</a></li>
			<li><a href="#">shad</a></li>
			<li><a href="#">shaz</a></li>
			
		</ul>
		
	</div>
	
</div>
</div>
