<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
include('welcome.php');
?>

<html>
<head>
	<title>Brackets Store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="icon" type="image/png" href="./images/favicon-48x48.png" sizes="48x48" />
	<link rel="icon" type="image/svg+xml" href="/images/favicon.svg" />
	<link rel="shortcut icon" href="/images/favicon.ico" />
	<link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png" />
	<link rel="manifest" href="/site.webmanifest" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> 
     
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
	<div style="background-color: blue; color:white; padding: 10px 0px;">
		<center><p style="font-weight: bold;">This Project is running on Proxy Server</p></center>
	</div>
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
					<img src="images/logo.png" alt="bracket" style="width:50px; height: 50px;"><!-- LOGO-->

				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">Toggle Navigation</span>
					<i class="fa fa-align-justify"></i>
					
				</button> 
				
			</div><!-- header end-->

			<div class="navbar-collapse collapse" id="navigation"> <!-- navbar start-->
				<div class="padding-nav"> <!-- padding start-->
					<ul class="nav navbar-nav navbar-left">
						<li class="active">
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
	
<div class="container" id="slider"> <!-- slider start-->
	<div class="col-md-12">
		<div class="carousel slide" id="myCarousel" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="myCarousel" data-slide-to="1" class="action"></li>

				<li data-target="myCarousel" data-slide-to="2"></li>

				<li data-target="myCarousel" data-slide-to="3"></li>

				<li data-target="myCarousel" data-slide-to="4"></li>
				<!--<li data-target="myCarousel" data-slide-to="5"></li>-->
					
			</ol>

			<div class="carousel-inner"> <!-- inner start-->
				<?php
				$get_slider="select * from slide LIMIT 0,1";
				$run_slider=mysqli_query($con,$get_slider);
				while($row=mysqli_fetch_array($run_slider)){
                    $slider_name=$row['slider_name'];
                    $slider_image=$row['slider_image'];
                    echo "<div class='item active'>
                    <img src='admin_area/sliderimages/$slider_image'>
                    </div>

                    ";
				}
				?>

				<?php
				$get_slider="select * from slide LIMIT 1,3";
				$run_slider=mysqli_query($con,$get_slider);
					while($row=mysqli_fetch_array($run_slider)){
                    $slider_name=$row['slider_name'];
                    $slider_image=$row['slider_image'];
                    echo "
                    <div class='item'>
                    <img src='admin_area/sliderimages/$slider_image'>
                    </div>

                    ";
				}

				?>
					
			</div> <!-- inner end-->

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
		
</div><!-- container end-->

<div id="advantage">
	<div class="container">
		<div class="same-height-row">
		    <div class="col-sm-6">
			    <div class="box same-height">
				    <div class="icon ">
					     <i class="fa fa-heart"></i>
					
				    </div>
				       <h3> <a href="#">Best Polish</h3>
					       <p>We give natural and best polish</p>
				
			    </div>	
		    </div>	

		    <div class="col-sm-6 ">
			    <div class="box same-height">
				    <div class="icon">
					     <i class="fa fa-heart"></i>
					
				    </div>
				       <h3> <a href="#">100% Satisfaction</a></h3>
					       <p>We believe in our customer's satisfaction</p>
				
			    </div>	
		    </div>	
	    </div>
		
	</div>

</div>

<div id="hotbox">
	<div class="box">
		<div class="container">
			<div class="col-md-12">
				<h2>Latest Under Production! More on  <a href="shop.php">Shop</a><i class="fa fa-mouse-pointer"></i> page.</h2>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<!-- PRODUCTS-->

<div id="content" class="container">
	<div class="row">
		<?php
		getpro();
		?>
	</div>
	
</div>

<!-- Footer start-->
<?php
include("includes/footer.php")
?>

<!-- Footer end-->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>