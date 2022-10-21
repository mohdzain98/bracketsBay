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
				<a href="#">Cart Total Price: <?php totalprice(); ?>  , Total Piece <?php item(); ?>  </a>

				
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
						<?php inout();	?>
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
				
			</ul>
			
		</div>

		<div class="col-md-3">
			<?php
			include("includes/sidebar.php");
			?>
			
		</div><!-- Pichla end-->

		<div class="col-md-9"><!-- BOX START-->
			<?php
			if(!isset($_GET['p_cat'])) {
				echo " <div class='box'>
				    <center>
				    <h1>SHOP...?</h1>

				    <p> Shop Defines What You Really Want</p>
				    <p> Come here Search Here </p>
				    </center>
			    </div>";
			}

			?>
				
			<div class="row"> <!-- row start-->
				<?php
				if (!isset($_GET['p_cat'])) {

					$per_page=6;
					if(isset($_GET['page'])){
						$page=$_GET['page'];
					}else{
						$page=1;
					}
					$start_from=($page-1) * $per_page;
					$get_product="select * from products order by 1 DESC LIMIT $start_from, $per_page";
					$run_pro=mysqli_query($con, $get_product);
					while($row=mysqli_fetch_array($run_pro)){
						$pro_id=$row['product_id'];
						$pro_title=$row['product_title'];
						$pro_price=$row['product_price'];
						$pro_img1=$row['product_img1'];
						 echo "
						 <div class='col-md-4 col-sm-6 col-xs-12'>
						 <div class='product'>
						 <a href='details.php?pro_id=$pro_id'>
						 <img src='admin_area/productimages/$pro_img1' class='img-responsive'>
						 </a>

						 <div class='text'>
						 <h3> <a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
						 <p class='price'> INR $pro_price </p>
						 <p class= 'buttons'>

						 <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
						 <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'> </i>Add to Cart</a>
					      </p>

						 </div>

						  </div>





						 </div>

						 ";

					}
				
				?>
				
			</div> <!-- row end-->

			<center>
				<ul class="pagination">
				<?php
				$query="select * from products";
				$result=mysqli_query($con,$query);
				$total_record=mysqli_num_rows($result);
				$total_pages=ceil($total_record / $per_page);
				echo "
				<li><a href='shop.php?page=1'>".'first page'."</a></li>
				";
				for($i=1; $i<=$total_pages; $i++){
					echo "
					<li><a href='shop.php?page=".$i."'>".$i."</a></li>
					";
				};

				echo "
				   <li><a href='shop.php?page=$total_pages'>".'last page'."</a></li>
				";

			}
			?>
					
				</ul>
			</center>

			
				<?php
				getpcatpro()
				?>
				
		
			
		</div><!-- BOX END-->
		
	</div><!-- container end-->
	
</div><!-- content end-->


<?php
include("includes/footer.php")
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>

