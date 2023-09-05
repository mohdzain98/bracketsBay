<?php
$db=mysqli_connect("localhost","root","Geeky@Zain98","MaMa");

/*for getting user ip*/
function getuserip(){
	switch (true) {
		case (!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
		case (!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
		case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
		default : return $_SERVER['REMOTE_ADDR'];
			
	}
}

function addcart(){
	global $db;
	if(isset($_GET['add_cart'])){
		$ip_add=getuserip();
		$p_id=$_GET['add_cart'];
		$product_qty=$_POST['product_qty'];
		/*$product_size=$_POST['product_size'];*/
		$check_product="select * from cart where ip_address='$ip_add' AND p_id='$p_id'";
		$run_check=mysqli_query($db,$check_product);
		if(mysqli_num_rows($run_check)>0){
			echo "<script>alert('This product is already added in the cart')</script>";
			echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}else{
			$query="insert into cart(p_id,ip_address,qty) values('$p_id','$ip_add','$product_qty')";
			$run_query=mysqli_query($db,$query);
			echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}

	}
}

function item(){
	global $db;
	$ip_add=getuserip();
	$get_items="select * from cart where ip_address='$ip_add'";
	$run_item=mysqli_query($db,$get_items);
	$count=mysqli_num_rows($run_item);
	echo $count;
}

function totalprice(){
	global $db;
	$ip_add=getuserip();
	$total=0;
	$select_cart="select * from cart where ip_address='$ip_add'";
	$run_cart=mysqli_query($db,$select_cart);
	while ($record=mysqli_fetch_array($run_cart)) {
		$pro_id=$record['p_id'];
		$pro_qty=$record['qty'];
		$get_price="select * from products where product_id='$pro_id'";
		$run_price=mysqli_query($db,$get_price);
		while ($row=mysqli_fetch_array($run_price)) {
			$sub_total=$row['product_price'] * $pro_qty;
			$total+=$sub_total;
		}
	}
	echo "INR $total";

}

function getpro(){
	global $db;
	$get_product="select * from products order by 1 DESC LIMIT 0,8";
	$run_products=mysqli_query($db,$get_product);
	while ($row_product=mysqli_fetch_array($run_products)) {
		$pro_id=$row_product['product_id'];
		$pro_title=$row_product['product_title'];
		$pro_price=$row_product['product_price'];
		$pro_img1=$row_product['product_img1'];

		echo "
		<div class='col-md-3 col-sm-6'>
		<div class='product'>
		<a href='details.php?pro_id=$pro_id'>
		<center>
		<img src='admin_area/productimages/$pro_img1' class='img-responsive'>
		</center>
		</a>

		<div class='text'>
		<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
		<p class='price'>INR $pro_price</p>
		<p class='buttons'>
		<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details </a>
		<a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
		<i class='fa fa-shopping-cart'></i>Add To Cart
		</a>

		</p>

		</div>
        </div>
        </div>
		";

	}
}
/*Get Product Categories product*/
function getpcatpro(){
	global $db;
	if(isset($_GET['p_cat'])){
		$p_cat_id=$_GET['p_cat'];
		$get_p_cats="select * from product_categories where p_cat_id='$p_cat_id'";
		$run_p_cats=mysqli_query($db,$get_p_cats);
		$row_p_cats=mysqli_fetch_array($run_p_cats);
		$p_cat_title=$row_p_cats['p_cat_title'];
		$p_cat_desc=$row_p_cats['p_cat_desc'];

		$get_products="select * from products where p_cat_id='$p_cat_id'";
		$run_products=mysqli_query($db,$get_products);
		$count=mysqli_num_rows($run_products);
		if($count==0){
			echo "
			<div class='box'>
			<h1>No Product Found In This Category </h1>
			</div>
			<div class='box'>
			<h1>Products Coming Soon </h1>
			</div>
			";
		}else{
			echo "
			<div class='box'>
			<h1>$p_cat_title</h1>
			<p> $p_cat_desc </p>
			</div>

			";
		}
		while($row_products=mysqli_fetch_array($run_products)){
			$pro_id=$row_products['product_id'];
			$pro_title=$row_products['product_title'];
			$pro_price=$row_products['product_price'];
			$pro_img1=$row_products['product_img1'];
			echo "
			<div class='col-md-4 col-sm-6  center-responsive'>
			<div class='product'>
			<a href='details.php?pro_id=$pro_id'>
			<img src='admin_area/productimages/$pro_img1' class='img-responsive'></a>
			<div class='text'>
			<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
			<p class='price'> INR $pro_price</p>
			<p class='buttons'>
			<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
			<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to Cart</a>

			</p>
			</div>
			</div>

			</div>

			";
		}
	}
}

?>