<?php 

$email_address = $_GET['email'];

require "classes/application.php";

$obj_app = new Application();

$query_result = $obj_app->customer_email_checking($email_address);

$customer_info = mysqli_fetch_assoc($query_result);

if($customer_info){
	echo "email address is already exists";
}else{
	echo "email  address is available";
}



 ?>