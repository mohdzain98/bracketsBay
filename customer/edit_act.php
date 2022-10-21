<?php 
$email = $_SESSION['email'];
$get_customer="select * from customers where c_email='$email'";
$run_cust =mysqli_query($con,$get_customer);
$row_cust=mysqli_fetch_array($run_cust);
$cid=$row_cust['c_id'];
$cname=$row_cust['c_name'];
$cemail=$row_cust['c_email'];
$ccountry=$row_cust['c_country'];
$ccity=$row_cust['c_city'];
$ccontact=$row_cust['c_contact'];
$cadd=$row_cust['c_add'];
$cimage=$row_cust['c_image'];

?>



<div class="box">
	<center>
		<h1>Edit Your Account</h1>
	</center>

	<form accept="" method="post">
	<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" required="" value='<?php echo $cname ?>' class="form-control">							
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" required="" value='<?php echo $cemail ?>'class="form-control">							
						</div>

						<div class="form-group">
							<label>Contact Number</label>
							<input type="number" name="number" required="" value='<?php echo $ccontact ?>' class="form-control">							
						</div>

						<div class="form-group">
							<label>Address</label>
							<input type="text" name="address" required="" value='<?php echo $cadd ?>' class="form-control">
						</div>


						<div class="form-group">
							<label>City</label>
							<input type="text" name="city" required="" value='<?php echo $ccity ?>' class="form-control">							
						</div>


						<div class="form-group">
							<label>State</label>
							<input type="text" name="state" required="" value='<?php echo $ccountry ?>' class="form-control">							
						</div>

						

						<div class="form-group">
							<label>Photo</label>
							<input type="file" name="image" value='<?php echo $cimage ?>'class="form-control">								
						</div>

						<div class="text-center">
							<button type="submit" name="update" class="btn btn-primary">
								<i class="fa fa-user-md"></i>Update
							</button>
						</div>
	</div>
	</form>

	
</div>

<?php
if(isset($_POST['update'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$number=$_POST['number'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$image=$_FILES['image']['name'];
	$temp_image=$_FILES['image']['temp_name'];
	$ip_add=getuserip();

	$check_customer="select * from customers where c_email='$email' or c_contact='$number'";
	$run_checkcus=mysqli_query($con,$check_customer);
	$check_run=mysqli_num_rows($run_checkcus);

	if($check_run==1){
	move_uploaded_file($temp_image, 'customer/cimages/$image');
	$session_email=$_SESSION['email'];
	$select_customer="update customers set c_name='$name',c_email='$email',c_country='$state',c_city='$city',c_contact='$number',c_add='$address',c_image='$image',c_ip='$ip_add' where c_email='$session_email'";
	$run_select=mysqli_query($con,$select_customer);
	echo "<script>alert('successfully updated')</script>";
	$_SESSION['email']=$email;
	echo "<script>window.open('account.php?details','_self')</script>";
	}else{
		echo "<script>alert('This Number or Email is registered with different account! Try using any other.')</script>";
	}
}
?>