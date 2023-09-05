<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
include("welcome.php");
if(isset($_GET['order_id'])){
	$order_id=$_GET['order_id'];
}
?>

<html>
<head>
	<title>Brackets Store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../style.css">
     
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>

	<div id="top"> <!-- top bar start -->
		<div class="container"><!-- container start -->
			<div class="col-md-6 offer">
				<a href="#" class="btn btn-success btn-sm">
					<?php welcome();?> 
				</a>
				<a href="#">Cart Total Price: <?php totalprice();?>  , Total Piece:  <?php item(); ?>  </a>

				
			</div>

			<div class="col-md-6">
				<ul class="menu">
					<li><a href="../register.php">Register</a></li>
					<li>
						<?php
						  if (!isset($_SESSION['email'])) {
						  	echo "<a href='checkout.php'>My Account</a>";
						  }else{
						  	echo "<a href='account.php?my_order'>My Account</a>";
						  }
						?>
					</li>
					<li><a href="../cart.php">Cart</a></li>
					<li><?php inout();	?></</li>	
				</ul>
				
			</div>
			
		</div><!-- container end-->
	</div><!-- top bar end-->


	<div class="navbar-default" id="navbar"><!-- navbar start-->
		<div class="container"><!-- container start-->
			<div class="navbar-header">
				<a class="navbar-brand home" href="index.php">
					<img src="../images/logo.png" alt="bracket" style="width:50px; height: 50px;">

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
							<a href="../index.php">Home</a>
						</li>
						<li>
							<a href="../shop.php">Shop</a>
						</li>
						<li class="active">
							<a href="account.php">Account</a>
						</li>
						<li>
							<a href="../cart.php">cart</a>
						</li>
						<li>
							<a href="../about.php">About Us</a>
						</li>
						<li>
							<a href="../contact.php">Contact Us</a>
						</li>
					</ul>
					
				</div> <!-- padding end-->
				
				<a href="../cart.php" class="btn btn-primary navbar-btn right">
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
				<li><a href="../index.php">Home</a></li>
				<li>
					Account
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
				<h1 align="center">Please Confirm Your Payment</h1>
				<form action ="confirm.php?update_id= <?php echo $order_id ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Invoice Number</label>
						<input type="text" name="invoice_number" class="form-control" required="">						
					</div>
					<div class="form-group">
						<label>Amount</label>
						<input type="text" name="amount" class="form-control" required="">						
					</div>
					<div class="form-group">
						<label>Select payment mode</label>
						<select class="form-control" name="payment-mode" placeholder="select">
							<option>Bank transfer</option>
							<option>paypal</option>
							<option>upi</option>
							<option>Debit/Credit card</option>
						</select>						
					</div>
					<div class="form-group">
						<label>Transaction Id/number</label>
						<input type="text" name="trnumber" class="form-control" required="">						
					</div>
					<div class="form-group">
						<label>payment date</label>
						<input type="date" name="date" class="form-control" required="">						
					</div>
					<div class="text-center">
						<button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">Proceed</button>						
					</div>
					
				</form>

				<?php
				if(isset($_POST['confirm_payment'])){
					$update_id=$_GET['update_id'];
					$invoice_number=$_POST['invoice_number'];
					$amount=$_POST['amount'];
					$payment_mode=$_POST['payment-mode'];
					$trfr_number=$_POST['trnumber'];
					$date=$_POST['date'];
					$complete="complete";
					$insert="insert into payments (invoice_id,amount,payment_mode,ref_no,payment_date) values ('$invoice_number','$amount','$payment_mode','$trfr_number','$date')";
					$run_insert=mysqli_query($con,$insert);

					$update_q="update customer_order set order_status='completed' where order_id='$update_id'";
					$run_insert=mysqli_query($con,$update_q);
					
					echo "<script> alert('your order has beeen recieved') </script>";
					echo "<script> window.open('account.php?my_order','_self')</script>";
				}
				?>
				
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