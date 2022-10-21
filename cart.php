<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
include('welcome.php');
?>

<html>
<head>
	<title>Brackets Store</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
     
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>

	<div id="top"> <!-- top bar start -->
		<div class="container"><!-- container start -->
			<div class="col-md-6 offer">
				<a href="#" class="btn btn-success btn-sm">
					<?php welcome(); ?>
				</a>
				<a href="#">Cart Total Price: <?php totalprice(); ?>  , Total Piece <?php item(); ?> </a>

				
			</div>

			<div class="col-md-6">
				<ul class="menu">
					<li><a href="register.php">Register</a></li>
					<li>
						<?php
						  if (!isset($_SESSION['email'])) {
						  	echo "<a href='checkout.php'>My Account</a>";
						  }else{
						  	echo "<a href='customer/account.php?my_order'>My Account</a>";
						  }
						?>
					</li>
					<li><a href="cart.php">Cart</a></li>
					<li><?php inout();	?></li>	
				</ul>
				
			</div>
			
		</div><!-- container end-->
	</div><!-- top bar end-->


	<div class="navbar-default" id="navbar"><!-- navbar start-->
		<div class="container"><!-- container start-->
			<div class="navbar-header">
				<a class="navbar-brand home" href="index.php">
					<img src="images/logo2.jpg" alt="bracket" class="hidden-xs"><!-- LOGO-->
					<img src="images/logo3.jpg" alt="bracket" class="visible-xs">

				</a>

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-align-justify"></i>
					
				</button>

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only"></span>
					<i class="fa fa-search"></i>
				</button>



				
			</div><!-- header end-->

			<div class="navbar-collapse collapse" id="navigation"> <!-- navbar start-->
				<div class="padding-nav"> <!-- padding start-->
					<ul class="nav navbar-nav navbar-left">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="shop.php">Shop</a>
						</li>
						<li>
							<?php
						  if (!isset($_SESSION['email'])) {
						  	echo "<a href='checkout.php'>My Account</a>";
						  }else{
						  	echo "<a href='customer/account.php?my_order'>My Account</a>";
						  }
						?>
						</li>
						<li class="active">
							<a href="cart.php">cart</a>
						</li>
						<li>
							<a href="about.php">About Us</a>
						</li>
						<li>
							<a href="contact.php">Contact Us</a>
						</li>
					</ul>
					
				</div> <!-- padding end-->
				
				<a href="cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span> <?php item(); ?> Items in cart</span>
				</a>

				<div class="navbar-collapse collapse right">
	                <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
						<span class="sr-only">Toggle Search</span>
						<i class="fa fa-search"></i>


						
	             	</button>
					
				</div>
				<div class="collapse clearfix" id="search"> 
					<form class="navbar-form" method="get" action="result.php">
						<div class="input-group">
							<input type="text" name="user_query" class="form-control" placeholder="Search" required="">
							<button type="submit" value="Search" name="search" class="btn btn-primary">
								<i class="fa fa-search"></i>
							</button>
							
						</div>
						
					</form>
					
				</div>

			</div><!-- navbar end-->


			
		</div><!-- container end-->
	</div><!-- navbar end-->

