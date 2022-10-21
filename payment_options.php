<div class="box">
	<?php
	$session_email=$_SESSION['email'];
	$select_customer="select * from customers where c_email='$session_email'";
	$run_cust=mysqli_query($con,$select_customer);
	$row_cust=mysqli_fetch_array($run_cust);
	$c_id=$row_cust['c_id'];
	?>
	<h1 class="text-center">Payments Options</h1>
	<p class="lead text-center">
		<a href="order.php?c_id=<?php echo $c_id ?>">Pay Offline</a>
	</p>
	<center>
		<p class="lead">
			<a href="#">Pay With PayPal
			<img src="images/paypal.jpeg" width="500" height="270" class="img-responsive"></a>
		</p>
	</center>	
	
	
</div>