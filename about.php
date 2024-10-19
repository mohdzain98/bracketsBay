<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
include('welcome.php');
?>

<html>
<head>
	<title>about | Brackets Store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="icon" type="image/png" href="./images/favicon-48x48.png" sizes="48x48" />
	<link rel="icon" type="image/svg+xml" href="/images/favicon.svg" />
	<link rel="shortcut icon" href="/images/favicon.ico" />
	<link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png" />
	<link rel="manifest" href="/site.webmanifest" />
     
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
					<li><?php inout();	?></li>	
				</ul>
				
			</div>
			
		</div><!-- container end-->
	</div><!-- top bar end-->


	<div class="navbar-default" id="navbar"><!-- navbar start-->
		<div class="container"><!-- container start-->
			<div class="navbar-header">
				<a class="navbar-brand home" href="index.php">
					<img src="images/logo.png" alt="bracket" style="width:50px; height: 50px;">

				</a>

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-align-justify"></i>
					
				</button>

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigations">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-caret-square-o-down"></i>
					
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
						<li>
							<a href="cart.php">cart</a>
						</li>
						<li class="active">
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

		<div class="col-md-9 col-xs-12">
			<div class="box" style="padding:10px 10px;">
			    <div class="box-header">
				    <center>
					    <h1>About Us</h1>
					    <h4>Umar Handicraft,Najibabad. Dist.Bijnor UP 246763</h4>
				    </center>
			    </div>
			    <h3 style="margin-left: 5px;">Our Legacy</h3>
			    <p>We are in this business from decades. This work of handicraft was started by our father Late. Mohd Abdulla when he left Dehradun and moved to Najibabad. His work soon became popular and recognized when he used his handicraft knowledge. We are and will try to wear his boot in our journey in this business.  </p>
			    <br>
			    <p style="display: inline-block; margin-left: 5px;">Here in najibabad we are three brothers <p style="display: inline-block; font-weight: bold;"> Shahanawaz, Shadab and Shahroz</p>.</p>
			    <p> one of us handle the work of raw material like different type of wood, its purchase. Other one see the work of packaging and polish. Third one handles the consumers and delievery of the order.</p>

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