<?php
function welcome(){
if(!isset($_SESSION['email'])){
		echo "WELCOME";
}else{
 echo "WELCOME:" .$_SESSION['email']."";
}
}

function inout(){
if(!isset($_SESSION['email'])){
	echo "<a href='checkout.php'>Login</a>";
}else{
	echo "<a href='logout.php'>Logout</a>";
}
}	
?>