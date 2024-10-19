<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
include('welcome.php');
?>

<html>
<head>
	<title>register | Brackets Store</title>
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
				<a href="#">Cart Total Price: <?php totalprice(); ?>  , Total Piece <?php item(); ?></a>

				
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
					<img src="images/logo.png" alt="bracket" class="hidden-xs" style="width:50px; height: 50px;"><!-- LOGO-->
					<img src="images/logo.png" alt="bracket" class="visible-xs" style="width:50px; height: 50px;">

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

				<div class="navbar-collapse collapse right">
	                <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
						<span class="sr-only">Toggle Search</span>
						<i class="fa fa-search"></i>


						
	             	</button>
					
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
					Registration
				</li>
				
			</ul>
			
		</div>

		<div class="col-md-3">
			<?php
			include("includes/sidebar.php");
			?>
			
		</div><!-- Pichla end-->

		<div class="col-md-9">
			<div class="box">
				<div class="box-header">
					<center>
						<h2>Registration</h2>
						<p class="text-muted">Register yourself for better results</p>
					</center>
				</div>
				<div>
					<form action="register.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" required="" class="form-control">							
						</div>

						<div class="form-group">
							<label>Contact Number</label>
							<input type="number" name="contact" required="" class="form-control">							
						</div>

						<div class="form-group">
							<label> Email</label>
							<input type="email" name="email" required="" class="form-control">							
						</div>


						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" required="" class="form-control">							
						</div>

						<div class="form-group">
							<label> Address</label>
							<textarea class="form-control" name="address" required=""></textarea>						
						</div>

						<div class="form-group">
							<label>City</label>
							<input type="text" name="city" required="" class="form-control">							
						</div>

						<div class="form-group">
							<label>State</label>
							<input type="text" name="state" required="" class="form-control">							
						</div>



						<div class="form-group">
							<label>Photo</label>
							<input type="file" name="image" class="form-control">								
						</div>

						

						<div class="text-center">
							<button type="submit" name="submit" class="btn btn-primary">
								<i class="fa fa-user-md"></i>Register
							</button>
						</div>

						
					</form>
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

<?php
if (isset($_SESSION['email'])) {
	echo "<script>alert('you are already registered')</script>";
	echo "<script>window.open('index.php','_self')</script>";
}
if (isset($_POST['submit'])) {
	$c_name=$_POST['name'];
	$c_email=$_POST['email'];
	$c_pass=$_POST['password'];
	$c_state=$_POST['state'];
	$c_city=$_POST['city'];
	$c_contact=$_POST['contact'];
	$c_add=$_POST['address'];
	$c_image=$_FILES['image']['name'];
	$c_temp_image=$_FILES['image']['tmp_name'];
	$c_ip=getuserip();

	move_uploaded_file($c_temp_image, "/customer/cimages/$c_image");
	$check_customer="select * from customers where c_email='$c_email' or c_contact='$c_contact'";
	$run_checkcus=mysqli_query($con,$check_customer);
	$check_run=mysqli_num_rows($run_checkcus);
	if ($check_run==0) {
	$insert_customer="insert into customers(c_name,c_email,c_pass,c_country,c_city,c_contact,c_add,c_image,c_ip) values('$c_name','$c_email','$c_pass','$c_state','$c_city','$c_contact','$c_add','$c_image','$c_ip')";
	$run_customer=mysqli_query($con,$insert_customer);
	$select_cart="select * from cart where ip_address='$c_ip'";
	$run_cart=mysqli_query($con,$select_cart);
	$check_cart=mysqli_num_rows($run_cart);	
	if ($check_cart>0) {
			$_SESSION['email']=$c_email;
			echo "<script>alert('you have been registered successfully')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
	}else{
		$_SESSION['email']=$c_email;
		echo "<script>alert('you have been registered successfully')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
    }else{
    	echo "<script>alert('This email or number is already registered with different account, Please Login')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	
    }
	



}
?>