<?php
if (!isset($_SESSION['admin_email'])){
	echo"<script>window.open('login.php','_self')</script>";
}else{

?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background: black">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle='collapse' data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="adminindex.php?dashboard" class="navbar-brand">Admin Panel</a>
		<a href="http://localhost/MaMa/index.php" target= "_blank" class="navbar-brand">Go To Website</a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle='dropdown'>
				<i class="fa fa-user"> </i><?php echo $admin_name ?>
			</a>
			<ul class="dropdown-menu">
		<li>
			<a href="adminindex.php?user_profile?id=<?php echo $admin_id ?>">
				<i class="fa fa-fw-user"></i>Profile
			</a>
		</li>
		<li>
			<a href="adminindex.php?view_product">
				<i class="fa fa-fw-envelope"></i>Products
				<span class="badge"><?php  echo $count_pro ?></span>
			</a>
		</li>
		<li>
			<a href="adminindex.php?view_customer">
				<i class="fa fa-fw-users"></i>Customer
				<span class="badge"><?php  echo $count_cust ?></span>
			</a>
		</li>
		<li>
			<a href="adminindex.php?pro_cat">
				<i class="fa fa-fw-gear"></i>Product Categories
				<span class="badge"><?php  echo $count_p_cat ?></span>
			</a>
		</li>
		
		<li class="divider"></li>
		<li ><a href="logout.php">logout <i class="fa fa-fw fa-power-off"></i></a></li>
	</ul>			
		</li>	

	</ul><!-- navbar ebd -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav sidebar-nav">
			<li >
				<a href="adminindex.php?dashboard"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
			</li>

			<li>
			<a href="#" data-toggle="collapse" data-target='#products'><i class="fa fa-fw fa-table"></i> Product</a>
			<i class="fa fa-fw fa-caret-down"></i>

			<ul class="collapse" id="products">
				<li>
					<a href="adminindex.php?insert_product">Insert Product</a>
				</li>
				<li>
					<a href="adminindex.php?view_product">view Product</a>
				</li>
				
			</ul>
		</li>

		<li>
			<a href="#" data-toggle="collapse" data-target='#product_cat'><i class="fa fa-fw fa-table"></i> Product Categories</a>
			<i class="fa fa-fw fa-caret-down"></i>

			<ul class="collapse" id="product_cat">
				<li>
					<a href="adminindex.php?insert_product_cat">Insert Product Categories</a>
				</li>
				<li>
					<a href="adminindex.php?view_product_cat">view Product categories</a>
				</li>
				
			</ul>
		</li>

		<li>
			<a href="#" data-toggle="collapse" data-target='#categories'><i class="fa fa-fw fa-table"></i>Categories</a>
			<i class="fa fa-fw fa-caret-down"></i>

			<ul class="collapse" id="categories">
				<li>
					<a href="adminindex.php?insert_cat">Insert Categories</a>
				</li>
				<li>
					<a href="adminindex.php?view_cat">view Categories</a>
				</li>
				
			</ul>
		</li>

		<li>
			<a href="#" data-toggle="collapse" data-target='#slider'><i class="fa fa-fw fa-table"></i>Slider</a>
			<i class="fa fa-fw fa-caret-down"></i>

			<ul  id="slider" class="collapse">
				<li>
					<a href="adminindex.php?insert_product">Insert Slider</a>
				</li>
				<li>
					<a href="adminindex.php?view_product">view Slider</a>
				</li>
				
			</ul>
		</li>


		<li>
			<a href="adminindex?view_customer"><i class="fa fa-fw fa-edit"></i> View Customer</a>
		</li>

		<li>
			<a href="adminindex?view_order"><i class="fa fa-fw fa-edit"></i> View order</a>
		</li>

		<li>
			<a href="adminindex?view_payments"><i class="fa fa-fw fa-edit"></i> View Payments</a>
		</li>

		<li>
			<a href="#" data-toggle="collapse" data-target='#users'><i class="fa fa-fw fa-table"></i>users</a>
			<i class="fa fa-fw fa-caret-down"></i>

			<ul  id="users" class="collapse">
				<li>
					<a href="adminindex.php?insert_users">Insert users</a>
				</li>
				<li>
					<a href="adminindex.php?view_users">view users</a>
				</li>

				<li>
					<a href="adminindex.php?edit_profile?id=<?php echo $admin_id ?>">Edit Profile</a>
				</li>
				
			</ul>
		</li>
		</ul>
		
	</div>
	<?php } ?>
	
