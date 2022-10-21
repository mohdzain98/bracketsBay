<?php
$session_email=$_SESSION['email'];
$select_cust="select * from customers where c_email='$session_email'";
$run_cust=mysqli_query($con,$select_cust);
$row_cust=mysqli_fetch_array($run_cust);
$name=$row_cust['c_name'];
$email=$row_cust['c_email'];
$contact=$row_cust['c_contact'];
$address=$row_cust['c_add'];
$city=$row_cust['c_city'];
$state=$row_cust['c_country'];
?>
<div class="box">
	<div class="box-header">
		<center><h1>Account Details</h1></center>
	</div>

<div class="card" style="width: 70rem;">
  <ul class="list-group list-group-flush">
  	<h3>

    <li class="list-group-item">Name:   <?php echo $name ?></li>
    <li class="list-group-item">Email:    <?php echo $email ?></li>
    <li class="list-group-item">Number:   <?php echo $contact ?></li>
    <li class="list-group-item">Address:  <?php echo $address ?></li>
    <li class="list-group-item">City:     <?php echo $city ?></li>
    <li class="list-group-item">State:    <?php echo $state ?></li>
</h3>
   </ul>
</div>
</div>
