<?php
include("includes/db.php");
?>


<!DOCTYPE html>
<html>
<head>
	<title>Insert Product</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="../style.css">
     
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
	<div class="row"><!-- row start-->
		<div class="col-lg-10">
			<div class="breadcrumb">
				<li>
					<a href="adminindex.php">Back To Home</a>
				</li>
				<li class="active">
					<i class="fa fa-dashboard"></i>
					Dahboard/Insert Product 
					
				</li>
				
			</div>
			
		</div>
		
	</div><!-- row end-->

	<div class="row">
		<div class="col-lg-3">
			
		</div>
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-money fa-w"></i>Insert Product
					</h3>
					
				</div>
				<div class="panel-body">
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label">Product Title</label>
							<input type="text" name="product_title" class="form-control" required="">
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Product Category</label>
							<select class="form-control" name="pro_cat">
								<option>Select Category</option>
								<?php
								$get_p_cats="select * from product_categories";
								$run_p_cats=mysqli_query($con,$get_p_cats);
								while ($row=mysqli_fetch_array($run_p_cats)) {
									$id=$row['p_cat_id'];
									$cat_title=$row['p_cat_title'];
									echo "<option value='$id' > $cat_title </option>
									";
									
								}

								?>
							</select>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 1</label>
							<input type="file" name="product_img1" class="form-control" required="">
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 2</label>
							<input type="file" name="product_img2" class="form-control" required="">
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Product Image 3</label>
							<input type="file" name="product_img3" class="form-control" required="">
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Product Price</label>
							<input type="text" name="product_price" class="form-control" required="">
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Product Keyword</label>
							<input type="text" name="product_keyword" class="form-control" required="">
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Product Descrption</label>
							<textarea name="product_desc" class="form-control" rows="6" cols="19"></textarea>
						</div>

						<div class="form-group">
							<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
						</div>


						
					</form>
					
				</div>
			</div>
			
		</div>
		<div class="col-lg-3">
			
		</div>
		
	</div>

</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</html>

<?php
if (isset($_POST['submit'])) {
	$product_title=$_POST['product_title'];
	$pro_cat=$_POST['pro_cat'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$product_keyword=$_POST['product_keyword'];

	$product_img1=$_FILES['product_img1']['name'];
	$product_img2=$_FILES['product_img2']['name'];
	$product_img3=$_FILES['product_img3']['name'];

	$temp_name1=$_FILES['product_img1']['temp_name'];
	$temp_name2=$_FILES['product_img2']['temp_name'];
	$temp_name3=$_FILES['product_img3']['temp_name'];

	move_uploaded_file($temp_name1, "productimages/$product_img1");
	move_uploaded_file($temp_name2, "productimages/$product_img2");
	move_uploaded_file($temp_name3, "productimages/$product_img3");

	$inset_product="insert into products(p_cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keyword)
	values('$pro_cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_keyword') ";
	$run_product=mysqli_query($con,$inset_product);
	if($run_product){
		echo "<script>alert('products inserted successfully')</script>";
		echo "<script>window.close(insert_product.php)</script>";
		/*echo "<script>window.open(insert_product.php)</script>";*/
		}
}
?>