<?php
include("includes/db.php");
include("functions/functions.php");
?>

<?php
if (isset($_GET['c_id'])) {
	$cus_id=$_GET['c_id'];
}
$ip_add=getuserip();
$status="pending";
$invoice_no=mt_rand();
$select_cart="select * from cart where ip_address='$ip_add'";
$run_cart=mysqli_query($con,$select_cart);
while ($row_cart=mysqli_fetch_array($run_cart)) {
	$pro_id=$row_cart['p_id'];
	$size=$row_cart['type'];
	$qty=$row_cart['qty'];

	$get_product="select * from products where product_id='$pro_id'";
	$run_pro=mysqli_query($con,$get_product);
	while ($row_pro=mysqli_fetch_array($run_pro)) {
		$sub_total=$row_pro['product_price'] * $qty;

		$insert_c_order="insert into customer_order 
		(c_id,p_id,due_amount,invoice_no,qty,size,order_date,order_status) values('$cus_id','$pro_id','$sub_total','$invoice_no','$qty','$size',NOW(),'$status')";
		$run_c_order=mysqli_query($con,$insert_c_order);

		$delete_cart="delete from cart where ip_address='$ip_add'";
		$run_del=mysqli_query($con,$delete_cart);
		echo "<script>alert('your order has been submitted,Thanks')</script>";
		echo "<script>window.open('customer/account.php?my_order','_self')</script>";
	}

}


?>