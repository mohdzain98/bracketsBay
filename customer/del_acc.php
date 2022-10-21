<div class="box">
	<center>
		<h1>Do You Really Want To Delete Your Account..?</h1>
		<h3>*Your Account,all your orders if there will be deleted!*</h3>
		<br>
	<form accept="" method="post">
		<input type="submit" name="yes" value="YES,I want to Delete" class="btn btn-danger">
		<input type="submit" name="no" value="NO,I don't want to Delete" class="btn btn-primary">
	</form>
	</center>
</div>

<?php

if (isset($_POST['yes'])) {
	$session_email=$_SESSION['email'];
	$ip_add=getuserip();
	$select_cust="select * from customers where c_email='$session_email'";
	$run_select=mysqli_query($con,$select_cust);
	$row_cust=mysqli_fetch_array($run_select);
	$c_id=$row_cust['c_id'];
	$delete_cust="delete from customers where c_email='$session_email'";
	$delete_cust_order="delete from customer_order where c_id='$c_id'";
	$delete_pending_order="delete from pending_order where c_id='$c_id'";
	$run_del=mysqli_query($con,$delete_cust);
	$run_corder=mysqli_query($con,$delete_cust_order);
	$run_porder=mysqli_query($con,$delete_pending_order);
	echo "<script>alert('Deletion Successfull')</script>";
	session_destroy();
    echo "<script>window.open('../index.php','_self')</script>";
}elseif (isset($_POST['no'])) {
	echo "<script>window.open('account.php?my_order','_self')</script>";
}
?>