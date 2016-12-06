<?php 

class Application{
	private $connection;
	public function __construct(){

			$host_name ="localhost";
			$user_name="root";
			$db_password="";
			$db_name ="ashraful_eshoppers";

			$this->connection =mysqli_connect($host_name,$user_name,$db_password,$db_name);

			if(!$this->connection){
				die("DataBase is not Connected".mysqli_error($this->connection));
			}


	}


/*select all category info*/
	public function select_all_published_category(){

		$query = "SELECT * FROM tbl_category WHERE publication_status= 1";

		if(mysqli_query($this->connection,$query)){

				$query_result =mysqli_query($this->connection,$query);
				return $query_result;
		}else{
			die("Query Category Failed".mysqli_error($this->connection));
		}

	}

	public function select_all_manufacturer_info(){

		$query ="SELECT * FROM tbl_manufacturer WHERE publication_status = 1";

		if(mysqli_query($this->connection,$query)){

			$query_result = mysqli_query($this->connection,$query);
			return $query_result;
		}else
		{
			die("Manufacturer Query Failed".mysqli_error($this->connection));
		}

	}

	/*Select all latest Product Query*/

public function select_latest_product_info(){

	$query = "SELECT * FROM tbl_product WHERE publication_status=1 ORDER BY product_id DESC LIMIT 6";

	if(mysqli_query($this->connection,$query)){

		$query_result = mysqli_query($this->connection,$query);
		return $query_result;

	}else{

		die('Latest product Query failed'.mysqli_error($this->connection));
	}


}


/* Select all product info by id for product details page*/


public function select_product_info_by_id($product_id){

$query = "SELECT p.*,c.category_name,m.manufacturer_name FROM tbl_product as p,tbl_category as c,tbl_manufacturer as m WHERE p.category_id=c.category_id AND p.manufacturer_id=m.manufacturer_id AND product_id='$product_id'";

$query_result = mysqli_query($this->connection,$query);

if($query_result){

	return $query_result;

}else{
	die("Product details Query Failed".mysqli_error($this->connection));
}

}
/*Add To cart Function Query */

public function add_to_cart($data){


$product_id = $data['product_id'];

$query ="SELECT product_name,product_price,product_image FROM tbl_product WHERE product_id ='$product_id'";

$query_result = mysqli_query($this->connection,$query);

$product_info=mysqli_fetch_assoc($query_result);

session_start();
$session_id =session_id();

$query = "INSERT INTO tbl_temp_cart (session_id,product_id,product_name,product_price,product_quantity,product_image) VALUES ('$session_id','$product_id','$product_info[product_name]','$product_info[product_price]','$data[product_quantity]','$product_info[product_image]')";

$query_result = mysqli_query($this->connection,$query);

header("Location:cart.php");

}

/*Select cart product by session id*/

public function select_cart_product_by_session($session_id){

$query = "SELECT * FROM tbl_temp_cart WHERE session_id='$session_id'";

$query_result=mysqli_query($this->connection,$query);

if($query_result){
	return $query_result;

}else{
	die("Cart Query Failed".mysqli_error($this->connection));
}


}

/*Update Cart Quantity by cart id*/

public function update_cart_product_quantity($data){

	$query ="UPDATE tbl_temp_cart SET product_quantity='$data[product_quantity]' WHERE temp_cart_id='$data[temp_cart_id]'";

	$query_result=mysqli_query($this->connection,$query);
	if($query_result){
		$message="Cart Quantity Update Successfully";

		return $message;
	}else{
		die('Cart Update Query failed'.mysqli_error($this->connection));
	}

} 

/*DELETE cart Product*/

public function delete_cart_by_id($cart_id){

	$query = "DELETE FROM tbl_temp_cart WHERE temp_cart_id='$cart_id'";
	$delete_cart_query = mysqli_query($this->connection,$query);
	if($delete_cart_query){
		$message = "DELETE PRODUCT FROM CART Successfully";

		return $message;
	}else{
		die("DELETE CART QUERY FAILED".mysqli_error($this->connection));
	}
}

/* Select Published Product By category Id*/

public function select_product_info_by_category_id($category_id){

	$query = "SELECT * FROM tbl_product WHERE category_id='$category_id' AND publication_status=1 ORDER BY product_id DESC";

	$query_result=mysqli_query($this->connection,$query);

if($query_result){
	return $query_result;

}else{
	die("Cart Query Failed".mysqli_error($this->connection));
}

}

/* Save Customer Information  BY Registration */

public function save_customer_info($data){
 $password = md5($data['password']);
$query = "INSERT INTO tbl_customer (first_name,last_name,email,password,phone_number,address,district,city) VALUES('$data[first_name]','$data[last_name]','$data[email]','$password','$data[phone_number]','$data[address]','$data[district]','$data[city]')";

$save_customer_info_query = mysqli_query($this->connection,$query);
if($save_customer_info_query){
	$customer_id = mysqli_insert_id($this->connection);
	
	$_SESSION['customer_id'] = $customer_id;
	$_SESSION['customer_name'] = $data['first_name'].' '.$data['last_name'];
/* Email varification start*/
$to = $data['email'];
$subject = "Customer Email Varification";
$en_customer_id = base64_encode($customer_id);

$message = "
 <span> DEAR $data[last_name]. Thanks For Joining Our Community</span><br/>
 <span>Your Login Information Goes Here</span><br/>

 <span>Email address :</span>$data[email]<br/>
 <span>Password :</span>$data[password]<br/>
	<span>To Activate your Account Go to this link</span><br/>
<a href='http://localhost/eshoppers_bd/update_customer_status.php?id=$en_customer_id'>http://localhost/eshoppers_bd/update_customer_status.php?id=$en_customer_id</a>


";
$headers = "Form:info@ashrafulkarim.com";
mail($to,$subject,$message,$headers);

echo $message;
exit();



/* Email varification End*/

	//header('Location:shipping.php');


}else{
 die('Customer Info Query failed'.mysqli_error($this->connection));
}

}

public function update_customer_status($customer_id){

	$query = "UPDATE tbl_customer SET activation_status=1 WHERE customer_id='$customer_id'";
	if(mysqli_query($this->connection,$query)){

		header('Location:shipping.php');

	}else{
		die('Update Activation Query Failed'.mysqli_error($this->connection));
	}


}
 
/* SElect customer Info By customer id */

public function select_all_customer_info($customer_id){
$query = "SELECT * FROM tbl_customer WHERE customer_id='$customer_id'";

$query_result = mysqli_query($this->connection,$query);

if($query_result){
	return $query_result;
}else{
	die("Select customer query failed".mysqli_error($this->connection));
}
}


public function save_shipping_info($data){

	$query = "INSERT INTO tbl_shipping (full_name,email,phone_number,address,district,city) VALUES ('$data[full_name]','$data[email]','$data[phone_number]','$data[address]','$data[district]','$data[city]')";

	if(mysqli_query($this->connection,$query)){

		$shipping_id = mysqli_insert_id($this->connection);
		session_start();
		$_SESSION['shipping_id'] = $shipping_id;

		header("Location:payment.php");


	}else{
		die("Save Shipping content Query Failed".mysqli_error($this->connection));
	}


}

/*Save Order Info from Paynet_content page*/

public function save_order_info($data){
	
	$payment_type = $data['payment_type'];

	if($payment_type =="cash_on_delivery"){
		session_start();
		$customer_id = $_SESSION['customer_id'];
		$shipping_id = $_SESSION['shipping_id'];
		$order_total = $_SESSION['order_total'];

		$query = "INSERT INTO tbl_order (customer_id,shipping_id,order_total) VALUES ('$customer_id','$shipping_id','$order_total')";

		if(mysqli_query($this->connection,$query)){

			$order_id = mysqli_insert_id($this->connection);

			$query="INSERT INTO tbl_payment (order_id,payment_type) VALUES('$order_id','$payment_type')";

			if(mysqli_query($this->connection,$query)){

				$session_id = session_id();

				$query = "SELECT * FROM tbl_temp_cart WHERE session_id='$session_id'";
				$query_result = mysqli_query($this->connection,$query);

				while($row=mysqli_fetch_assoc($query_result)){
					$query = "INSERT INTO tbl_order_details (order_id,product_id,product_name,product_price,product_quantity,product_image) VALUES ('$order_id','$row[product_id]','$row[product_name]','$row[product_price]','$row[product_quantity]','$row[product_image]')";
					mysqli_query($this->connection,$query);
				}

				$query = "DELETE FROM tbl_temp_cart WHERE session_id='$session_id'";
				mysqli_query($this->connection,$query);
				unset($_SESSION['order_total']);

				header("Location:customer_home.php");


			}else{
				die("Payment Insert Query Failed".mysqli_error($this->connection));
			}


		}else{
			die("SaVe order Query Failed ".mysqli_error($this->connection));
		}
	}
	
}

/*Ajax customer email checking */

public function customer_email_checking($email_address){

	$query = "SELECT * FROM tbl_customer WHERE email = '$email_address'";

	if(mysqli_query($this->connection,$query)){

		$query_result = mysqli_query($this->connection,$query);
		return $query_result;


	}else{
		die("Ajax Query Failed".mysqli_error($this->connection));
	}

}

public function select_category(){

	$query = "SELECT category_id,category_name FROM tbl_category WHERE publication_status=1";
	$cat_query = mysqli_query($this->connection,$query);
	if($cat_query){

		return $cat_query;

	}else{
		die("Query Failed".mysqli_error($this->connection));
	}
}

public function select_manufacturer(){

	$query = "SELECT manufacturer_id,manufacturer_name FROM tbl_manufacturer WHERE publication_status=1";
	$manufacturer_query = mysqli_query($this->connection,$query);
	if($manufacturer_query){

		return $manufacturer_query;

	}else{
		die("Query Failed".mysqli_error($this->connection));
	}
}

public function select_product_info_by_manufacturer_id($manufacturer_id){

		$query = "SELECT * FROM tbl_product WHERE manufacturer_id='$manufacturer_id' AND publication_status=1 ORDER BY product_id DESC";

		$magic_result=mysqli_query($this->connection,$query);

	if($magic_result){
		return $magic_result;

	}else{
		die("manufacturer Query Failed".mysqli_error($this->connection));
	}


}

/*Customer Logout Function */


public function customer_logout(){

	unset($_SESSION['customer_id']);
	unset($_SESSION['shipping_id']);
	unset($_SESSION['customer_name']);

	header('Location:index.php');

}






}


?>
