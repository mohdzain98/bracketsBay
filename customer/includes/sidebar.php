<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">

		<?php
		$session_customer=$_SESSION['email'];
		$get_cust="select * from customers where c_email='$session_customer'";
		$run_cust=mysqli_query($con,$get_cust);
		$row_cust=mysqli_fetch_array($run_cust);

		$cust_image=$row_cust['c_image'];
		$cust_name=$row_cust['c_name'];
		if (!isset($_SESSION['email'])) {
			
		}else{
			echo "
		<center>
			<img src='cimages/$cust_image' class='img-responsive'>
		</center>
		<br>
		<h3 align='center' class='panel-title'>Name: $cust_name</h3>";
		}

		?>




	</div>
	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">
			<li class="<?php if(isset($_GET['details'])){echo "active";}?>">
				<a href="account.php?details"><i class="fa fa-info-circle"></i>Account Details</a>
			</li>

			<li class="<?php if(isset($_GET['my_order'])){echo "active";}?>">
				<a href="account.php?my_order"><i class="fa fa-list"></i>My Orders</a>
			</li>

			<li class="<?php if(isset($_GET['pay_offline'])){echo "active";}?>">
				<a href="account.php?pay_offline">
                 <i class="fa fa-bolt"></i>
				Pay Offline</a>
			</li>

			<li class="<?php if(isset($_GET['edit_act'])){echo "active";}?>">
				<a href="account.php?edit_act">
                 <i class="fa fa-pencil"></i>
				Edit Account</a>
			</li>

			<li class="<?php if(isset($_GET['change_pass'])){echo "active";}?>">
				<a href="account.php?change_pass">
                 <i class="fa fa-lock"></i>
				Change Password</a>
			</li>

			<li class="<?php if(isset($_GET['del_acc'])){echo "active";}?>">
				<a href="account.php?del_acc">
                 <i class="fa fa-trash"></i>
				Delete Account</a>
			</li>

			<li class="<?php if(isset($_GET['logout'])){echo "active";}?>">
				<a href="logout.php">
                 <i class="fa fa-sign-out"></i>
				Logout</a>
			</li>
			
		</ul>
		
	</div>
</div>


