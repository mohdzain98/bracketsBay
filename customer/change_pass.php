<div class="box">
	<center>
		<h1>Change Password Here</h1>
	</center>
	<form accept="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Current Password</label>
		<input type="password" name="old_password" required="" class="form-control">							
	</div>
	<div class="form-group">
		<label>New Password</label>
		<input type="password" name="new_password" required="" class="form-control">							
	</div>
	<div class="form-group">
		<label>Re-enter new Password</label>
		<input type="password" name="renew_password" required="" class="form-control">							
	</div>

	<div class="text-center">
		<!--<button type="submit" name="forgot" class="btn btn-danger btn-lg">
			Forgot Password
		</button>-->

		<button type="submit" name="update" class="btn btn-primary btn-lg">
			Update Password
			
		</button>
		
		
	</div>
	</form>

</div>
<?php

if(isset($_POST['update'])){
$session_email=$_SESSION['email'];
$old_pass=$_POST['old_password'];
$new_pass=$_POST['new_password'];
$renew_pass=$_POST['renew_password'];
$select_customer="select * from customers where c_email='$session_email'";
$run_cust=mysqli_query($con,$select_customer);
$row_cust=mysqli_fetch_array($run_cust);
$c_pass=$row_cust['c_pass'];
if($old_pass==$c_pass){
	if($old_pass!=$new_pass){
	if($new_pass==$renew_pass){
		$update_pass="update customers set c_pass='$new_pass' where c_email='$session_email'";
		$run_update=mysqli_query($con,$update_pass);
		echo "<script>alert('password changed successfully')</script>";
		echo "<script>window.open('account.php?my_order','_self')</script>";
	}else{
		echo "<script>alert('your new passwords mismatched')</script>";
	}
	}else{
		echo "<script>alert('Use That password which you have never used before')</script>";
	}
}else{
	echo "<script>alert('your current password does not match')</script>";
}
}
?>