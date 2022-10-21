<div class="box">
	<div class="box-header">
	<center>
		<h2>Login</h2>
		<p class="lead">Already our Customer</p>
	</center>
    </div>

    <form action="checkout.php" method="post">
    	<div class="form-group">
    		<label>Email:</label>
    		<input type="text" class="form-control" name="email" required="">
    		
    	</div>

    	<div class="form-group">
    		<label>Password:</label>
    		<input type="password" class="form-control" name="pass" required="">
    		
    	</div>

    	<div class="text-center">
    		<button type="submit" name="login"  class="btn btn-primary">
    			<i class="fa fa-sign-in"></i>Login
    			
    		</button>   		
    	</div>    	
    </form>

    <center>
    	<a href="register.php">
    		<h3>New ? Register Now</h3>
    	</a>
    </center>

	
</div>

<?php
if(isset($_POST['login'])){
	$c_email=$_POST['email'];
	$c_pass=$_POST['pass'];
	$select_customer="select * from customers where c_email='$c_email' AND c_pass='$c_pass'";
	$run_customer=mysqli_query($con,$select_customer);
	$check_customer=mysqli_num_rows($run_customer);
	$get_ip=getuserip();
	
	$select_cart="select * from cart where ip_address='$get_ip'";
	$run_cart=mysqli_query($con,$select_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if($check_customer==0){
		echo "<script>alert('Email or Password is incorrect')</script>";
		exit();
	}
	if($check_customer==1 AND $check_cart==0){
		$_SESSION['email']=$c_email;
		echo "<script>alert('you are logged in')</script>";
		echo "<script>window.open('customer/account.php','_self')</script>";
	}
	else{

		$_SESSION['email']=$c_email;
		echo "<script>alert('you are logged in')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}
}
?>