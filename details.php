<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
include("welcome.php");
?>

<?php
if(isset($_GET['pro_id'])){
	$pro_id=$_GET['pro_id'];
	$get_product="select * from products where product_id='$pro_id'";
	$run_product=mysqli_query($con,$get_product);
	$row_product=mysqli_fetch_array($run_product);
	$p_cat_id=$row_product['p_cat_id'];
	$p_title=$row_product['product_title'];
	$p_price=$row_product['product_price'];
	$p_desc=$row_product['product_desc'];
	$p_img1=$row_product['product_img1'];
	$p_img2=$row_product['product_img2'];
	$p_img3=$row_product['product_img3'];
	$get_p_cat="select * from product_categories where p_cat_id=$p_cat_id";
	$run_p_cat=mysqli_query($con,$get_p_cat);
	$row_p_cat=mysqli_fetch_array($run_p_cat);
	$p_cat_id=$row_p_cat['p_cat_id'];
	$p_cat_title=$row_p_cat['p_cat_title'];



}
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
					<?php
					   welcome();
					?>
				</a>
				<a href="#">Cart Total Price: <?php totalprice(); ?>   , Total Piece <?php item(); ?> </a>

				
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
					<li>
						<?php
					   inout();
					?>
					</li>
						

					
					
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

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigations">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-caret-square-o-down"></i>
					
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
						<li class="active">
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
						<li>
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
					<span><?php item(); ?> Items in cart</span>
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
					shop
				</li>
				<li>
					<a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title ?></a>
					
				</li>
				<li>
					<?php echo $p_title ?>
				</li>
				
			</ul>
			
		</div>

		<div class="col-md-3">
			<?php
			include("includes/sidebar.php");
			?>
			
		</div>

		<div class="col-md-9">
			<div class="row" id="productmain">
				<div class="col-sm-6"> <!-- slider start-->
					<div id="mainimage">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1"></li>
								<li data-target="#myCarousel" data-slide-to="2"></li>
								
							</ol>

							<div class="carousel-inner">
								<div class="item active">
									<center>
										<img src="admin_area/productimages/<?php echo $p_img1  ?>" class="img-responsive">
									</center>
									
								</div>
								<div class="item">
									<center>
										<img src="admin_area/productimages/<?php echo $p_img2  ?>" class="img-responsive">
									</center>
									
								</div>

								<div class="item">
									<center>
										<img src="admin_area/productimages/<?php echo $p_img3  ?>" class="img-responsive">
									</center>
									
								</div>
							</div>
							<a href="#myCarousel" class="left carousel-control" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">Previous</span>
							</a>

							<a href="#myCarousel" class="right carousel-control" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">Next</span>
							</a>
							
						</div>

					</div>

														
				</div><!-- slider end-->
				

				<div class="col-sm-6">
					<div class="box">
						<h1 class="text-center"><?php echo $p_title  ?></h1>
						<?php
						addcart();
						?>
						<form action="details.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">
							<div class="form-group">
								<label class="col-md-5 control-label">Product Quantity*</label>
								<div class="col-md-6">
									<input type="number" name="product_qty" class="form-control" required="">
								</div>
								
							</div>

							<div class="form-group">
								<label class="col-md-5 control-label">Product Type</label>
								<div class="col-md-6">
									<select name="product_size" class="form-control">
										<option>select</option>
										<option>small</option>
										<option>medium</option>
										<option>large</option>
									</select>
								</div>
								
							</div>

							<p class="price">INR <?php echo $p_price;  ?></p>
							<p class="text-center buttons">
								<button class="btn btn-primary" type="submit">
									<i class="fa fa-shopping-cart"></i>Add To Cart
								</button>
							</p>
								
							
							
						</form>
						
					</div><!-- box end-->
					<div class="col-xs-4">
						<a href="#" class="thumb">
							<img src="admin_area/productimages/<?php echo $p_img1  ?>" class="img-responsive">
						</a>
					</div>

					<div class="col-xs-4">
						<a href="#" class="thumb">
							<img src="admin_area/productimages/<?php echo $p_img2 ?>" class="img-responsive">
						</a>
					</div>

					<div class="col-xs-4">
						<a href="#" class="thumb">
							<img src="admin_area/productimages/<?php echo $p_img3  ?>" class="img-responsive">
						</a>
					</div>
					
				</div>
				
			</div><!-- row end-->

			<div class="box" id="details"><!-- start-->
				<h4>Product Details</h4>
				<p>The details shown are verified by the owners</p>
				<p><?php echo $p_desc  ?></p>
				
			</div><!-- end-->

			<div id="row same-height-row"><!--also like start-->
				<div class="col-md-3 col-sm-6">
					<div class="box same-height headline">
						<h3 class="text-center">Similar Articles</h3>
						
						<img src="images/similar.jpeg" class="img-responsive navbar-brand home">
						
					</div>
				</div><!-- end-->

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
				
			</div><!-- end-->

			
		</div><!-- cil-md-9 end-->

		
	</div>
</div>

<?php
include("includes/footer.php")
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>