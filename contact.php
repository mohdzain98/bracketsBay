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
					<li><?php inout();	?></li>	
				</ul>
				
			</div>
			
		</div><!-- container end-->
	</div><!-- top bar end-->


	<div class="navbar-default" id="navbar"><!-- navbar start-->
		<div class="container"><!-- container start-->
			<div class="navbar-header">
				<a class="navbar-brand home" href="index.php">
					<img src="images/logo2.jpg" alt="bracket" class="hidden-xs" style="width:50px; height: 50px;"><!-- LOGO-->
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
						<li class="active">
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
					Contact Us
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
						<h2>Contact Us</h2>
						<p class="text-muted">If You Have Any QUESTION, Please Let Us Know..</p>
					</center>
				</div>
				<div>
					<form action="contact.php" method="post">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" required="" class="form-control">							
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" required="" class="form-control">							
						</div>

						<div class="form-group">
							<label>Contact Number</label>
							<input type="number" name="number" required="" class="form-control">							
						</div>


						<div class="form-group">
							<label>Subject</label>
							<input type="text" name="submit" required="" class="form-control">							
						</div>

						<div class="form-group">
							<label>Message</label>
							<textarea class="form-control" name="Message" required=""></textarea>							
						</div>

						<div class="text-center">
							<button type="submit" name="submit" class="btn btn-primary">
								<i class="fa fa-user-md"></i>Send Message
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
//Admin Mail
if (isset($_POST['submit'])) {
$sendername=$_POST['name'];
$senderemail=$$_POST['email'];
$sendercontact=$_POST['number'];
$sendersubject=$$_POST['submit'];
$sendermessage=$$_POST['message'];
$receiveremail="mozn786@gmail.com";
mail($receiveremail, $sendername,$sendercontact,$sendersubject,$sendermessage,$senderemail);

//Customer Email
$email=$_POST['email'];
$subject="welcome to oue website";
$msg="I shall get you soon,Thanks for sending email";
$from="mozn786@gmail.com";
mail($email, $subject, $msg, $from);
echo "<script>alert('Your Mail Successfully Sent')</script>";
echo "<h2 align='center'>your Mail Sent</h2>";
}

?>