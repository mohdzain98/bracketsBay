<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6"><!-- col start  -->
				<h4>Pages</h4>
				<ul>
					<li><a href="cart.php">Shopping cart</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href="account.php">My Account</a></li>

				</ul>

				<h4>User Section</h4>
				<ul>
					<li><a href="checkout.php">Login</a></li>
					<li><a href="register.php">Register</a></li>
				</ul>

				<hr class="hidden-md hidden-lg hidden-sm">
				
			</div><!-- col end  -->

			<div class="col-md-3 col-sm-6"><!-- col start  -->
				<h4>Top Product</h4>
				<ul>
					<?php
				    $get_p_cats="select * from product_categories";
				    $run_p_cats=mysqli_query($con,$get_p_cats);
				    while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
				    	$p_cat_id=$row_p_cats['p_cat_id'];
				    	$p_cat_title=$row_p_cats['p_cat_title'];
				    	echo "
				    	<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>
				    	";
				    }
				    ?>
				</ul>	
				<hr class="hidden-md hidden-lg">
			</div><!-- col end  -->

			<div class="col-md-3 col-sm-6"><!-- col start  -->

				<h4>Where To Find Us</h4>
				<p>
					<strong>bracketsbay.com</strong>
					<br>Najibabad,UP
					<br>aflatoon@gmail.com
					<br>+91000000000
				</p>
				<h4>Developer Info</h4>
				<p>
					<strong>Er. Mohd Zain</strong>
					<br>zainmohd1998@gmail.com
					<br>+91 8077115602
					<br><a href="http://www.mohdzain.com" target="_blank">www.mohdzain.com</a>
				</p>
				<a href="contact.php">Goto contact us page</a>
				<hr class="hidden-md hidden-lg">
				
			</div><!-- col end -->

			<div class="col-md-3 col-sm-6">
				<h4>Get The News<h4>
				<p class="text-muted">
					subscribe here for getting latest product detail
				</p>
				<form action="" method="post">
					<div class="input-group">
						<input type="text" name="email" class="form-control" placeholder="Email">
						<span class="input-group-btn">
							<input type="submit" class="btn btn-default" value="subscribe">
						</span>
						
					</div>
					
				</form>

				<hr>
				<h4>Stay In Touch</h4>
				<p class="social">
					<a href="http://www.facebook.com/zain.rehman.9889"><i class="fa fa-facebook"></i></a>
					<a href="https://www.instagram.com/invites/contact/?i=ct896xo9hluj&utm_content=1mdjcq0"><i class="fa fa-instagram"></i></a>
					<a href="https://twitter.com/mdzain98?s=09"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-envelope"></i></a>
				</p>
				
			</div>

			
		</div>
		
	</div>
	
</div>

<div id="copyright">
	<div class="container">
		<div class="col-md-3">
			<p class="pull-left"> 
				&copy; 2020 Er.Mohd Zain
			</p>	
		</div>

		<div class="col-md-3">
			<p class="center">
				Website By: <a href="about.php">UMAR HANDICRAFT,Najibabad</a>
			</p>
			
		</div>
		<div class="col-md-3">
			<p class="pull-right">
				Published on : 1 April,2021 
			</p>
		</div>
		<div class="col-md-3">
			<p class="pull-right">
				Updated on : 1 April,2021 
			</p>
		</div>
		
	</div>
	
</div>