<div id="content">
	<div class="container">
		<div class="col-md-12"><!--col start-->
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li>
					cart
				</li>
				
			</ul>
			
		</div>

		<div class="col-md-9" id="cart">
			<div class="box">
				<form action="cart.php" method="post" enctype="multipart-form-data">

					<h1>Shopping Cart</h1>
					<?php
					$ip_add=getuserip();
					$select_cart="select * from cart where ip_address='$ip_add'";
					$run_cart=mysqli_query($con,$select_cart);
					$count=mysqli_num_rows($run_cart);
					?>
					<p class="text-muted"> Currently you have <?php echo $count ?> item(s) in your cart</p>
					<div class="table-responsive"> <!--table resp-->
						<table class="table">
							<thead>
								<tr>
									<th colspan="2">product</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th colspan="1">Delete</th>
									<th colspan="1">Sub Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								while($row=mysqli_fetch_array($run_cart)){
									$pro_id=$row['p_id'];
									$pro_type=$row['type'];
									$pro_qty=$row['qty'];
									$get_products="select * from products where product_id='$pro_id'";
									$run_pro=mysqli_query($con,$get_products);
									while ($row=mysqli_fetch_array($run_pro)) {
										$p_title=$row['product_title'];
										$p_img1=$row['product_img1'];
										$p_price=$row['product_price'];
										$sub_total=$row['product_price']* $pro_qty;
										$total += $sub_total;

									
								?>


								<tr>
									<td><img src="admin_area/productimages/<?php echo $p_img1 ?>"></td>
									<td><?php echo $p_title ?></td>
									<td><?php echo $pro_qty ?></td>
									<td><?php echo $p_price ?></td>
									<td><input type="checkbox" name="remove[]" value=" <?php echo $pro_id ?>"></td>
									<td><?php echo $sub_total ?></td>
								</tr>
							<?php } } ?>
								
							</tbody>
							
						</table>						
					</div><!--table respo-->

					<div class="box-footer">
						<div class="pull-left">
							<h4>Total Price : </h4>
						</div>

						<div class="pull-right">
							<h4>INR <?php echo $total ?></h4>
						</div>
						
					</div>

					<div class="box-footer">
						<div class="pull-left">
								<a href="shop.php" class="btn btn-default">
								<i class="fa fa-chevron-left"></i>Continue Shoppings
							</a>
					
						</div>

						<div class="pull-right">
							<button class="btn btn-default" type="submit" name="update" value="Update Cart">
								<i class="fa fa-refresh">Update Cart</i>
							</button>
							<a href="checkout.php" class="btn btn-primary">Procced To Checkout <i class="fa fa-chevron-right"></i></a>

						</div>
						
					</div>
					
				</form>
				
			</div><!--box end-->

			<div id="row same-height-row"><!--also like start-->
				<div class="col-md-3 col-sm-6">
					<div class="box same-height headline">
						<h3 class="text-center">Similar Articles</h3>
						
					</div>
				</div><!-- start-->

				
						

				<?php
				$get_product="select * from products order by 1 LIMIT 0,3";
				$run_product=mysqli_query($con,$get_product);
				while ($row=mysqli_fetch_array($run_product)) {
					$pro_id=$row['product_id'];
					$pro_title=$row['product_title'];
					$pro_price=$row['product_price'];
					$pro_img1=$row['product_img1'];
					echo "
					<div class='center-responsive col-md-3 com-sm-6'>
					<div class='product same height'>
					<a href='details.php?pro_id=$pro_id'>
					<img src ='admin_area/productimages/$pro_img1' class='img-responsive'> </a>
					<div class='text'>
					<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
					<p class='price'>INR $pro_price</p>
					</div>
					</div>
					</div>
					";
				}

				?>
					

				<?php
				function update_cart(){
					global $con;
					if(isset($_POST['update'])){
						foreach ($_POST['remove'] as $remove_id) {
							$delete_product="delete from cart where p_id='$remove_id'";
							$run_del=mysqli_query($con,$delete_product);
							if($run_del){
								echo "<script>window.open('cart.php','_self')</script>";
							}
						}
					}
				}
				echo @$up_cart=update_cart();

				?>

				

				
				
			</div><!-- end-->
			
		</div>

		<div class="col-md-3"><!--sumaary start-->
			<div class="box" id="order-summary">
				<div class="box-header">
					<center><h3>Order Summary</h3></center>				
				</div>
				<p class="text-muted">
					Shipping and additional cost are calculated based on values you have entered
				</p>
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<td>Order Subtotal</td>
								<th>INR <?php echo $total ?></th>
							</tr>
							<tr>
								<td>Shipping And Handling</td>
								<td>INR 00</td>
							</tr>

							<tr>
								<td>GST Tax</td>
								<td>INR 100</td>
							</tr>
							<tr class="total">
								<td>Total</td>
								<th>INR <?php echo $total+100?></th>>
							</tr>
						</tbody>
					</table>
					 
				</div>
				
			</div>

			
		</div>

	</div><!-- container end-->
	
</div><!-- content end-->


<?php
include("includes/footer.php")
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>